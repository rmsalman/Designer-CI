<?php 
	$usertype = $user['user_details'][0]->user_type;
?>	<!-- BEGIN CONTENT -->
<style>
.pay_btn {
    position: absolute;
    right: 17px;
    top: 2px;
}

.accordion-toggle {
    position: relative;
}


.ver-inline-menu li {
    margin-right: 10px;
    min-width: 160px;
    display: inline-block;
}

ul.ver-inline-menu.margin-bottom-10 {
    overflow: hidden;
    text-align: center;
}

.ver-inline-menu li.active:after {
    top: 41px;
}
ul.ver-inline-menu.margin-bottom-10 li a {
    line-height: 2.6;
}
</style>
	<div class="page-content-wrapper">
		<div class="page-content">


			<h3 class="page-title">
			<?= $plan_count[0]->title; ?> <small><span style="padding: 12px;height: 37px;" class="badge badge-roundless badge-danger pull-right">max orders <?= intval($plan_count[0]->designs_allowed) ?></span></small>
			</h3>
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-briefcase"></i>
						<a href="<?= base_url('plans/index/'. $this->uri->segment(4)); ?>">Plans</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="javascript:;"><?= $plan_count[0]->title; ?></a>
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
				<div class="col-md-12">
					<ul class="ver-inline-menu tabbable margin-bottom-10">
						
						<?php 
						$x = 1;
						foreach($plan_count as $plan_counts) {









						?>
					    <li class="<?php if($x==1){ echo 'active';}?>">
							<a data-toggle="tab" href="#tab_<?= $x; ?>">
							<!-- <i class="fa fa-briefcase"></i>  -->
							Plan <strong>#<?= $plan_counts->plan_order_id; ?></strong> 

								<span style="padding: 12px;height: 37px;" class="badge badge-roundless badge-danger pull-right">
									<?php

										$days_left = '';
										if($plan_counts->po_created_at > 1 && $plan_counts->is_paid){	
											$date = new DateTime($plan_counts->po_created_at);
											$now = new DateTime();
											$days_left = $date->diff($now);
								 			$days_left = $date->diff($now)->format("%R%a");

												 if($days_left<0){
												 	$days_left = 0;
												 }
												 echo 'Days Left ' .intval($days_left);
										}
										else 
										{
											echo 'Not Paid';	
										}
 ?>
									</span>
							
							<span class="clearfix"></span>
						</a>
							<span class="after">
							</span>
						</li>
					    <?php $x++; } ?>
					</ul>
				</div>
				<div class="col-md-12">
					<div class="tab-content">

						<?php 
						$x = 1;
						foreach($plan_count as $plan_counts) {
							if(is_user()){
								$orders = $this->Plans_model->plan_order_id('orders', user_id() , $plan_counts->plan_order_id);
							}else {
								$orders = $this->Plans_model->plan_order_id('orders', $this->uri->segment(4) , $plan_counts->plan_order_id);
							}

							$total_orders = count($orders);
							$orders_allowed = intval($plan_counts->designs_allowed);
						?>

						<div id="tab_<?= $x; ?>" class="tab-pane <?php if($x==1){ echo 'active';}?>">
							<div id="accordion<?= $x; ?>" class="panel-group">

	<?php if($usertype== 'Member'){ 

if($total_orders  <= $orders_allowed - 1) {	

		?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_1_1">
										1. Next Order Please! </a>
											<?php if(!$plan_counts->is_paid){ ?>										
												<a href="<?= base_url('authorize/index/plan/'.$orders[0]->plan_order_id.'/'.$plan_counts->price); ?>" class="pay_btn pull-right btn btn-primary">Pay First</a>
											<?php } ?>
											<span class="clearfix"></span>

										</h4>
									</div>
									<div id="accordion<?= $x; ?>_1_1" class="panel-collapse collapse in">
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
								<?php } } ?>

		<?php
									$y = 1+$x;
									$z = 3+ $y;
									foreach ($orders as $order) {
									
									?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $y; ?>_<?= $x; ?>">
										<?= $order->order_title; ?> </a>
										</h4>
									</div>
									<div id="accordion<?= $y; ?>_<?= $x; ?>" class="panel-collapse collapse">

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

<?php 
if($plan_counts->is_paid && $order->user_status == 2){
?> 	
	<a href="<?= base_url('mailbox/compose');?>">Request to change status</a>
<?php														
}else {
	?>
	<select class="form-control" name="user_status">
		<?php 
			echo  status_select($order->user_status); 
		?>
	</select>
<?php
}
 ?>
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
													<?= status($order->designer_status); ?>
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
												<?= status_select($order->admin_status); ?>
											</select>
											<h3>Admin Notes</h3>
												<textarea rows="3" name="admin_notes" class="form-control"><?= $order->admin_notes; ?></textarea>
												<br>

												<select  name="designer_id" class="form-control" >
													<option value="">Choose Designer</option>
												<?php 
													foreach ($users as $user) {
														?>
															<option <?php


															if($user->users_id == $order->designer_id ) {
																echo 'selected=selected';
															}

															?> value="<?= $user->users_id ?>"><?= '#'.$user->users_id .' '. $user->name ?></option>
														<?php
													}
												 ?>
												</select>

												<h3>Status for Designer from Admin</h3>
												<select name="admin_status_to_designer" class="form-control">
												<?= status_select($order->admin_status_to_designer) ?>
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
									$y++;
									$z++;  }
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