<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Showcase extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Showcase_model"); 
	}


  	public function index() {   
  		if(!is_admin()){
  			redirect('showcase/purchased');
  		}
	    $data["showcases"]= $this->Showcase_model->allshowcases('showcases');
        $this->load->view('include/header'); 
        $this->load->view('index', $data);
        $this->load->view('include/footer');
	}


  	public function view($id='') {   
	    $data["showcases"]= $this->Showcase_model->allshowcases('showcases');
        $this->load->view('include/header'); 
        $this->load->view('index', $data);
        $this->load->view('include/footer');
	}


  	public function purchased($id='') {

 		if(isset($_GET['showcase_id'])){
	    	$data["purchased"] = $this->Showcase_model->add('showcase_orders', array('so_user_id'=>user_id(),'so_s_id'=>$_GET['showcase_id']));
  		}

	    $data["purchased"]= $this->Showcase_model->purchased('showcase_orders');
        $this->load->view('include/header');
        $this->load->view('purchased', $data);
        $this->load->view('include/footer');
	
	}


  	public function add() {

  		$data = [];
		if($this->input->post()){
			$data = $this->input->post();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('showcase_title', 'Title', 'required');
	        $this->form_validation->set_rules('showcase_content', 'Content', 'required');


	        if ($this->form_validation->run() === FALSE)
	        {
		        $this->load->view('include/header'); 
		        $this->load->view('add');
		        $this->load->view('include/footer');
	    	}else {
                
                $config = [];
                $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
				if($this->upload->do_upload('showcase_thumb')){
					$data['showcase_thumb'] = $this->upload->data('file_name');
				}
                
				if($this->upload->do_upload('showcase_image')){
					$data['showcase_image'] = $this->upload->data('file_name');
				}
                

            	unset($data['add_showcase']);
		        $response = $this->Showcase_model->add('showcases', $data);
                $this->session->set_flashdata('message', 'Showcase Added Successfully...');
                redirect('showcase');
                
	    	}
		}else 
	        {
		        $this->load->view('include/header'); 
		        $this->load->view('add', $data);
		        $this->load->view('include/footer');
	    	}

	}



  	public function edit($id='') {   

  		if($id == ''){
  			redirect('showcases');
  		}

  		$data = [];

		if($this->input->post()){
			$data = $this->input->post();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('showcase_title', 'Title', 'required');
	        $this->form_validation->set_rules('showcase_content', 'Content', 'required');
	        

	        if ($this->form_validation->run() === FALSE)
	        {
		        $this->load->view('include/header'); 
		        $this->load->view('edit');
		        $this->load->view('include/footer');
	    	}else {
                
                $config = [];
                $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
				if($this->upload->do_upload('showcase_thumb')){
					$data['showcase_thumb'] = $this->upload->data('file_name');
				}
                
				if($this->upload->do_upload('showcase_image')){
					$data['showcase_image'] = $this->upload->data('file_name');
				}
                

            	unset($data['add_showcase']);
		        $response = $this->Showcase_model->updateshowcase ('showcases', 'showcase_id', $id, $data);
                $this->session->set_flashdata('message', 'showcase Edited Successfully...');
                redirect('showcase');
                
	    	}
		}else 
	        {
			    $data["showcase"]= $this->Showcase_model->showcase('showcases',$id);
		        $this->load->view('include/header'); 
		        $this->load->view('edit', $data);
		        $this->load->view('include/footer');
	    	}

	}

	   public function delete($id)
    {
        check_admin();

        if (empty($id))
        {
            redirect('showcases');
        }
        $this->Showcase_model->delete_showcase($id);        
        redirect('showcase');        
    }


}
?>