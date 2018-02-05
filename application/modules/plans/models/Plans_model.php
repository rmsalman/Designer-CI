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


	public function get_order($table, $id) {
		$this->db->select('*');
		$this->db->where('id',$id);;
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

   	/**
	  * This function is used to get specific by id template record from database 
	  * @param: $id - it is id of template
	  */
	// public function get_specific_template($id='') {
	// 	 $this->db->select('*');
	// 	 $this->db->from('templates');
	// 	 $this->db->where('id' , $id);
	// 	 $query = $this->db->get();
	// 	 return $result = $query->row();
	// }
	
	/**
	  * This function is used to get all record from templates table  
	  */
	// public function get_templates() {
	// 	$this->db->select('*');
	// 	$this->db->from('templates');
	// 	$query = $this->db->get();
	// 	return $result = $query->result();
	// }

	/**
	  * This function is used to insert row in table  
	  * @param: $table - table name in which you want to insert record
	  * @param: $data - data array
	  */
	// public function insertRow($table, $data){
	//   	$this->db->insert($table, $data);
	//   	return  $this->db->insert_id();
	// }

	/**
   	  * This function is used to update data in specific table
   	  * @param : $table - table name in which you want to update record
   	  * @param : $col - field name for where clause 
   	  * @param : $colVal - field value for where clause
   	  * @param : $data - data array 
   	  */
  // 	public function updateRow($table, $col, $colVal, $data) {
  // 		$this->db->where($col,$colVal);
		// $this->db->update($table,$data);
		// return true;
  // 	}
}
?>