<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * templates_model Class extends CI_Model
 */
class Blogs_model extends CI_Model {       
	function __construct(){            
	    parent::__construct();
	    $this->load->database();
	} 
   
   	/**
	  * This function is used to get specific by id template record from database 
	  * @param: $id - it is id of template
	  */
	public function allBlogs($table='') {
		 $this->db->from($table);
		 $query = $this->db->get();
		 return $result = $query->result();
	}
	
    public function add($table, $data)
    {
        return $this->db->insert($table, $data);
    }
		
    public function blog($table, $id)
    {
        return $this->db->from($table)->where('blog_id', $id)->get()->row();
    }
	
	
	public function updateBlog ($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}


    public function delete_blog($id)
    {
        $this->db->where('blog_id', $id);
        return $this->db->delete('blogs');
    }



}
?>