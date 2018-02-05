<div class="page-content-wrapper">
    <div class="page-content">
      
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url('dashboard');?>">Dashboard</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="javascript:;">Orders Status</a>
          </li>
        </ul>

      </div>
      <h3 class="page-title">
      Orders Status <small> <?= $this->uri->segment(3); ?></small>
      </h3>
      
      <div class="clearfix">
      </div>
<?php 
$data = [];
$data['orders'] = $orders;
        $this->load->view('partials/orders_table', $data); 
 ?>
    </div>
  </div>