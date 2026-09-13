<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="row mt-4">
	<div class="col">
		<form method="post" class="patient-add-form"
			action="<?php echo admin_url();?>admin-post.php">

			<input type="hidden" name="action" value="ctmdcd">
            <input type="hidden" name="task" value="new_patient">

            <div class="form-group">
                <label><b>Name</b></label>
                <input type="text" name="name" class="form-control" id="name"
                    placeholder="Patient's Name">
            </div>
            <div class="form-group">
                <label><b>Email</b></label>
                <input type="email" name="email" class="form-control" id="email"
                       placeholder="Patient's email address">
            </div>
            <div class="form-group">
                <label><b>Phone</b></label>
                <input type="text" name="phone" class="form-control" id="phone"
                       placeholder="Patient's phone number">
            </div>
            <div class="form-group">
                <label><b>Age</b></label>
                <input type="text" name="age" class="form-control"
                       placeholder="Patient's age">
            </div>
            <div class="form-group">
                <label><b>Gender</b></label>
                <select name="gender" class="form-control select2"
                        style="width: 100%">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
			<div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> &nbsp; Add Patient
                </button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
            </div>
		</form>
	</div>
</div>

<script type="text/javascript">

	jQuery(document).ready(function() {
		// Initialize select2
		jQuery('.select2').select2({
            width: 'resolve'
        });
		// Binding the form with jquery
		var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.patient-add-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });
	});

	function validate() {
		var name = jQuery('#name').val();
		var email = jQuery('#email').val();
		var phone = jQuery('#phone').val();
		if (name == '' || email == '' || phone == '') {
			notify( 'You must enter name, email and phone number for a new patient', 'warning' );
            return false;
		}
		return true;
	}

	function showResponse() {
        var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-patient-list', 'patient-list', start, end );

        notify( 'New patient was added successfully', 'success' );
    }


</script>
