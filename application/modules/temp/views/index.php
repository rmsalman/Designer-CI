<div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
               Widget settings form goes here
            </div>
            <div class="modal-footer">
              <button type="button" class="btn blue">Save changes</button>
              <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

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
      <!-- END PAGE HEADER-->
      <!-- BEGIN DASHBOARD STATS -->
      <div class="row">
        <?php if(USER_TYPE !== 'Designer' ) { ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="total-orders.html">
            <div class="dashboard-stat blue-madison">
            <div class="visual">
              <i class="fa fa-comments"></i>
            </div>
            <div class="details">
              <div class="number">
                 <?= $total_plans[0]->total_plans; ?>
              </div>
              <div class="desc">
                 Total Plans
              </div>
            </div>
          </div>
          </a>
        </div>
        <?php } ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <a href="pending-orders.html">
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
          <a href="completed-orders.html">
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
          <a href="mailbox-admin.html">
          <div class="dashboard-stat purple-plum">
            <div class="visual">
              <i class="fa fa-globe"></i>
            </div>
            <div class="details">
              <div class="number">
                 +89%
              </div>
              <div class="desc">
                 Inbox
              </div>
            </div>

          </div>
        </a>
        </div>
      </div>
      <!-- END DASHBOARD STATS -->
      <div class="clearfix">
      </div>

    </div>
  </div>