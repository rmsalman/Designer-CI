<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Orders extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("dashboard/Dashboard_model"); 
	    $this->load->model("Orders_model"); 
		define('USER_ID', $_SESSION['user_details'][0]->user_id);
		define('USER_TYPE', $_SESSION['user_details'][0]->user_type);
	}

  	public function index() {   
  		$data = [];
	    $data["total_plans"]= $this->Dashboard_model->total_plans(USER_ID);
	    $data["pause_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 0);
	    $data["progress_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 1);
	    $data["done_orders"]= $this->Dashboard_model->pending_orders(USER_ID, 2);

        $this->load->view('include/header'); 
        $this->load->view('dashboard/index',$data);
        $this->load->view('include/footer');
	}
  	public function plans() {      
  		$data = [];
	    $data["plans_by_users"] = $this->Orders_model->plans_by_users();

        $this->load->view('include/header'); 
        $this->load->view('orders',$data);
        $this->load->view('include/footer'); 
  	}
    public function orderstatus($status = '') {   

      if($status == 'pending' || $status == 'pause'){
        $status = 0;
      }elseif ($status == 'inprogress' || $status == 'progress') {
        $status = 1;  
      }elseif ($status == 'done' || $status == 'completed') {
        $status = 2;  
      }else {
        redirect('/');
      }

      $data["orders"]= $this->Dashboard_model->total_orders_pending($status);
      $this->load->view('include/header'); 
      $this->load->view('order_status',$data);
      $this->load->view('include/footer');

    } 
    public function pause() {      
  		$data = [];
	    $data["plans_by_users"] = $this->Orders_model->plans_by_users();

        $this->load->view('include/header'); 
        $this->load->view('orders',$data);
        $this->load->view('include/footer'); 
  	}
    public function FunctionName($value='')
    {
      $data = [];
      $data["orders"] = $this->Orders_model->plans_by_users();

        $this->load->view('include/header'); 
        $this->load->view('orders',$data);
        $this->load->view('include/footer'); 
      
    }
}
?>