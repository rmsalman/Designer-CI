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

			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-briefcase"></i>
						<a href="index-admin.html">Plans</a>
					</li>
				</ul>

			</div>
			<h3 class="page-title">
			Plans <small>all scured plans</small>
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->

<style>
a:hover {
    text-decoration: none;
}
</style>

<div class="row ">
								<!-- Pricing -->
								<?php 
								foreach ($all_plans as $plan) {
								?>
								<div class="col-md-3">
									<a href="<?= base_url('plans/plandetail/'.$plan->plan_id)?>">
									</a><div class="pricing hover-effect"><a href="<?= base_url('plans/plandetail/'.$plan->plan_id)?>">
										<div class="pricing-head">
											<h3><?= $plan->title; ?> <span>
											<?= $plan->sub_title; ?> </span>
											</h3>
											<h4><i>$</i><?= $plan->price; ?><i></i> <i>X</i> <?= $plan->counter ?>
											<span>
											Per Month </span>
											</h4>
										</div>

										<?= $plan->description; ?>
											
										</a><div class="pricing-footer"><a href="<?= base_url('plans/plandetail/'.$plan->plan_id)?>">
											<p>
												 <?= $plan->notes; ?>
											</p>
											</a><a href="<?= base_url('plans/plandetail/'.$plan->plan_id)?>" class="btn yellow-crusta">
											Get Status <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div>
									
								</div>
								<?php
								}
								?>

							
								<!--//End Pricing -->
							</div>

			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>

		</div>
	</div>