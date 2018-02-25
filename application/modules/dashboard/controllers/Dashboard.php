<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Dashboard_model"); 
	    $this->load->model("Public_model"); 
		define('USER_ID', user_id());
		define('USER_TYPE', user_type());
		
	}

  	public function index() {   
  		$data = [];
	    $data["total_plans"]= $this->Dashboard_model->total_plans(USER_ID);
	    $data["pause_orders"]= $this->Public_model->oders_by_status(USER_ID, 0);
	    $data["progress_orders"]= $this->Public_model->oders_by_status(USER_ID, 1);
	    $data["done_orders"]= $this->Public_model->oders_by_status(USER_ID, 2);


	    $data["pause_orders_d"]= $this->Public_model->oders_by_status_by_designer(0);
	    $data["progress_orders_d"]= $this->Public_model->oders_by_status_by_designer(1);
	    $data["done_orders_d"]= $this->Public_model->oders_by_status_by_designer(2);


	    

	    if(is_admin()){
	    	$status = 'read_status_admin';
	    }elseif (is_user()) {
	    	$status = 'read_status';
	    }elseif (is_designer()) {
	    	$status = 'read_status_designer';
	    }

		// die($this->db->last_query());

	    $data["orders"] = $this->Dashboard_model->orders();

        $this->load->view('include/header'); 
        $this->load->view('index',$data);
        $this->load->view('include/footer');
	}


}


?>