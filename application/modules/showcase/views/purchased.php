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
            <i class="fa fa-suitcase"></i>
            <a href="<?= base_url('showcases'); ?>">showcases</a>
          </li>
        </ul>
        
      </div>
      <h3 class="page-title">
      ShowCase  

      <span class="pull-right">   
        <a href="<?= base_url('/web/'.'showcase.php');?>" class="btn btn-info">Purchase ShowCase</a>
        <?php if(is_admin()) {?>
        <a href="<?= base_url('showcase');?>" class="btn btn-info">All ShowCases</a>
        <?php } ?>
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
                  <th><strong>User Name</strong></th>
                  <th><strong>User Email </strong></th>
                  <th><strong>ShowCase Thumb</strong></th>
                  <th><strong>ShowCase Title</strong></th>
                  <th><strong>ShowCase Price</strong></th>
                  <th><strong>Purchased Created</strong></th>
                  <!-- <th><strong>Actions</strong></th> -->
                </tr>
              </thead>

            <tbody> 
              <?php foreach ($purchased as $showcase) { ?>
                <tr>
                	<td><?= $showcase->so_id; ?></td>
                	<td><?= $showcase->name; ?></td>
                	<td><?= $showcase->email; ?></td>
                  <td>
                  	<!-- <a href="<?//= base_url('showcases/view/'.$showcase->showcase_id); ?>"> -->
                  		<img style="max-width: 40px" src="<?= base_url().'/uploads/'.$showcase->showcase_thumb?>" alt="">
                  	<!-- </a> -->
                  </td>
                  <td>
                  	<!-- <a href="<?= base_url('showcases/view/'.$showcase->showcase_id); ?>"> -->
                  		<?= $showcase->showcase_title; ?>
                  	<!-- </a> -->
                  </td>

                  <td>
                  	<!-- <a href="<?= base_url('showcases/view/'.$showcase->showcase_id); ?>"> -->
                  		$<?=  $showcase->showcase_price; ?>
                  	<!-- </a> -->
                  </td> 
                  
                  <td>
                  	<!-- <a href="<?= base_url('showcases/view/'.$showcase->showcase_id); ?>"> -->
                  		<?=  date_format(date_create($showcase->so_created_at),"d/M/y g:ia"); ?>
                  	<!-- </a> -->
                  </td> 
                <!--   <td>
                    <a class="btn btn-warning" href="<?= base_url('showcase/edit/'.$showcase->showcase_id); ?>">Edit</a> |  
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this showcase?');" href="<?= base_url('showcase/delete/'.$showcase->showcase_id); ?>">Delete</a> 
                  </td> --> 
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