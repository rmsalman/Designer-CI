<div class="page-content-wrapper">
		<div class="page-content">


<style>
a:hover {
    text-decoration: none;
}
</style>

			<h3 class="page-title">
			Add/Edit <small>Plans</small>

			<?php if(is_admin()){ ?>
				<a href="plans/add" class="btn btn-primary pull-right">Add Plan</a>
				<div class="clearfix"></div>
			<?php } ?>
			
			</h3>
<div class="row ">
								<!-- Pricing -->
								<?php 

// echo '<pre>';
// print_r($all_plans);
// exit;

								foreach ($all_plans as $plan) {
								?>
								<div class="col-md-3">
									<div class="pricing hover-effect"><a href="javascript:;">
										<div class="pricing-head">
											<h3><?= $plan->title; ?> <span>
											<?= $plan->sub_title; ?> </span>
											</h3>
											<h4><i>$</i><?= $plan->price; ?><i></i> 
											<span>
											Per Month </span>
											</h4>
										</div>

										<?= $plan->description; ?>
											
										</a>
										<div class="pricing-footer">
											<a href="javascript:;">
											<p>
												 <?= $plan->notes; ?>
											</p>
											</a>
											<a href="<?= base_url('plans/editplan/'.$plan->id )?>" class="btn yellow-crusta">
											Edit Plan <i class="m-icon-swapright m-icon-white"></i>
											</a>
											<br>
											<br>
											<a href="<?= base_url('plans/delete/'.$plan->id )?>" style="background: red"  onclick="return confirm('Are you sure you want to delete this Plan?');" class="btn yellow-crusta">
											Delete Plan <i class="fa fa-trash"></i>
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