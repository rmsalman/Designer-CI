<div class="page-content-wrapper">
	<div class="page-content">

 
<?php echo validation_errors(); ?>
 
<h1 align="center">Edit Plan</h1>
<br>


	<form class="form-horizontal" action="<?= base_url('plans/editplan/'.$id); ?>">
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Title</label>
			<div class="col-sm-9"><input type="text" name="title" class="form-control" value="<?= $plans_item['title']; ?>"></div>
			<div class="clearfix"></div>
		</div>	
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Sub Title</label>
			<div class="col-sm-9"><input type="text" name="sub_title" class="form-control" value="<?= $plans_item['sub_title']; ?>">
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Price</label>
			<div class="col-sm-9"><input type="number" name="price" class="form-control" value="<?= $plans_item['price']; ?>">
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Description</label>
			<div class="col-sm-9"><textarea name="Description" class="form-control" rows="3"><?= $plans_item['description']; ?></textarea>
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Notes</label>
			<div class="col-sm-9"><textarea name="notes" class="form-control"><?= $plans_item['notes']; ?></textarea>
		</div>
			<div class="clearfix"></div></div>

		<div class="form-group">

			<label align="right" class="label-control col-sm-3"> </label>
			<button type="submit" class="btn btn-defualt">Submit</button>
		</div>
	</form>
	</div>
</div>