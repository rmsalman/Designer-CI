<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Dashboard_model"); 
		define('USER_ID', $_SESSION['user_details'][0]->user_id);
		define('USER_TYPE', $_SESSION['user_details'][0]->user_type);
	}

	/**
	  * This function is used get html of template page 
	  */
  	public function index() {   
  		$data = [];
	    $data["total_plans"]= $this->Dashboard_model->total_plans(USER_ID);
	    $data["pause_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 0);
	    $data["progress_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 1);
	    $data["done_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 2);

        $this->load->view('include/header'); 
        $this->load->view('index',$data);
        $this->load->view('include/footer');
	}


}


?>