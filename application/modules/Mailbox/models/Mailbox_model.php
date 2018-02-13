<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Mailbox_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
	
	public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
	
	public function view($table, $id)
    {
        return $this->db->select('*')->from($table)->where('mailbox_id', $id)->get()->row();
    }

	public function allmsgs($id)
    {
        $query = $this->db->select('*')->from('mailbox m')->where('send_to', $id)
        ->join('users u', 'm.send_to = u.users_id')
        ->get()->result();

        // echo $this->db->last_query();
        return $query;
    }
	public function allmsgs_sent($id)
    {
        $query = $this->db->select('*')->from('mailbox m')->where('send_from', $id)
        ->join('users u', 'm.send_to = u.users_id')
        ->get()->result();

        // echo $this->db->last_query();
        return $query;
    }



  	public function updateMsg ($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}
}
?>