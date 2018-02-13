<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pages/css/inbox.css') ?>">
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">

      <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <!-- BEGIN STYLE CUSTOMIZER -->

      <!-- END STYLE CUSTOMIZER -->
      <!-- BEGIN PAGE HEADER-->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="icon-envelope"></i>
            <a href="<?= base_url('mailbox'); ?>">Mail-Box</a>
          </li>
        </ul>
        
      </div>
      <h3 class="page-title">
      Inbox <small>user inbox</small>
      </h3>
      <!-- END PAGE HEADER-->
      <div class="row inbox">
        <div class="col-md-2">
          
          <ul class="inbox-nav margin-bottom-10">
            <li class="compose-btn">
              <a href="<?= base_url('mailbox/compose'); ?>" data-title="Compose" class="btn green">
              <i class="fa fa-edit"></i> Compose </a>
            </li>
            <li class="inbox <?php if(!isset($is_sent)){echo 'active';}?>">
              <a href="<?= base_url('mailbox'); ?>" class="btn" data-title="Inbox">
              Inbox</a>
              <b></b>
            </li>
            <li class="sent <?php if(isset($is_sent)){echo 'active';}?>">
              <a class="btn" href="<?= base_url('mailbox/sent'); ?>" data-title="Sent">
              Sent </a>
              <b></b>
            </li>
          </ul>
        </div>
        <div class="col-md-10">
          <div class="inbox-header">
            <h1 class="pull-left"><?php if(isset($is_sent)){echo 'Sent';}else {echo 'Inbox';}?></h1>
            
          </div>

          <div class="inbox-content">
                        
            <table id="sample_1_wrapper" class="table table-striped table-advance table-hover datatable">


              <thead>
                <tr>
                  <th><strong><?php if(isset($is_sent)){echo 'To';}else {echo 'From';}?></strong></th>
                  <th><strong>Message</strong></th>
                  <th><strong>Sent at</strong></th>
                </tr>
              </thead>

            <tbody> 
              <?php foreach ($allmsgs as $msg) {?>
                <tr <?php if($msg->read_status == 0){ echo 'class="unread"'; } ?>>
                  <td <?php if($msg->read_status == 0){ echo 'class="view-message"'; } ?>><a href="<?= base_url('mailbox/view/'.$msg->mailbox_id); ?>"><?= $msg->name; ?></a></td>
                  <td <?php if($msg->read_status == 0){ echo 'class="view-message"'; } ?>><a href="<?= base_url('mailbox/view/'.$msg->mailbox_id); ?>"><?= substr($msg->message, 0, 30); ?></a></td>
                  <td <?php if($msg->read_status == 0){ echo 'class="view-message"'; } ?>><a href="<?= base_url('mailbox/view/'.$msg->mailbox_id); ?>"><?=  date_format(date_create($msg->msg_created_at),"d/M/y g:ia"); ?></a></td> 
                </tr>
              <?php } ?> 
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->