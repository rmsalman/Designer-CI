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
            <a href="<?= base_url('blogs'); ?>">Blogs</a>
          </li>
        </ul>
        
      </div>
      <h3 class="page-title">
      Blogs <small></small> 

      <span class="pull-right">   
        <a href="<?= base_url('blogs/add');?>" class="btn btn-info">Add Blog</a>
      </span>
      <div class="clearfix"></div>
      </h3>
      <!-- END PAGE HEADER-->
      <div class="row inbox">

        <div class="col-md-12">

          <div class="inbox-content">
                        
            <table id="sample_1_wrapper" class="table table-striped table-advance table-hover datatable">
              <thead>
                <tr>
                  <th><strong>ID</strong></th>
                  <th><strong>Thumb</strong></th>
                  <th><strong>Title</strong></th>
                  <th><strong>Content</strong></th>
                  <th><strong>Created At</strong></th>
                  <th><strong>Actions</strong></th>
                </tr>
              </thead>

            <tbody> 
              <?php foreach ($blogs as $blog) {?>
                <tr>
                  <td><a href="<?= base_url('blogs/view/'.$blog->blog_id); ?>">
                    <?= $blog->blog_id; ?>
                  </a></td>
                  <td><a href="<?= base_url('blogs/view/'.$blog->blog_id); ?>"><img style="max-width: 40px" src="<?= base_url().'/uploads/'.$blog->blog_thumb?>" alt=""></a></td>
                  <td><a href="<?= base_url('blogs/view/'.$blog->blog_id); ?>"><?= $blog->blog_title; ?></a></td>
                  <td><a href="<?= base_url('blogs/view/'.$blog->blog_id); ?>"><?= substr($blog->blog_content, 0, 30); ?></a></td>
                  <td><a href="<?= base_url('blogs/view/'.$blog->blog_id); ?>"><?=  date_format(date_create($blog->blog_created_at),"d/M/y g:ia"); ?></a></td> 
                  <td>
                    <a class="btn btn-warning" href="<?= base_url('blogs/edit/'.$blog->blog_id); ?>">Edit</a> | 
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Blog?');" href="<?= base_url('blogs/delete/'.$blog->blog_id); ?>">Delete</a> 
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