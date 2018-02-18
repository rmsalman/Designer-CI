
		<?php
									foreach ($orders as $order) {

									?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?= $x; ?>" href="#accordion<?= $x; ?>_$x">
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

											<form method="POST" enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?= $order->id; ?>">
<?php if($usertype== 'Member' || $usertype== 'admin'){ ?>
											<p><strong>User Status</strong>
<?php
	if($usertype== 'admin'){ ?>
											<?= status($order->user_status); ?>	
	<?php } ?>
											</p>

											
	<?php if($usertype== 'Member'){ ?>
											<select class="form-control" name="user_status">
													<?= status_select($order->user_status); ?>
											</select>
											<br>
	<?php }?>
											<p><strong>Admin Status</strong> <?= status($order->admin_status); ?></p>
											

											<p><strong>User Notes </strong>
<?php	if($usertype== 'admin'){ ?>
											<?= $order->user_notes; ?>
	<?php }?></p>

	<?php	if($usertype== 'Member'){ ?>
											<textarea rows="3" name="user_notes" class="form-control"><?= $order->user_notes; ?></textarea>

	<?php } ?>

<br>

											<p><strong>Admin Notes</strong> <?= $order->admin_notes; ?></p>
											
	

			<p><strong>User Attachment</strong> <a target="_blank" href="<?= base_url('uploads/' .$order->user_attachment)?>"><?= $order->user_attachment; ?></a></p>
	<?php if($usertype== 'Member'){ ?>
											<input type="file" name="user_attachment" class="form-con trol">
											<br>
	<?php } ?>
											
											<p><strong>Admin Attachment</strong> <a target="_blank" href="<?= base_url('uploads/'.$order->admin_attachment); ?>"><?= $order->admin_attachment; ?></a></p>
<?php if($usertype== 'admin'){ ?>
											<input type="file" name="admin_attachment" class="form-co ntrol" value="<?= $order->admin_attachment; ?>">
											
<?php } } ?>

											<hr>

<?php  if($usertype== 'Designer' || $usertype== 'admin'){ ?> <p><strong>Designer Status </strong> 
	<?php if($usertype== 'admin'){ ?>
												<?= status($order->designer_status); ?>

	<?php } ?></p>

	<?php if($usertype== 'Designer'){ ?>
												<select name="designer_status" class="form-control">
													<?= status_select($order->designer_status); ?>
												</select>
												<br>
	<?php }?>
									<p><strong>Admin Status</strong> <?= status($order->admin_status); ?></p>
											

											<p><strong>Designer Notes</strong>	<?php if($usertype== 'admin'){ ?>
											<?= $order->designer_notes; ?>	<?php } ?>		</p>
	<?php 	if($usertype== 'Designer'){ ?>
											<textarea name="designer_notes" rows="3" class="form-control"><?= $order->designer_notes; ?></textarea>
											
	<?php } ?>					
											<p><strong>Admin Notes</strong> <?= $order->admin_notes; ?></p>
											
												
												

												<p><strong>Designer Attachment</strong> <a target="_blank" href="<?= base_url('uploads/'. $order->designer_attachment);?>"><?= $order->designer_attachment; ?></a></p>
<?php 	if($usertype== 'Designer'){ ?>
												<input type="file" name="designer_attachment" class="form-co ntrol" value="<?= $order->designer_attachment; ?>">
<?php } ?>
												

											<p><strong>Admin Attachment</strong> <a target="_blank" href="<?= base_url('uploads/'. $order->admin_attachment_to_designer);?>"><?= $order->admin_attachment_to_designer; ?></a></p>
											
<?php } ?>


											<hr>

<?php if($usertype== 'admin'){ ?>
											<p><strong>Admin Status</strong></p>
											<select class="form-control" name="admin_status">
													<?= status_select($order->admin_status); ?>
											</select>
											<br>
											<p><strong>Admin Notes</strong></p>
												<textarea rows="3" name="admin_notes" class="form-control"><?= $order->admin_notes; ?></textarea>
												<br>

												<p><strong>Select Designer</strong></p>
												<select  name="designer_id" class="form-control" >
												<?php 
													foreach ($users as $user) {
														?>
															<option value="<?= $user->users_id ?>"><?= '#'.$user->users_id .' '. $user->name ?></option>
														<?php
													}
												 ?>
												</select>
<br>
												<p><strong>Status for Designer from Admin</strong></p>
												<select name="admin_status_to_designer" class="form-control">
													<?= status_select($order->notes_admin_to_designer); ?>
												</select>
<br>
												<p><strong>Notes For Designer</strong></p>
												<textarea name="notes_admin_to_designer" rows="3" class="form-control"><?= $order->notes_admin_to_designer; ?></textarea>
<br>
											<p><strong>Admin Attachment For Designer <a target="_blank" href="<?= base_url('uploads/'.$order->admin_attachment_to_designer); ?>"><?= $order->admin_attachment_to_designer; ?></a></strong></p>
											<input type="file" name="admin_attachment_to_designer" class="form-co ntrol" value="<?= $order->admin_attachment_to_designer; ?>">
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