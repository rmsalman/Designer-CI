<?php 
	$usertype = $user['user_details'][0]->user_type;
?>
	<!-- BEGIN CONTENT -->
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

						<?php $x =1;
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

		<?php
			$orders = $this->Plans_model->get_data_by(ORDERS, $plan_counts->plan_order_id, USER_ID);

						$data = [];
						$data['x'] = $x;
						$data['usertype'] = $usertype;
						$data['orders'] = $orders;
			 $this->load->view('plans/partial_orderDetail', $data); 								

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