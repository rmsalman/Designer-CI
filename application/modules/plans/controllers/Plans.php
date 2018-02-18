<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Plans extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Plans_model"); 
		define('USER_ID', $_SESSION['user_details'][0]->users_id);
		define('USER_TYPE', $_SESSION['user_details'][0]->user_type);
        $this->load->helper('url_helper');

        if(isset($_GET['get_plan']) && !empty($_GET['get_plan'])){
            $_SESSION['get_plan'] = $_GET['get_plan']; 
        }
		
	}

	/**
	  * This function is used get html of template page 
	  */
  	public function index($user = '') {

  		if($user == '') {
  			$user = USER_ID;
		}elseif (is_admin()) {
			
		}elseif (is_user() && USER_ID == $user) {
  			$user = USER_ID;
		}else {
			redirect('dashboard');
		}

        if($this->session->userdata('get_plan')) {
           if($this->Plans_model->add_plan_to_user('plan_orders', user_id(), $this->session->userdata('get_plan'))){
                unset($_SESSION['get_plan']);
           }            
        }

  		$data['all_plans'] = $this->Plans_model->get_all_plans(PLANS_O, $user);
      
        $this->load->view('include/header'); 
        $this->load->view('plans',$data);
        $this->load->view('include/footer');
	}


	public function orderdetail ($id = '') {
		$data = [];
		
		if($id == '') {
			redirect('/');
		}

		$data = $this->input->post();




                $config = [];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|docx|doc|excel|notes|zip|txt';

                $this->load->library('upload', $config);

                if(is_admin()){
                    $uploader = 'admin_attachment';
                    $uploader2 = 'admin_attachment_to_designer';
                if($this->upload->do_upload($uploader2)){
                    $data[$uploader2] = $this->upload->data('file_name');
                }


                }elseif (is_user()) {
                    $uploader = 'user_attachment';
                }elseif (is_designer()) {
                    $uploader = 'designer_attachment';
                }

                if($this->upload->do_upload($uploader)){
                    $data[$uploader] = $this->upload->data('file_name');
                }



            // $error = array('error' => $this->upload->display_errors());
            // echo '<pre>';
            // print_r($error);
            // echo '</pre>';


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

		$data['orders'] = $this->Plans_model->get_order(ORDERS, $id);

		$data['users'] = $this->Plans_model->get_designers();
        $this->load->view('include/header'); 
        $this->load->view('orderDetails', $data);
        $this->load->view('include/footer');

	}


	public function planDetail ($id='', $user='') {
		
		if($id == '') {
			redirect('/plans/');
		}

		if($user == '') {
			$user = USER_ID;
		}

		if(is_user() && $user !== USER_ID){
			redirect('dashboard');
		}

		$data = $this->input->post();

                $config = [];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|docx|doc|excel|notes|zip|txt';

                $this->load->library('upload', $config);

                if(is_admin()){
                    $uploader = 'admin_attachment';
                    $uploader2 = 'admin_attachment_to_designer';

                    if($this->upload->do_upload($uploader2 )){
                        $data[$uploader2] = $this->upload->data('file_name');
                    }
                
                }elseif (is_user()) {
                    $uploader = 'user_attachment';
                }elseif (is_designer()) {
                    $uploader = 'designer_attachment';
                }

                if($this->upload->do_upload($uploader)){
                    $data[$uploader] = $this->upload->data('file_name');
                }


            // $error = array('error' => $this->upload->display_errors());
            // echo '<pre>';
            // print_r($error);
            // echo '</pre>';

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

		$data['orders'] = $this->Plans_model->get_data(ORDERS, $user , $id);

		$data['plan_count'] = $this->Plans_model->get_plans(PLANS_O, $user , $id);

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


  	public function add() {


        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('sub_title', 'Sub Title', 'required');
 
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
 
        $this->form_validation->set_rules('notes', 'Notes', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('include/header'); 
            $this->load->view('add');
            $this->load->view('include/footer'); 
        }else {

            $data = $this->input->post();
            unset($data['submit']);
            $response = $this->Plans_model->add_plan('plans', $data);
            if($response){
                $this->session->set_flashdata('message', 'Plans Added Successfully...');
                redirect('plans/allplans');
            }else {
                $this->session->set_flashdata('message', 'Sorry plan Not Added :(');                
                $this->load->view('include/header'); 
                $this->load->view('add');
                $this->load->view('include/footer'); 
            }
        }


	}


  	public function view() {

  		$data['all_plans'] = $this->Plans_model->get_all_plans();
      
        $this->load->view('include/header'); 
        $this->load->view('add',$data);
        $this->load->view('include/footer');
	}


  	public function edit() {

  		$data['all_plans'] = $this->Plans_model->get_all_plans();
      
        $this->load->view('include/header'); 
        $this->load->view('add',$data);
        $this->load->view('include/footer');
	}








    public function allplans()
    {
    	check_admin();
        $data['all_plans'] = $this->Plans_model->get_all_plan();

        $this->load->view('include/header'); 
        $this->load->view('view',$data);
        $this->load->view('include/footer');
    }
 
    public function viewplan($slug = NULL)
    {
    	check_admin();
        $data['plans_item'] = $this->Plans_model->get_plans_by_id($slug);
        
        if (empty($data['plans_item']))
        {
            show_404();
        }
 
        $data['title'] = $data['plans_item']['title'];
 
        $this->load->view('header', $data);
        $this->load->view('view', $data);
        $this->load->view('footer');
    }
    
    public function create()
    {
    	check_admin();
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a plans item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('header', $data);
            $this->load->view('create');
            $this->load->view('footer');
 
        }
        else
        {
            $this->Plans_model->set_plans();
            $this->load->view('header', $data);
            $this->load->view('success');
            $this->load->view('footer');
        }
    }
    
    public function editplan($id)
    {

    	check_admin();


        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        

        $data['id'] = $id;        
        $data['plans_item'] = $this->Plans_model->get_plans_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        // $this->form_validation->set_rules('text', 'Text', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {

	        $this->load->view('include/header'); 
            $this->load->view('edit', $data);
    	    $this->load->view('include/footer'); 
 
        }
        else
        {
			$data =  $this->input->post();
			unset($data['submit']);
            $this->Plans_model->set_plans($id, $data);
            redirect( base_url() . 'plans/allplans');
        }
    }
    
    public function delete($id)
    {
        check_admin();

        if (empty($id))
        {
            redirect('plans/allplans');
        }
        
        $this->Plans_model->delete_plans($id);        
        redirect('plans/allplans');        
    }

}


?>