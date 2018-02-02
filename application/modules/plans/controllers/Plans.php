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

  		
  		$data['all_plans'] = $this->Plans_model->get_all_plans(PLANS_O, USER_ID);
      
      
        $this->load->view('include/header'); 
        $this->load->view('plans',$data);
        $this->load->view('include/footer');
	}


	public function planDetail ($id='') {



		if($id == '') {
			redirect('/plans/');
		}

		$data = $this->input->post();

		if(isset($data['design'])) {
			unset($data['design']);
			$this->Plans_model->insert_data(ORDERS, USER_ID, $data);
			$this->session->set_flashdata('message', 'Your Design Requested Successfully...');
		}

		if(isset($data['update_design'])) {
			unset($data['update_design']);
			$this->Plans_model->updateOrder(ORDERS, 'id', $data['id'], $data) ;
			$this->session->set_flashdata('message', 'Your Design Has Been Updated Successfully...');
		}

		$data['user'] = $this->session->userdata();

		$data['orders'] = $this->Plans_model->get_data(ORDERS, USER_ID, $id);

		$data['plan_count'] = $this->Plans_model->get_plans(PLANS_O, USER_ID, $id);

		$data['users'] = $this->Plans_model->get_designers();

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