<div class="page-content-wrapper">
    <div class="page-content">
      
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url();?>">Dashboard</a>
          </li>
        </ul>

      </div>
      <h3 class="page-title">
      Dashboard <small>reports &amp; statistics</small>
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