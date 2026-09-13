<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="container-fluid">
	<div class="row mr-1 page-title">
		<div class="col-lg-6">
			<h5 class="mt-2">Manage Chambers</h5>
		</div>
		<div class="col-lg-6">
			<a href="#" class="btn btn-success pull-right"
					onclick="present_modal_page( 'modal-chamber-add', 'Add Chamber' )">
				<i class="fa fa-plus"></i> &nbsp; Add Chamber
			</a>
		</div>
	</div>

	<hr>
	<div class="row mr-1">
		<div class="col">
			<div id="chamber-list">
				<?php include 'section-chamber-list.php'; ?>
			</div>
		</div>
	</div>

	<?php include 'modal.php'; ?>
</div>