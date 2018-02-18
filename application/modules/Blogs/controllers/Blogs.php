<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Blogs extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Blogs_model"); 
	}


  	public function index() {   
	    $data["blogs"]= $this->Blogs_model->allBlogs('blogs');
        $this->load->view('include/header'); 
        $this->load->view('index', $data);
        $this->load->view('include/footer');
	}

  	public function comments($id = '', $status = '') {

		if($id !== '' && $status !== '') {

				if($status == 1){
					$status = 0;
				}elseif ($status == 0) {
					$status = 1;
				} 
			    $this->Blogs_model->updateBlog('comments', 'comment_id', $id, array('comment_status' => $status) );

		}

	    $data["comments"]= $this->Blogs_model->comments('comments');

        $this->load->view('include/header'); 
        $this->load->view('comments', $data);
        $this->load->view('include/footer');
	}

  	public function view($id='') {   
	    $data["blogs"]= $this->Blogs_model->allBlogs('blogs');
        $this->load->view('include/header'); 
        $this->load->view('index', $data);
        $this->load->view('include/footer');
	}


  	public function add() {   

  		$data = [];
		if($this->input->post()){
			$data = $this->input->post();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('blog_title', 'Title', 'required');
	        $this->form_validation->set_rules('blog_content', 'Content', 'required');


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
				if($this->upload->do_upload('blog_thumb')){
					$data['blog_thumb'] = $this->upload->data('file_name');
				}
                
				if($this->upload->do_upload('blog_image')){
					$data['blog_image'] = $this->upload->data('file_name');
				}
                

            	unset($data['add_blog']);
		        $response = $this->Blogs_model->add('blogs', $data);
                $this->session->set_flashdata('message', 'Message Sent Successfully...');
                redirect('blogs');
                
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
  			redirect('blogs');
  		}

  		$data = [];

		if($this->input->post()){
			$data = $this->input->post();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('blog_title', 'Title', 'required');
	        $this->form_validation->set_rules('blog_content', 'Content', 'required');
	        

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
				if($this->upload->do_upload('blog_thumb')){
					$data['blog_thumb'] = $this->upload->data('file_name');
				}
                
				if($this->upload->do_upload('blog_image')){
					$data['blog_image'] = $this->upload->data('file_name');
				}
                

            	unset($data['add_blog']);
		        $response = $this->Blogs_model->updateBlog ('blogs', 'blog_id', $id, $data);
                $this->session->set_flashdata('message', 'Blog Edited Successfully...');
                redirect('blogs');
                
	    	}
		}else 
	        {
			    $data["blog"]= $this->Blogs_model->blog('blogs',$id);
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
            redirect('Blogs');
        }
        $this->Blogs_model->delete_blog($id);        
        redirect('blogs');        
    }


}
?>