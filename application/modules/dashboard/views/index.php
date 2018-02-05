<div class="page-content-wrapper">
    <div class="page-content">
      
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url('dashboard');?>">Dashboard</a>
          </li>
        </ul>

      </div>
      <h3 class="page-title">
      Dashboard <small>reports &amp; statistics</small>
      </h3>
      <!-- END PAGE HEADER-->
      <!-- BEGIN DASHBOARD STATS -->
      <div class="row">
        <?php if(USER_TYPE !== 'Designer' ) { ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="<?= base_url('orders/plans'); ?>">
            <div class="dashboard-stat blue-madison">
            <div class="visual">
              <i class="fa fa-comments"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?= $total_plans[0]->total_plans; ?>
              </div>
              <div class="desc">
                 Total Orders
              </div>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="<?= base_url('orders/orderstatus/pause'); ?>">
          <div class="dashboard-stat red-intense">
            <div class="visual">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?= $pause_orders[0]->orders; ?>
              </div>
              <div class="desc">
                 Paused Orders
              </div>
            </div>

          </div>
        </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="<?= base_url('orders/orderstatus/completed'); ?>">
          <div class="dashboard-stat green-haze">
            <div class="visual">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?= $done_orders[0]->orders; ?>
              </div>
              <div class="desc">
                 Completed Orders
              </div>
            </div>

          </div>
        </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="<?= base_url('orders/orderstatus/inprogress'); ?>">
          <div class="dashboard-stat purple-plum">
            <div class="visual">
              <i class="fa fa-globe"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?= $progress_orders[0]->orders; ?>
              </div>
              <div class="desc">
                 Inprogress
              </div>
            </div>

          </div>
        </a>
        </div>
      </div>
      <!-- END DASHBOARD STATS -->
      <div class="clearfix">
      </div>
<?php 
$data = [];
$data['orders'] = $orders;
        $this->load->view('partials/orders_table', $data); 
 ?>
    </div>
  </div>