<div class="page-content-wrapper">
	<div class="page-content">

 
<?php if(validation_errors()){
	?>
<div class="panel text-center panel-danger">
	<?php echo validation_errors(); ?>
</div>

	<?php
} ?>
 
<h1 align="center">Add Plan</h1>
<br>

	<form class="form-horizontal" method="POST" action="">
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Title</label>
			<div class="col-sm-9"><input type="text" name="title" class="form-control" value="<?= set_value('title'); ?>" required="required"></div>
			<div class="clearfix"></div>
		</div>	
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Sub Title</label>
			<div class="col-sm-9"><input type="text" name="sub_title" class="form-control" value="<?= set_value('sub_title'); ?>" required="required">
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Price</label>
			<div class="col-sm-9"><input type="number" name="price" class="form-control" value="<?= set_value('price'); ?>" required="required">
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Description</label>
			<div class="col-sm-9"><textarea name="description" class="form-control" rows="3" required="required"><?= set_value('description'); ?></textarea>
		</div>
			<div class="clearfix"></div></div>
		<div class="form-group">
			<label align="right" class="label-control col-sm-3">Notes</label>
			<div class="col-sm-9"><textarea name="notes" class="form-control" required="required"><?= set_value('notes'); ?></textarea>
		</div>
			<div class="clearfix"></div></div>

		<div class="form-group">

			<label align="right" class="label-control col-sm-3"> </label>
			<button type="submit" name="submit" class="btn btn-defualt">Submit</button>
		</div>
	</form>
	</div>
</div>