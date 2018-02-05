<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Orders_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();

	} 
   	
	public function plans_by_users() {
		$this->db->select("*, COUNT('u.user_id') as total_orders_by_user")
         ->join('users u', 'po.user_id = u.users_id')
         ->join('plans p', 'po.plan_id = p.id')
		 ->from('plan_orders po')
		 ->group_by('po.user_id');
		
		$query = $this->db->get();
		return $result = $query->result();
	}
   	
	public function pause_orders($id = '') {

		$this->db->select("SELECT * FROM orders o");	
		$this->db->join("JOIN users u", 'ON o.user_id = u.users_id');	


			if (USER_TYPE == 'admin') {
		 		$this->db->where('o.user_status' , 0);
				$this->db->group_by('o.user_id');
			}

			if (USER_TYPE == 'designer') {
		 		$this->db->where('o.admin_status_to_designer' , 0);
		 		$this->db->where('o.designer_id' , USER_ID);
				$this->db->group_by('o.designer_id');
			}

			if (USER_TYPE == 'member') {
		 		$this->db->where('o.admin_status' , 0);
			}


		$this->db->from('plan_orders');
		$query = $this->db->get();
		return $result = $query->result();

		$query = $this->db->get();
		return $result = $query->result();
	}

}
?>