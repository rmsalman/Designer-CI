<div class="page-content-wrapper">
		<div class="page-content">


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
<span class="pull-right">
			 <a href="/designer/web/page-prices.php" class="btn btn-primary">Buy Plans</a>  

<?php if(is_admin()){ ?>
			<a href="plans/allplans" class="btn btn-primary ">Add/Edit/Delete Plans</a>
			<div class="clearfix"></div>
			<?php } ?>
			</span>
			</h3>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->

				<?php if($this->session->flashdata("message")){?>
				  <div class="alert alert-info">      
				    <?php echo $this->session->flashdata("message")?>
				  </div>
				<?php } ?>
				
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
									<div class="pricing hover-effect"><a href="<?= base_url('plans/plandetail/'.$plan->plan_id.'/'.$this->uri->segment(3))?>">
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
											
										</a>
										<div class="pricing-footer">
											<a href="<?= base_url('plans/plandetail/'.$plan->plan_id.'/'.$this->uri->segment(3))?>">
											<p>
												 <?= $plan->notes; ?>
											</p>
											</a>
											<a href="<?= base_url('plans/plandetail/'.$plan->plan_id.'/'.$this->uri->segment(3))?>" class="btn yellow-crusta">
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