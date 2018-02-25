<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
		define('USERTYPE', $_SESSION['user_details'][0]->user_type);

	} 
   
	public function total_plans($id='') {

		$this->db->select("COUNT('*') as total_plans");		
			if (USERTYPE == 'Member') {
		 		$this->db->where('user_id' , $id);
			}
		$this->db->from('plan_orders');
		$query = $this->db->get();
		return $result = $query->result();
	}

   
	public function total_orders_pending($status = '') {
		$this->db->select(" o.seen_designer, o.seen_admin, o.order_title, o.id, o.user_status, o.admin_status, o.designer_status, o.admin_status_to_designer, p.title ,o.user_id, o.designer_id, o.plan_id, u.name, p.title as p_title, uu.name as d_name, o.created_at as o_created_at, o.updated_at as o_updated_at")

        ->join('users u', 'o.user_id = u.users_id')
        ->join('users uu', 'o.designer_id = uu.users_id')

        ->join('plans p', 'o.plan_id = p.id')

        ->from('orders o'); 
			
			if (USERTYPE == 'Member') {
				$this->db->where('o.admin_status', $status);
				$this->db->where('o.user_id', user_id());
			}
		
			if (USERTYPE == 'admin') {
				$this->db->where('o.user_status', $status);
			}
		
			if (USERTYPE == 'Designer') {
				$this->db->where('o.admin_status_to_designer', $status);
				$this->db->where('o.designer_id', user_id());
			}
		
		$query = $this->db->get();
		return $result = $query->result();
	}
   

	public function oders_by_status($id='', $status='') {
		$this->db->select("COUNT('*') as orders");
			if (USERTYPE == 'Member') {
		 		$this->db->where('user_id' , $id);
		 		$this->db->where('admin_status', $status);
			}
			if (USERTYPE == 'Designer') {
		 		$this->db->where('designer_id' , $id);
		 		$this->db->where('admin_status_to_designer', $status);
			}
			if (USERTYPE == 'admin') {
		 		$this->db->where('user_status', $status);
			}
		$this->db->from('orders');
		$query = $this->db->get();

// die($this->db->last_query());

		return $result = $query->result();
	}


	public function orders() {

		$this->db->select(" o.seen_admin, o.seen_designer, o.order_title, o.id, o.user_status, o.admin_status, o.designer_status, o.admin_status_to_designer, p.title ,o.user_id, o.designer_id, o.plan_id, u.name, p.title as p_title, uu.name as d_name, o.created_at as o_created_at, o.updated_at as o_updated_at")
        ->join('users u', 'o.user_id = u.users_id')
        ->join('users uu', 'o.designer_id = uu.users_id')
        ->join('plans p', 'o.plan_id = p.id')
        ->from('orders o'); 

		
			if (USERTYPE == 'Member') {

				$this->db->where('o.user_id', user_id());

			}elseif (USERTYPE == 'Designer') {
				
				$this->db->where('o.designer_id', user_id());

			}elseif (USERTYPE == 'admin') {

				
			}else {
				$this->db->where('o.designer_id', 0);
			}


		$query = $this->db->get();

// die($this->db->last_query());
		return $result = $query->result();

	}


	public function add_plan ($table, $id, $plan) {
		$data = [];
		$data['user_id'] = $id;
		$data['plan_id'] = $plan;

        return $this->db->insert($table, $data);
	}
}
?>