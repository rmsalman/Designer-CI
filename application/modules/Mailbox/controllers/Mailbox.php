<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Mailbox extends CI_Controller {
  	function __construct() {
	    parent::__construct();
	    //Check user login
	    is_login();
	    $this->load->model("Mailbox_model"); 
	}


  	public function index($delete ='', $id='') {   
  		$data = [];
        if (isset($delete) && isset($id) && is_admin() )
        {
	        $this->db->where('mailbox_id', $id)->delete('mailbox'); 
        }

 		$data['allmsgs'] = $this->Mailbox_model->allmsgs(user_id());

        $this->load->view('include/header', $data); 
        $this->load->view('index');
        $this->load->view('include/footer');
	}


  	public function view($id) {   
  		$data = [];
 		$data['msg'] = $this->Mailbox_model->view('mailbox',$id);

 		if(is_admin()){
	 		$data['read'] = $this->Mailbox_model->updateMsg('mailbox', 'mailbox_id', $id, array('read_status_admin'=>1));	
 		}
 		if(is_user()){
	 		$data['read'] = $this->Mailbox_model->updateMsg('mailbox', 'mailbox_id', $id, array('read_status'=>1));	
 		}
 		if(is_designer()){
	 		$data['read'] = $this->Mailbox_model->updateMsg('mailbox', 'mailbox_id', $id, array('read_status_designer'=>1));
 		}

if(empty($data['msg'])){
	redirect('mailbox');
}

        $this->load->view('include/header', $data); 
        $this->load->view('view', $data);
        $this->load->view('include/footer');
	}

  	public function compose() {   
  		$data = [];
		if($this->input->post()){
			$data = $this->input->post();
	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('message', 'Message', 'required');

	        if ($this->form_validation->run() === FALSE)
	        {
		        $this->load->view('include/header'); 
		        $this->load->view('compose');
		        $this->load->view('include/footer');
	    	}else {
                
                $config = [];
                $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png|docx|doc|excel|notes|zip|txt';

                $this->load->library('upload', $config);
				if($this->upload->do_upload('fileone')){
					$data['fileone'] = $this->upload->data('file_name');
				}

            	unset($data['submit']);
		        $response = $this->Mailbox_model->insert('mailbox', $data);
                $this->session->set_flashdata('message', 'Message Sent Successfully...');
                redirect('mailbox/sent');
                
	    	}
		}else 
	        {
		        $this->load->view('include/header'); 
		        $this->load->view('compose');
		        $this->load->view('include/footer');
	    	}
	}

  	public function sent() {   
 		$data['allmsgs'] = $this->Mailbox_model->allmsgs_sent(user_id());
 		$data['is_sent'] = true;
        $this->load->view('include/header'); 
        $this->load->view('index', $data);
        $this->load->view('include/footer');
	}



}


?>