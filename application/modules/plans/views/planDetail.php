<?php 
	$usertype = $user['user_details'][0]->user_type;
?>
	<!-- BEGIN CONTENT -->
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

	<?php if($usertype== 'member'){ ?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_1">
										1. Next Order Please! </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_1" class="panel-collapse collapse in">
										<div class="panel-body">
											<form class="form-horizontal" method="POST">
												<input type="hidden" name="user_id" value="1">
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
														<input type="text" name="user_attachment" class="form-control">
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
<!-- 
								<div class="panel panel-warning">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_4">
										4. Wolf moon officia aute, non cupidatat skateboard dolor brunch! </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_4" class="panel-collapse collapse ">

										<div class="panel-body">
											<h3>Status: Paused</h3>
											<p><strong>Text 1</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p><strong>Text 2</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p>Option</p>

											<form>
											<hr>

											<h3>My Notes </h3>
											<textarea rows="3" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</textarea>

											<h3>Admin Notes</h3>
												<textarea rows="3" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</textarea>
												<br>

												<select class="form-control" >
													<option value="">Choose Designer</option>
												<?php 
													foreach ($users as $user) {
														?>
															<option value="<?= $user->users_id ?>"><?= '#'.$user->users_id .' '. $user->name ?></option>
														<?php
													}
												 ?>
												</select>
												<br>
												<select class="form-control">
													<option value="3">Done</option>
													<option value="2" selected="selected">In Progress</option>
													<option value="1">Status Paused</option>
												</select>


												<h3>Notes For Designer</h3>

												<textarea rows="3" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</textarea>
												

												<h3>Designer Notes</h3>

												<textarea rows="3" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</textarea>
												
												<br>
												<button class="btn btn-success">Submit</button>
											</form>

												<br>
										</div>
									</div>
								</div>
								<div class="panel panel-success">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_3">
										3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_3" class="panel-collapse collapse">

										<div class="panel-body">
											<h3>Status: Done</h3>
											<p><strong>Text 1</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p><strong>Text 2</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p>Option</p>

											<hr>

											<h3>My Notes </h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</p>

											<h3>Last Admin Notes</h3>
											<form>
												<textarea rows="5" class="form-control">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</textarea>
												<br>
												<button class="btn btn-success">Submit</button>
											</form>

												<br>
											<p>Files: <a href="#">File_to_download.png</a></p>
										</div>
									</div>
								</div>
								<div class="panel panel-danger">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_5">
										5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_5" class="panel-collapse collapse">

										<div class="panel-body">
											<h3>Status: Canceled</h3>
											<p><strong>Text 1</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p><strong>Text 2</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p>Option</p>

											<hr>

											<h3>My Notes </h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</p>

											<h3>Last Admin Notes</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</p>
										</div>

									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_6">
										6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
										</h4>
									</div>
									<div id="accordion<?= $x; ?>_6" class="panel-collapse collapse">
										
										<div class="panel-body">
											<h3>Status: In Progress</h3>
											<p><strong>Text 1</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p><strong>Text 2</strong>
												 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</p>
											<p>Option</p>

											<hr>

											<h3>My Notes </h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</p>

											<h3>Last Admin Notes</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											</p>
										</div>
									</div>
								</div> -->

		<?php
			$orders = $this->Plans_model->get_data_by(ORDERS, $plan_counts->plan_order_id, USER_ID);

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
											<h3>Status: In Progress</h3>
											<p><strong>Text 1</strong>
												 <?= $order->field_1; ?>
											</p>
											<p><strong>Text 2</strong>
												 <?= $order->field_2; ?>
											</p>
											<p>Option</p>

											<hr>

											<form method="POST">
											<input type="hidden" name="id" value="<?= $order->id; ?>">
<?php if($usertype== 'member' || $usertype== 'admin'){ ?>
											<h3>User Status</h3>
											
	<?php if($usertype== 'member'){ ?>
											<select class="form-control" name="user_status">
												<option value="0" selected="selected">Status Paused</option>
												<option value="1">In Progress</option>
												<option value="2">Done</option>
											</select>
	<?php }
	if($usertype== 'admin'){ ?>
											<p><?= $order->user_status; ?></p>	
	<?php } ?>
											<h3>Admin Status</h3>
											<p><?= $order->admin_status; ?></p>

											<h3>User Notes </h3>

	<?php	if($usertype== 'member'){ ?>
											<textarea rows="3" name="user_notes" class="form-control"><?= $order->user_notes; ?></textarea>
	<?php } 
	if($usertype== 'admin'){ ?>
											<p><?= $order->user_notes; ?></p>
	<?php }?>



											<h3>Admin Notes</h3>
											<p><?= $order->admin_notes; ?></p>
	

											<h3>User Attachment</h3>
	<?php if($usertype== 'member'){ ?>
											<input type="text" name="user_attachment" class="form-control" value="<?= $order->user_attachment; ?>">
	<?php } ?>
											<p>
												<a href="javascript:;"><?= $order->user_attachment; ?></a>
											</p>

											<h3>Admin Attachment</h3>
											<p>
												<a href="javascript:;"><?= $order->admin_attachment; ?></a>
											</p>


<?php  } ?>


<?php if($usertype== 'designer' || $usertype== 'admin'){ ?> <h3>Designer Status</h3>

	<?php if($usertype== 'designer'){ ?>
												<select name="designer_status" class="form-control">
													<option value="0" selected="selected">Status Paused</option>
													<option value="1">In Progress</option>
													<option value="2">Done</option>
												</select>
	<?php } 
	if($usertype== 'admin'){ ?>
												<p><?= $order->designer_status; ?></p>

	<?php } ?>
											<h3>Admin Status</h3>
											<p><?= $order->admin_status; ?></p>

											

											<h3>Designer Notes</h3>
	<?php 	if($usertype== 'designer'){ ?>
											<textarea name="designer_notes" rows="3" class="form-control"><?= $order->designer_notes; ?></textarea>
	<?php } ?>										
	<?php 	if($usertype== 'admin'){ ?>
											<p><?= $order->designer_notes; ?></p>
	<?php } ?>						
											<h3>Admin Notes</h3>
											<p><?= $order->admin_notes; ?></p>
												
												

												<h3>Designer Attachment</h3>
<?php 	if($usertype== 'designer'){ ?>
												<input type="text" name="designer_attachment" class="form-control">
<?php } ?>
												<p>
													<a href="javascript:;"><?= $order->designer_attachment; ?></a>
												</p>

											<h3>Admin Attachment</h3>
											<p>
												<a href="javascript:;"><?= $order->admin_attachment; ?></a>
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
											<input type="text" name="admin_attachment" class="form-control" value="<?= $order->admin_attachment; ?>">
<?php } ?>
												<button type="submit" name="update_design" class="btn btn-success">Submit</button>
											</form>

										</div>
									</div>
								</div>
								<?php
									}
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