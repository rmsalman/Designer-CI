<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Plans extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Plans_model"); 
		define('USER_ID', $_SESSION['user_details'][0]->user_id);
	}

	/**
	  * This function is used get html of template page 
	  */
  	public function index() {
        $this->load->view('include/header'); 
        $this->load->view('plans');
        $this->load->view('include/footer');
	}


	public function planDetail ($id='') {

		$user_id = '';
		$user_id =	$_SESSION['user_details'][0]->user_id;

		if($id == '') {
			redirect('/plans/');
		}

		$data = $this->input->post();

		if($this->input->post()) {
			unset($data['design']);
			$this->Plans_model->insert_data(ORDERS, $user_id, $data);
			$this->session->set_flashdata('message', 'Your Design Requested Successfully...');
		}

		$data['orders'] = $this->Plans_model->get_data(ORDERS, $user_id);

		$data['plan_count'] = $this->Plans_model->get_plans(PLANS_O, $user_id);

        $this->load->view('include/header'); 
        $this->load->view('planDetail', $data);
        $this->load->view('include/footer');

	}

  	/**
	  * This function is used to add and update templates 
	  */
	public function add_edit($id='') {	
		$data = $this->input->post();
		if($id = $this->input->post('id')) {
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			unset($data['id']);
			$this->Templates_model->updateRow('templates', 'id', $id, $data);
			$this->session->set_flashdata('message', 'Your data updated Successfully..');
      		redirect('setting#templates-div'); 
		} else { 
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			$insert_id = $this->Templates_model->insertRow('templates', $data);
			$this->session->set_flashdata('message', 'Your data inserted Successfully..');
			redirect('setting#templates-div');
		}
	}
	
	/**
	  * This function is used to Load add abd update view/html
	  */
	public function modal_form() {
		if($this->input->post('id')){
			$data['data']= $this->Templates_model->get_specific_template($this->input->post('id'));
            echo $this->load->view('add_update', $data, true);
        } else {
            echo $this->load->view('add_update', '', true);
        }
        exit;
	}
}


?>