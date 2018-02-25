<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Public_model extends CI_Model { 

	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 


	public function msgcounter($table='', $column='', $column_val='', $column2='', $column_val2='') {

		$this->db->select("COUNT('*') as total")
		->from($table)
		->where($column, $column_val)
		->where($column2, $column_val2);
		$query = $this->db->get();
		return $result = $query->row();
	
	}


	public function all_plans($id='') {

		$this->db->select("COUNT('*') as total");		
			if (user_type() == 'Member') {
		 		$this->db->where('user_id' , $id);
			}
		$this->db->from('plan_orders');
		$query = $this->db->get();
		return $result = $query->row();
	}

	public function all_counts($table) {
		$this->db->select("COUNT('*') as total");		
		$this->db->from($table);
		$query = $this->db->get();
		return $result = $query->row();
	}



   

	public function oders_by_status($id='', $status='') {
		$this->db->select("COUNT('*') as orders");
			if (user_type() == 'Member') {
		 		$this->db->where('user_id' , $id);
		 		$this->db->where('admin_status', $status);
			}
			if (user_type() == 'Designer') {
		 		$this->db->where('designer_id' , $id);
		 		$this->db->where('admin_status_to_designer', $status);
			}
			if (user_type() == 'admin') {
		 		$this->db->where('user_status', $status);
			}
		$this->db->from('orders');
		$query = $this->db->get();
		return $result = $query->result();
	}
   

	public function oders_by_status_by_designer($status='') {
		$this->db->select("COUNT('*') as orders");
			if (user_type() == 'admin') {
		 		$this->db->where('designer_status', $status);
			}
		$this->db->from('orders');
		$query = $this->db->get();
		return $result = $query->row();
	}


    public function insert_public($table, $data)
    {
        return $this->db->insert($table, $data);
    }


  	public function update_public ($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}

}