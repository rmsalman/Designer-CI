<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/pages/css/inbox.css') ?>">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/froala_editor.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/froala_style.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/code_view.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/draggable.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/colors.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/emoticons.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/image_manager.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/image.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/line_breaker.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/table.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/char_counter.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/video.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/fullscreen.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/file.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/quick_insert.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/help.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/third_party/spell_checker.css');?>">
  <link rel="stylesheet" href="<?= base_url('assets/flora/css/plugins/special_characters.css');?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">



  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">


      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="icon-envelope"></i>
            <a href="<?= base_url('mailbox'); ?>">Mail-Box</a>
          </li>

        </ul>
        
      </div>
      <h3 class="page-title">
      Compose <small>Message</small>
      </h3>

     <!-- END PAGE HEADER-->
      <div class="row inbox">
        <div class="col-md-2">
          <ul class="inbox-nav margin-bottom-10">
            <li class="compose-btn">
              <a href="<?= base_url('mailbox/compose'); ?>" data-title="Compose" class="btn green">
              <i class="fa fa-edit"></i> Compose </a>
            </li>
            <li class="inbox ">
              <a href="<?= base_url('mailbox'); ?>" class="btn" data-title="Inbox">
              Inbox</a>
              <b></b>
            </li>
            <li class="sent">
              <a class="btn" href="<?= base_url('mailbox/sent'); ?>" data-title="Sent">
              Sent </a>
              <b></b>
            </li>
          </ul>
        </div>
        <div class="col-md-10">

<?php if(validation_errors()){
?>
  <div class="panel text-center panel-danger">
    <?php echo validation_errors(); ?>
  </div>

  <?php
} ?>
 
<?php if(!empty($message)){
?>
  <div class="panel text-center panel-danger">
    <?php echo $message; ?>
  </div>

  <?php
} ?>
 
          <div class="inbox-header">
            <h1 class="pull-left">Compose</h1>            
          </div>

          <div class="inbox-content">
<form method="POST" enctype="multipart/form-data">
              <?php 
               if(is_admin()){  
              ?>
                <input type="hidden" name="send_to" value="<?= $this->uri->segment('3'); ?>">

                <input type="hidden" name="send_from" value="<?= user_id(); ?>">
              <?php
                }else {
              ?>
                <input type="hidden" name="send_to" value="1">
                <input type="hidden" name="send_from" value="<?= user_id(); ?>">
              <?php
                }
              ?>

              <?php if(is_admin()){ ?>
              <div class="form-group">
                <label class="col-sm-3 control-label">To</label>  
                <div class="col-sm-9">
                
                  <?php 
                    $users = get_users();
                  ?>
                  <select name="send_to" class="form-control">
                    <?php foreach ($users as $uza) {
                    ?>
                      <option value="<?= $uza->users_id; ?>">#<?= $uza->users_id .' '. $uza->name;  ?></option>
                    <?php

                    } ?>
                  </select>
    
                </div>
                <div class="clearfix"></div> 
              </div>
<?php } ?>
              <div class="form-group">
                <label class="col-sm-3 control-label">Subject</label>  
                <div class="col-sm-9"><input type="text" class="form-control" name="title" value="<?= set_value('title'); ?>"></div>
                <div class="clearfix"></div> 
              </div>

              
              <div class="form-group">
                <label class="col-sm-3 control-label">Message</label>  
                <div class="col-sm-9">
                  <textarea rows="8" cols="5" class="form-control" id="edit" name="message"><?= set_value('message'); ?></textarea>
                </div>
                <div class="clearfix"></div> 
              </div>

             
              <div class="form-group">
               <label class="col-sm-3 control-label">Attachment #1</label>  
                <div class="col-sm-9">
                  <input type="file" name="fileone">
                </div>
                <div class="clearfix"></div> 
              </div>

              <div class="form-group">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-info">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT -->




  <script type="text/javascript" src="<?= base_url('assets/flora/js/froala_editor.min.js');?>" ></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/align.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/char_counter.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/code_beautifier.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/code_view.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/colors.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/draggable.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/emoticons.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/entities.min.js');?>"></script>
  <!-- <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/file.min.js');?>"></script> -->
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/font_size.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/font_family.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/fullscreen.min.js');?>"></script>
  <!-- <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/image.min.js');?>"></script> -->
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/image_manager.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/line_breaker.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/inline_style.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/link.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/lists.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/paragraph_format.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/paragraph_style.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/quick_insert.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/quote.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/table.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/save.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/url.min.js');?>"></script>
  <!-- <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/video.min.js');?>"></script> -->
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/help.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/print.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/third_party/spell_checker.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/special_characters.min.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/flora/js/plugins/word_paste.min.js');?>"></script>

  <script>
    $(function(){
      $('#edit').froalaEditor({
        // Set the image upload parameter.
        imageUploadParam: 'image_param',
 
        // Set the image upload URL.
        imageUploadURL: '<?= base_url('uploads')?>',
 
        // Additional upload params.
        imageUploadParams: {id: 'my_editor'},
 
        // Set request type.
        imageUploadMethod: 'POST',
 
        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,
 
        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png']
      })
    });
  </script>