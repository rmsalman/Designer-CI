<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Dashboard_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
		define('USERTYPE', $_SESSION['user_details'][0]->user_type);
	} 
   
	public function total_plans($id='') {
		$this->db->select("COUNT('*') as total_plans");		
			if (USERTYPE == 'member') {
		 		$this->db->where('user_id' , $id);
			}
		$this->db->from('plan_orders');
		$query = $this->db->get();
		return $result = $query->result();
	}
   

	public function pending_orders($id='', $status='') {
		$this->db->select("COUNT('*') as orders");
			if (USERTYPE == 'member') {
		 		$this->db->where('user_id' , $id);
		 		$this->db->where('admin_status', $status);
			}
			if (USERTYPE == 'designer') {
		 		$this->db->where('designer_id' , $id);
		 		$this->db->where('admin_status_to_designer', $status);
			}
			if (USERTYPE == 'admin') {
		 		$this->db->where('user_status', $status);
			}
		$this->db->from('orders');
		$query = $this->db->get();
		return $result = $query->result();
	}

}
?>