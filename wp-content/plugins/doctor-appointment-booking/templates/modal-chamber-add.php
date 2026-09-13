<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="row mt-4">
	<div class="col">
		<form method="post" class="chamber-add-form"
		      action="<?php echo admin_url();?>admin-post.php">

			<input type="hidden" name="action" value="ctmdcd">
			<input type="hidden" name="task" value="new_chamber">
            <input type="hidden" name="new_chamber_nonce" value="<?php echo wp_create_nonce( 'new_chamber_nonce' ); ?>">

			<div class="form-group">
				<label><b>Name</b></label>
				<input type="text" name="name" class="form-control" placeholder="Chamber name" id="chamber-name"
				       value="">
			</div>
			<div class="form-group">
				<label><b>Address</b></label>
				<input type="text" name="address" class="form-control" placeholder="Chamber address" id="chamber-address"
				       value="">
			</div>
            <div class="form-group">
                <label><b>Status</b></label>
                <select name="status" class="form-control select2"
                    style="width: 100%;">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> &nbsp; Save
				</button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
			</div>
		</form>
	</div>
</div>

<script>
    jQuery(document).ready(function() {

        // Initialize select2
        jQuery('.select2').select2({
           width: 'resolve'
        });

        var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.chamber-add-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });
    });

    function validate() {
        var chamber_name = jQuery('#chamber-name').val();
        var chamber_address = jQuery('#chamber-address').val();

        if (chamber_name == '' || chamber_address == '') {
            notify('You must enter chamber name and address', 'warning');
            return false;
        }
        return true;
    }

    function showResponse() {
        var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-chamber-list', 'chamber-list' );

        notify( 'Chamber was added successfully', 'success' );

    }
</script>
