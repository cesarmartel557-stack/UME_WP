<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>

<?php if ( \Ctmdcd\base\AjaxPosts::$param1 == 'medicine' ): ?>

	<div class="form-group">
		<div class="row">
			<div class="col-5">
				<input type="text" name="medicine_name[]" class="form-control" placeholder="Medicine name"
				       value="">
			</div>
			<div class="col-6">
				<input type="text" name="medicine_note[]" class="form-control" placeholder="Notes"
				       value="">
			</div>
			<div class="col-1">
				<a class="btn btn-outline-danger delete-btn btn-sm"
				        onclick="delete_parent_element(this, 'medicine')">
					<i class="fa fa-close"></i>
				</a>
			</div>
		</div>
	</div>

<?php endif;?>

<?php if ( \Ctmdcd\base\AjaxPosts::$param1 == 'test' ): ?>

	<div class="form-group">
		<div class="row">
			<div class="col-5">
				<input type="text" name="test_name[]" class="form-control" placeholder="Name of test"
				       value="">
			</div>
			<div class="col-6">
				<input type="text" name="test_note[]" class="form-control" placeholder="Notes"
				       value="">
			</div>
			<div class="col-1">
				<a class="btn btn-outline-danger delete-btn btn-sm"
				        onclick="delete_parent_element(this, 'test')">
					<i class="fa fa-close"></i>
				</a>
			</div>
		</div>
	</div>

<?php endif;?>
