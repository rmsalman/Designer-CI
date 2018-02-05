
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
									<div id="accordion<?= $x; ?>_7" class="panel-collapse collapse in">

										<div class="panel-body">
											<p><strong>Text 1</strong>
												 <?= $order->field_1; ?>
											</p>
											<p><strong>Text 2</strong>
												 <?= $order->field_2; ?>
											</p>

											<hr>

											<form method="POST">
											<input type="hidden" name="id" value="<?= $order->id; ?>">
<?php if($usertype== 'member' || $usertype== 'admin'){ ?>
											<p>User Status
<?php
	if($usertype== 'admin'){ ?>
											<strong><?= status($order->user_status); ?></strong>	
	<?php } ?>
											</p>
											
	<?php if($usertype== 'member'){ ?>
											<select class="form-control" name="user_status">
													<?= status_select($order->user_status); ?>
											</select>
	<?php }?>
											<p>Admin Status <strong><?= status($order->admin_status); ?></strong></p>
											

											<p>User Notes 
<?php	if($usertype== 'admin'){ ?>
											<strong><?= $order->user_notes; ?></strong>
	<?php }?></p>

	<?php	if($usertype== 'member'){ ?>
											<textarea rows="3" name="user_notes" class="form-control"><?= $order->user_notes; ?></textarea>

	<?php } ?>

<br>

											<p>Admin Notes <strong><?= $order->admin_notes; ?></strong></p>
											
	

											<p>User Attachment <strong><a href="javascript:;"><?= $order->user_attachment; ?></a></strong></p>
	<?php if($usertype== 'member'){ ?>
											<input type="text" name="user_attachment" class="form-control" value="<?= $order->user_attachment; ?>">
	<?php } ?>
											
											<p>Admin Attachment <strong><a href="javascript:;"><?= $order->admin_attachment; ?></a></strong></p>
											
<?php  } ?>

											<hr>

<?php if($usertype== 'designer' || $usertype== 'admin'){ ?> <p>Designer Status  
	<?php if($usertype== 'admin'){ ?>
												<strong><?= status($order->designer_status); ?></strong>

	<?php } ?></p>

	<?php if($usertype== 'designer'){ ?>
												<select name="designer_status" class="form-control">
													<?= status_select($order->designer_status); ?>
												</select>
												<br>
	<?php }?>
									<p>Admin Status <strong><?= status($order->admin_status); ?></strong></p>
											

											<p>Designer Notes	<?php if($usertype== 'admin'){ ?>
											<strong><?= $order->designer_notes; ?></strong>	<?php } ?>		</p>
	<?php 	if($usertype== 'designer'){ ?>
											<textarea name="designer_notes" rows="3" class="form-control"><?= $order->designer_notes; ?></textarea>
											
	<?php } ?>					
											<p>Admin Notes <strong><?= $order->admin_notes; ?></strong></p>
											
												
												

												<p>Designer Attachment <strong><a href="javascript:;"><?= $order->designer_attachment; ?></a></strong></p>
<?php 	if($usertype== 'designer'){ ?>
												<input type="text" name="designer_attachment" class="form-control">
<?php } ?>
												

											<p>Admin Attachment <strong><a href="javascript:;"><?= $order->admin_attachment; ?></a></strong></p>
											
<?php } ?>


											<hr>

<?php if($usertype== 'admin'){ ?>
											<p>Admin Status</p>
											<select class="form-control" name="admin_status">
													<?= status_select($order->admin_status); ?>
											</select>
											<br>
											<p>Admin Notes</p>
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
<br>
												<p>Status for Designer from Admin</p>
												<select name="admin_status_to_designer" class="form-control">
													<?= status_select($order->notes_admin_to_designer); ?>
												</select>
<br>
												<p>Notes For Designer</p>
												<textarea name="notes_admin_to_designer" rows="3" class="form-control"><?= $order->notes_admin_to_designer; ?></textarea>
<br>
											<p>Admin Attachment</p>
											<input type="text" name="admin_attachment" class="form-control" value="<?= $order->admin_attachment; ?>">
											<br>
<?php } ?>
												<button type="submit" name="update_design" class="btn btn-success">Submit</button>
											</form>

										</div>
									</div>
								</div>
								<?php
									}
								 	?>