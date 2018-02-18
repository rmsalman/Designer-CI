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

<?php if(validation_errors()){
  ?>
<div class="panel text-center panel-danger">
  <?php echo validation_errors(); ?>
</div>

  <?php
} ?>
    <div class="page-bar">
      <ul class="page-breadcrumb">
        <li>
          <i class="icon-envelope"></i>
          <a href="<?= base_url('showcases'); ?>">showcases</a>
        </li>
      </ul>
      
    </div>
    <h3 class="page-title">
    Edit showcase  
    </h3>
  
  <form action="<?= base_url('showcase/edit/'.$this->uri->segment(3)); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-3">Title</label>
      <div class="col-sm-9">
        <input type="text" name="showcase_title" class="form-control" required="required" value="<?= $showcase->showcase_title; ?>">
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3">Content</label>
      <div class="col-sm-9">
        <textarea name="showcase_content" class="form-control" id="edit" cols="30" rows="10" required="required"><?= $showcase->showcase_content; ?></textarea>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3">Thumbnail</label>
      <div class="col-sm-9">
        <input type="file" name="showcase_thumb" required="required" value="<?= $showcase->showcase_thumb; ?>">
      </div>
      <div class="clearfix"></div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3">Banner</label>
      <div class="col-sm-9">
        <input type="file" name="showcase_image" accept="image" required="required" value="<?= $showcase->showcase_thumb; ?>">
      </div>
      <div class="clearfix"></div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3"></label>
      <div class="col-sm-9">
        <button name="add_showcase" class="btn btn-primary">Edit showcase</button>
      </div>
      <div class="clearfix"></div>
    </div>


  </form>


  </div>
</div>



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