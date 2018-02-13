<?php 
	$user = $this->session->userdata();
	$usertype = $user['user_details'][0]->user_type;
?>
	<div class="page-content-wrapper">
		<div class="page-content">	
			<?php 
						$data = [];
						$data['x'] = 1;
						$data['orders'] = $orders;
						$data['users'] = $users;
						$data['usertype'] = $usertype;
			$this->load->view('partial_orderDetail', $data); ?>
		 </div>
	</div>	