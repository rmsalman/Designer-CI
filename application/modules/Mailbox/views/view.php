<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pages/css/inbox.css') ?>">
  <!-- BEGIN CONTENT -->

<?php $user = get_user($msg->send_from); ?>  

  <div class="page-content-wrapper">
    <div class="page-content">
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
            <!-- <h1 class="pull-left">Inbox</h1> -->
            
          </div>

          <div class="inbox-content">
            
<div class="inbox-header inbox-view-header">
  <h1 class="pull-left"><?= $msg->title; ?> <!-- <a href="javascript:;">
  Inbox </a> -->
  </h1>
  <!-- <div class="pull-right">
    <i class="fa fa-print"></i>
  </div> -->
</div>
<div class="inbox-view-info">
  <div class="row">
    <div class="col-md-7">
      <img style="max-width: 25px" src="<?= base_url('assets/images/'.$user->profile_pic); ?>">
      <span class="bold">
      <?= $msg->u2_name; ?>
      </span>

      to <span class="bold">
      
        
      <?= $msg->name; ?>
  
       </span>
      on <?= $msg->msg_created_at; ?>
    </div>
    
      </div>
    </div>
    <div class="inbox-view">
      
      <?= $msg->message; ?>


      <br>
      <hr>
      <strong>Attachment: </strong> <a target="_blank" href="<?= base_url('uploads/'. $msg->fileone);?>"><?= $msg->fileone; ?></a>
    </div>
    

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->
