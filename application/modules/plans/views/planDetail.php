<?php 
	$usertype = $user['user_details'][0]->user_type;
?>	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">


			<h3 class="page-title">
			Plans <small>all scured plans</small>
			</h3>
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-briefcase"></i>
						<a href="plans-admin.html">Plans</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="javascript:;">Pro</a>
					</li>
				</ul>

			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->

<style>
a:hover {
    text-decoration: none;
}
</style>

	



			<!-- BEGIN PAGE CONTENT-->

				<?php if($this->session->flashdata("message")){?>
				  <div class="alert alert-info">      
				    <?php echo $this->session->flashdata("message")?>
				  </div>
				<?php } ?>

			<div class="row">
				<div class="col-md-3">
					<ul class="ver-inline-menu tabbable margin-bottom-10">
						
						<?php 
						$x = 1;

						foreach($plan_count as $plan_counts) {
						?>
					    <li class="<?php if($x==1){ echo 'active';}?>">
							<a data-toggle="tab" href="#tab_<?= $x; ?>">
							<i class="fa fa-briefcase"></i> Plan <strong>#<?= $plan_counts->plan_order_id; ?></strong></a>
							<span class="after">
							</span>
						</li>
					    <?php $x++; } ?>
					</ul>
				</div>
				<div class="col-md-9">
					<div class="tab-content">

						<?php 
						$x = 1;
						foreach($plan_count as $plan_counts) {
						?>

						<div id="tab_<?= $x; ?>" class="tab-pane <?php if($x==1){ echo 'active';}?>">
							<div id="accordion<?= $x; ?>" class="panel-group">

	<?php if($usertype== 'Member'){ ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_1">
										1. Next Order Please! </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_1" class="panel-collapse collapse in">
										<div class="panel-body">
											<form class="form-horizontal" method="POST"  enctype="multipart/form-data">
												<input type="hidden" name="user_id" value="<?= user_id(); ?>">
												<input type="hidden" name="plan_id" value="<?=$this->uri->segment(3)?>">
												<input type="hidden" name="plan_order_id" value="<?= $plan_counts->plan_order_id?>">

												<div class="form-group">	
													<label class="col-sm-3 text-right">Name</label>
													<div class="col-sm-9">
														<input type="text" name="order_title" class="form-control">
													</div>		
												</div>
												<div class="form-group">	
													<label class="col-sm-3 text-right">Text 1</label>
													<div class="col-sm-9">
														<input type="text" name="field_1" class="form-control">
													</div>		
												</div>
												<div class="form-group">	
													<label class="col-sm-3 text-right">Text 2</label>
													<div class="col-sm-9">
														<input type="text" name="field_2" class="form-control">
													</div>		
												</div>
												<div class="form-group">	
													<label class="col-sm-3 text-right">User Notes</label>
													<div class="col-sm-9">
														<textarea name="user_notes" class="form-control" rows="6"></textarea>
													</div>		
												</div>
												
												<div class="form-group">	
													<label class="col-sm-3 text-right">Attachment</label>
													<div class="col-sm-9">
														<input type="file" name="user_attachment" class="for m-control">
													</div>		
												</div>


												<div class="form-group text-center">	
													<button type="submit" name="design"  class="btn btn-success">Submit Design</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<?php } ?>

		<?php

			

									foreach ($orders as $order) {
									
									?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_7">
										<?= $order->order_title; ?> </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_7" class="panel-collapse collapse">

										<div class="panel-body">

											<p><strong>Text 1</strong>
												 <?= $order->field_1; ?>
											</p>
											<p><strong>Text 2</strong>
												 <?= $order->field_2; ?>
											</p>


											<hr>

											<form method="POST" enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?= $order->id; ?>">
<?php if($usertype== 'Member' || $usertype== 'admin'){ ?>
											<h3>User Status</h3>
											
	<?php if($usertype== 'Member'){ ?>
											<select class="form-control" name="user_status">
												<option value="0" selected="selected">Status Paused</option>
												<option value="1">In Progress</option>
												<option value="2">Done</option>
											</select>
	<?php }
	if($usertype== 'admin'){ ?>
											<p><?= status($order->user_status); ?></p>	
	<?php } ?>
											<h3>Admin Status</h3>
											<p><?= status($order->admin_status); ?></p>

											<h3>User Notes </h3>

	<?php	if($usertype== 'Member'){ ?>
											<textarea rows="3" name="user_notes" class="form-control"><?= $order->user_notes; ?></textarea>
	<?php } 
	if($usertype== 'admin'){ ?>
											<p><?= $order->user_notes; ?></p>
	<?php }?>



											<h3>Admin Notes</h3>
											<p><?= $order->admin_notes; ?></p>
	

											<h3>User Attachment </h3><a target="_blank" href="<?= base_url('uploads/'.$order->user_attachment); ?>"><?= $order->user_attachment; ?></a>
	<?php if($usertype== 'Member'){ ?>
											<input type="file" name="user_attachment" class="form-c ontrol" value="<?= $order->user_attachment; ?>">
	<?php } ?>
											<!-- <p>
												<a href="<?= base_url('uploads/'.$order->user_attachment);?>"><?= $order->user_attachment; ?></a>
											</p> -->

											<h3>Admin Attachment</h3>
											<p>
												<a target="_blank" href="<?= base_url('uploads/'.$order->admin_attachment);?>"><?= $order->admin_attachment; ?></a>
											</p>


<?php  } ?>


<?php if($usertype== 'Designer' || $usertype== 'admin'){ ?> <h3>Designer Status</h3>

	<?php if($usertype== 'Designer'){ ?>
												<select name="designer_status" class="form-control">
													<option value="0" selected="selected">Status Paused</option>
													<option value="1">In Progress</option>
													<option value="2">Done</option>
												</select>
	<?php } 
	if($usertype== 'admin'){ ?>
												<p><?= status($order->designer_status); ?></p>

	<?php } ?>
											<h3>Admin Status</h3>
											<p><?= status($order->admin_status); ?></p>

											

											<h3>Designer Notes</h3>
	<?php 	if($usertype== 'Designer'){ ?>
											<textarea name="designer_notes" rows="3" class="form-control"><?= $order->designer_notes; ?></textarea>
	<?php } ?>										
	<?php 	if($usertype== 'admin'){ ?>
											<p><?= $order->designer_notes; ?></p>
	<?php } ?>						
											<h3>Admin Notes</h3>
											<p><?= $order->admin_notes; ?></p>
												
												

												<h3>Designer Attachment</h3>
<?php 	if($usertype== 'Designer'){ ?>
												<input type="text" name="designer_attachment" class="form-control">
<?php } ?>
												<p>
													<a href="<?= base_url('uploads/'.$order->designer_attachment);?>"><?= $order->designer_attachment; ?></a>
												</p>

											<h3>Admin Attachment</h3>
											<p>
												<a href="<?= base_url('uploads/'.$order->admin_attachment_to_designer);?>"><?= $order->admin_attachment_to_designer; ?></a>
											</p>
<?php } ?>



<?php if($usertype== 'admin'){ ?>
											<h3>Admin Status</h3>
											<select class="form-control" name="admin_status">
												<option value="0" selected="selected">Status Paused</option>
												<option value="1">In Progress</option>
												<option value="2">Done</option>
											</select>
											<h3>Admin Notes</h3>
												<textarea rows="3" name="admin_notes" class="form-control"><?= $order->admin_notes; ?></textarea>
												<br>

												<select  name="designer_id" class="form-control" >
													<option value="">Choose Designer</option>
												<?php 
													foreach ($users as $user) {
														?>
															<option value="<?= $user->users_id ?>"><?= '#'.$user->users_id .' '. $user->name ?></option>
														<?php
													}
												 ?>
												</select>

												<h3>Status for Designer from Admin</h3>
												<select name="admin_status_to_designer" class="form-control">
													<option value="0" selected="selected">Status Paused</option>
													<option value="1">In Progress</option>
													<option value="2">Done</option>
												</select>

												<h3>Notes For Designer</h3>
												<textarea name="notes_admin_to_designer" rows="3" class="form-control"><?= $order->notes_admin_to_designer; ?></textarea>

											<h3>Admin Attachment</h3>
											<input type="file" name="admin_attachment_to_designer" class="form-cont rol" value="<?= $order->admin_attachment_to_designer; ?>">
<?php } ?>
												<button type="submit" name="update_design" class="btn btn-success">Submit</button>
											</form>

										</div>
									</div>
								</div>
								<?php
									$x++;  }
								 	?>
							</div>
						</div>

					    <?php $x++; } ?>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->

			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>

		</div>
	</div>
	<!-- END CONTENT -->