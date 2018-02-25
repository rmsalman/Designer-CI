<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize extends CI_Controller {

	

	public function __construct(){
		parent::__construct();
		$this->load->library("myauthorize");
		$this->load->model('Public_model');			
	}

	public function index($item = '', $id = '', $price='')
	{				

        $this->load->view('include/header'); 
        $this->load->view('authorize', compact('item', 'id', 'price'));
        $this->load->view('include/footer');
	}

	public function pushPayment(){
		$data = [];
		$dataCustomers=array("fname"=>$this->input->post('fname'),
							 "lname"=>$this->input->post('lname'),
							 "address"=>$this->input->post('address'),
							 "city"=>$this->input->post('city'),
							 "state"=>$this->input->post('state'),
							 "country"=>$this->input->post('country'),
							 "zip"=>$this->input->post('zip'),
							 "phone"=>$this->input->post('phone'),
							 "email"=>$this->input->post('email'),
							 "cnumber"=>$this->input->post('cnumber'),
							 "cexpdate"=>$this->input->post('cexpdate'),
							 "ccode"=>$this->input->post('ccode'),
							 "cdesc"=>$this->input->post('cdesc'),
							 "amount"=>$this->input->post('camount'));

		$data['result'] = $result = $this->myauthorize->chargerCreditCard($dataCustomers);
		$item = '';
		$id = '';


			if(!empty($this->input->post('item')) && !empty($this->input->post('id'))){
				$item = $this->input->post('item');
				$id   = $this->input->post('id');
			}

		if($result['status'] == true){

			if(!empty($this->input->post('item')) && !empty($this->input->post('id'))){
				$item = $this->input->post('item');
				$id   = $this->input->post('id');
				if($item == 'plan'){
	   					$this->Public_model->update_public('plan_orders', 'id', $id, array('is_paid'=>1));
				}
				elseif 
				($item == 'showcase') {
					$this->Public_model->update_public('showcase_orders', 'so_id', $id, array('so_is_paid'=>1));
				}
			}

		        $this->load->view('include/header'); 
		        $this->load->view('thanks', $data);
		        $this->load->view('include/footer');

		}else {

		        $this->load->view('include/header'); 
		        $this->load->view('authorize', compact('item', 'id', 'result'));
		        $this->load->view('include/footer');

		}





	}	
}
