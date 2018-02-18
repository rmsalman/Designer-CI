<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Showcase_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
   	/**
	  * This function is used to get specific by id template record from database 
	  * @param: $id - it is id of template
	  */
	public function allShowcases($table='') {
		 $this->db->from($table);
		 $query = $this->db->get();
		 return $result = $query->result();
	}
	
    public function add($table, $data)
    {
        return $this->db->insert($table, $data);
    }
		
    public function Showcase($table, $id)
    {
        return $this->db->from($table)->where('Showcase_id', $id)->get()->row();
    }
    
    public function purchased($table)
    {
        $this->db->from($table.' t');

        if(is_user() || is_designer()){
                $this->db->where('so_user_id', user_id());
        }

        $this->db->join('users u', 't.so_user_id = u.users_id')
        ->join('showcases s', 's.showcase_id = t.so_s_id');
        return $result = $this->db->get()->result();
    }
    
	
	public function updateShowcase ($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}


    public function delete_Showcase($id)
    {
        $this->db->where('Showcase_id', $id);
        return $this->db->delete('Showcases');
    }



    public function comments($id)
    {
        return $this->db
        ->from('comments c')
        ->join('Showcases b', 'b.Showcase_id = c.Showcase')
        ->get()->result();
    }



}
?>