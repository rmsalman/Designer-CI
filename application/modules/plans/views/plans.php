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


// echo '<pre>';

// $date1 = new DateTime("2016-01-01");  //current date or any date
//   $date2 = new DateTime("2016-12-31");   //Future date
//   $diff = $date2->diff($date1)->format("%a");  //find difference
//   $days = intval($diff);   //rounding days
//   echo $days;
//   //it return 365 days omitting current day

// print_r($plan);
// echo '</pre>';
// plan_exp





								?>
								<div class="col-md-3">
									<div class="pricing hover-effect"><a href="<?= base_url('plans/plandetail/'.$plan->plan_id.'/'.$this->uri->segment(3))?>">
										<div class="pricing-head">
											<h3><?= $plan->title; ?> <span>
											<?= $plan->sub_title; ?> </span>
											</h3>
											<h4><i>$</i><?= $plan->price; ?><i></i> <i>X</i> <?= $plan->counter ?>
											<span>
											For <?= $plan->plan_exp; ?> Days </span>
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