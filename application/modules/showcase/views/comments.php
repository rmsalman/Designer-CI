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
            <a href="<?= base_url('blogs/comments'); ?>">Comments</a>
          </li>
        </ul>
        
      </div>
      <h3 class="page-title">
      Comments
      <div class="clearfix"></div>
      </h3>
      <!-- END PAGE HEADER-->
      <div class="row inbox">

        <div class="col-md-12">

          <div class="inbox-content">
                        
            <table id="sample_1_wrapper" class="table table-striped table-advance table-hover datatable">
              <thead>
                <tr>
                  <th><strong>#ID</strong></th>
                  <th><strong>Email</strong></th>
                  <th><strong>Name</strong></th>
                  <th><strong>Blog #Name</strong></th>
                  <th><strong>Comment</strong></th>
                  <th><strong>Comment Status</strong></th>
                  <th><strong>Created At</strong></th>
                  <th><strong>Actions</strong></th>
                </tr>
              </thead>

            <tbody> 
              <?php foreach ($comments as $comment) {
if($comment->comment_status == 1){
  $status = 'Block';
  $class = 'btn-success';
  $text = 'Show';
}else {
  $text = 'Block';
  $status = 'Show';
  $class = 'btn-warning';
}
?>
                <tr>
                  <td><?= $comment->comment_id; ?></td>
                  <td><img style="max-width: 40px" src="<?= base_url().'/uploads/'.$comment->blog_thumb?>" alt=""></td>
                  <td><?= $comment->comment_name; ?></td>
                  <td><?= '#'.$comment->blog_id.' '. $comment->blog_title; ?></td>
                  <td><?= $comment->comment; ?></td>
                  <td><?= $text; ?></td>
                  <td><?=  date_format(date_create($comment->comment_created_at),"d/M/y g:ia"); ?></td>
                  <td>
                    <a class="btn <?= $class; ?>" href="<?= base_url('blogs/comments/'.$comment->comment_id.'/'. $comment->comment_status ); ?>"><?= $status;; ?></a> 
                  </td> 
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