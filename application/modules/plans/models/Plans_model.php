<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Plans_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   

   public function insert_data ($table, $user_id, $data){
	  	$this->db->insert($table, $data);
	  	return  $this->db->insert_id();
	}


    public function add_plan_to_user ($table, $id, $plan) {
        $data = [];
        $data['user_id'] = $id;
        $data['plan_id'] = $plan;
        return $this->db->insert($table, $data);
    }

    public function get_order($table, $id) {
        $this->db->select('*');
        $this->db->where('id',$id);;
        $this->db->from($table);
        $query = $this->db->get();
        return $result = $query->result();

    }

    public function plan_order_id($table, $id, $plan_order_id) {
        $this->db->select('*');
        $this->db->where('plan_order_id',$plan_order_id);
        $this->db->where('user_id',$id);
        $this->db->from($table);
        $query = $this->db->get();
        return $result = $query->result();

    }

	public function get_data($table, $user_id, $id) {

		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->where('plan_id',$id);
		$this->db->from($table);
		$query = $this->db->get();
		return $result = $query->result();
	}


	public function get_data_by($table, $id, $user_id) {
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
		$this->db->where('plan_order_id',$id);
		$this->db->from($table);
		$query = $this->db->get();
		return $result = $query->result();
	}


	public function get_plans($table, $user_id, $id) {
		return	$query = $this->db->select('*, plan_orders.id as plan_order_id')
         ->from('plan_orders')
         ->join('plans', 'plan_orders.plan_id = plans.id')
         ->order_by('plan_orders.id', 'DESC')
         ->where('user_id',$user_id)
         ->where('plan_id',$id)
         ->get()->result();         
	}


	public function get_all_plans($table, $user_id) {
		$this->db->select('*, COUNT(plan_id) as counter');
		$this->db->from($table);
        $this->db->join('plans', 'plan_orders.plan_id = plans.id');
		$this->db->where('user_id',$user_id);
		$this->db->group_by('plan_id');
		$query = $this->db->get();
		return $result = $query->result();		
	}


	public function get_designers() {
	return	$this->db->select('*')->from('users')->where('user_type', 'Designer')->where('is_deleted', '0')->where('status', 'active')->get()->result();
	}

  	public function updateOrder ($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}

	




    public function get_all_plan($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('plans');
            return $query->result();
        }
 
        // $query = $this->db->get_where('plans', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function get_plans_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('plans');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('plans', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_plans($id = 0, $data)
    {
        $this->load->helper('url');
 
        
        if ($id == 0) {
            return $this->db->insert('plans', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('plans', $data);
        }
    }
    
    public function delete_plans($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('plans');
    }


    
    public function add_plan($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
?>