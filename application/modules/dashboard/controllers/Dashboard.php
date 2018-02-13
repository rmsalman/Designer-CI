<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Dashboard_model"); 
		define('USER_ID', $_SESSION['user_details'][0]->users_id);
		define('USER_TYPE', $_SESSION['user_details'][0]->user_type);
		
	}

	/**
	  * This function is used get html of template page 
	  */
  	public function index() {   
  		$data = [];
	    $data["total_plans"]= $this->Dashboard_model->total_plans(USER_ID);
	    $data["pause_orders"]= $this->Dashboard_model->oders_by_status(USER_ID, 0);
	    $data["progress_orders"]= $this->Dashboard_model->oders_by_status(USER_ID, 1);
	    $data["done_orders"]= $this->Dashboard_model->oders_by_status(USER_ID, 2);
	    $data["orders"]= $this->Dashboard_model->orders();

	    if($this->session->userdata('get_plan')) {
		   if($this->Dashboard_model->add_plan('plan_orders', USER_ID, $this->session->userdata('get_plan'))){
		   		unset($_SESSION['get_plan']);
		   }	    	
	    }

        $this->load->view('include/header'); 
        $this->load->view('index',$data);
        $this->load->view('include/footer');
	}


}


?>