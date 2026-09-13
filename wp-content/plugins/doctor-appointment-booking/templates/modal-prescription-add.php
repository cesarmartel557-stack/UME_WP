<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<div class="row mt-4">
	<div class="col">
		<form method="post" class="prescription-add-form"
		      action="<?php echo admin_url();?>admin-post.php">

			<input type="hidden" name="action" value="ctmdcd">
			<input type="hidden" name="task" value="new_prescription">
            <input type="hidden" name="new_prescription_nonce" value="<?php echo wp_create_nonce( 'new_prescription_nonce' );?>">
            <?php
                $appointment_id = \Ctmdcd\base\AjaxPosts::$param1;
                if ( ! isset( $appointment_id ) ) {
            ?>
			<div class="form-group radio-group">
                <label>
                    <input class="form-check-input" type="radio" name="patient_type"
                           value="old" checked="checked">
                    Old Patient
                </label>
                <label>
                    <input class="form-check-input" type="radio" name="patient_type"
                           value="new">
                    New Patient
                </label>
			</div>
			<div id="new_patient">
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
			</div>
            <div id="old_patient">
                <div class="form-group">
                    <label><b>Patient</b></label>
                    <select name="patient_id" class="form-control select2" id="patient_id"
                            style="width: 100%">
                        <option value="">Select a patient</option>
						<?php
						$patients = \Ctmdcd\api\DataApi::get_patients();
						foreach ( $patients as $row ):
							?>
                            <option value="<?php echo $row->patient_id; ?>">
								<?php echo $row->name; ?>
                            </option>
						<?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php } else {
                        $patient_id = '';
                        $patient_name = '';
                        $app_date = '';
                        $appointment_info = \Ctmdcd\api\DataApi::get_appointment_info_by_id( $appointment_id );
                        foreach ( $appointment_info as $value ) {
                            $patient_id = $value->patient_id;
                            $app_date = date( get_option( 'date_format' ), $value->appointment_timestamp );
                            $patient_info = \Ctmdcd\api\DataApi::get_patient_info_by_id( $patient_id );
                            foreach ( $patient_info as $p ) {
                                $patient_name = $p->name;
                            }
                        }
                    ?>
                <div class="form-group">
                    <label><b>Patient</b></label>
                    <select name="patient_id" class="form-control select2"
                            style="width: 100%;" readonly="readonly">
                        <option value="<?php echo $patient_id;?>"><?php echo $patient_name;?></option>
                    </select>
                </div>
                    <input type="hidden" name="appointment_id" value="<?php echo $appointment_id;?>">
            <?php } ?>
			<div class="form-group">
				<label><b>Symptoms</b></label>
				<textarea name="symptom" rows="3" class="form-control" id="symptom"></textarea>
			</div>
			<div class="form-group">
				<label><b>Diagnosis</b></label>
				<textarea name="diagnosis" rows="3" class="form-control" id="diagnosis"></textarea>
			</div>
			<label><b>Medicine</b></label>
			<div id="medicine_entry">
				<div class="form-group">
					<div class="row">
						<div class="col-5">
							<input type="text" name="medicine_name[]" class="form-control" placeholder="Medicine name">
						</div>
						<div class="col-6">
							<input type="text" name="medicine_note[]" class="form-control" placeholder="Notes">
						</div>
						<div class="col-1">
							<button type="button" class="btn btn-outline-danger delete-btn btn-sm"
							        onclick="delete_parent_element(this, 'medicine')">
								<i class="fa fa-close"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div id="append_holder_for_medicine_entries"></div>
			<div class="form-group">
				<button type="button" class="btn btn-info btn-add-more"
					onclick="append_blank_entry('medicine')">
					<i class="fa fa-plus"></i> &nbsp; Add More Medicine
				</button>
			</div>
			<label><b>Tests</b></label>
			<div id="test_entry">
				<div class="form-group">
					<div class="row">
						<div class="col-5">
							<input type="text" name="test_name[]" class="form-control" placeholder="Name of test">
						</div>
						<div class="col-6">
							<input type="text" name="test_note[]" class="form-control" placeholder="Notes">
						</div>
						<div class="col-1">
							<button type="button" class="btn btn-outline-danger delete-btn btn-sm"
							        onclick="delete_parent_element(this, 'test')">
								<i class="fa fa-close"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div id="append_holder_for_test_entries"></div>
			<div class="form-group">
				<button type="button" class="btn btn-info btn-add-more"
					onclick="append_blank_entry('test')">
					<i class="fa fa-plus"></i> &nbsp; Add More Tests
				</button>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> &nbsp; Create Prescription
				</button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
			</div>
		</form>
	</div>
</div>

<script>

    var blank_medicine_entry = '';
    var blank_test_entry = '';
    var number_of_medicine = 1;
    var number_of_test = 1;

    var patient_type = 'old';
    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

    jQuery(document).ready(function() {

        jQuery('.select2').select2({
            width: 'resolve'
        });

        jQuery('#new_patient').hide();

        jQuery('input[type=radio][name=patient_type]').change(function () {
            patient_type = this.value;
            if (patient_type == 'new') {
                jQuery('#old_patient').hide();
                jQuery('#new_patient').fadeIn();
            } else if (patient_type == 'old') {
                jQuery('#new_patient').hide();
                jQuery('#old_patient').fadeIn();
            }
        });

        blank_medicine_entry = jQuery('#medicine_entry').html();
        blank_test_entry = jQuery('#test_entry').html();

        var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.prescription-add-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });

    });

    function append_blank_entry(selector) {
        if (selector == 'medicine') {
            number_of_medicine = number_of_medicine + 1;
            jQuery('#append_holder_for_medicine_entries').append(blank_medicine_entry);
        } else {
            number_of_test = number_of_test + 1;
            jQuery('#append_holder_for_test_entries').append(blank_test_entry);
        }
    }

    function delete_parent_element(n, selector) {
        if (selector == 'medicine') {
            if (number_of_medicine > 1) {
                n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
            }
            if (number_of_medicine != 1) {
                number_of_medicine = number_of_medicine - 1;
            }
        } else {
            if (number_of_test > 1) {
                n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
            }
            if (number_of_test != 1) {
                number_of_test = number_of_test - 1;
            }
        }
    }

    function validate() {
        var symptoms = jQuery('#symptom').val();
        var diagnosis = jQuery('#diagnosis').val();
        if ( symptoms == '' || diagnosis == '' ) {
            notify( 'You must enter symptoms and diagnosis', 'warning' );
            return false;
        }
        if ( patient_type === 'old' ) {
            var patient_id = jQuery('#patient_id').val();
            if ( patient_id == '' ) {
                notify( 'You must select a patient', 'warning' );
                return false;
            }
        } else {
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var phone = jQuery('#phone').val();
            if (name == '' || email == '' || phone == '') {
                notify( 'You must enter name, email and phone number for a new patient', 'warning' );
                return false;
            }
        }
        return true;
    }

    <?php if ( ! isset( $appointment_id ) ) { ?>
        function showResponse() {

            jQuery('#ajax-modal-page').modal('hide');

            make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-prescription-list', 'prescription-list', patient_id, start, end );

            notify( 'Prescription was created successfully', 'success' );

        }
    <?php } else { ?>
        function showResponse() {

            jQuery('#ajax-modal-page').modal('hide');

            make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-appointment-list', 'appointment-list', '<?php echo $app_date;?>' );

            notify( 'Prescription was created successfully', 'success' );

        }
    <?php } ?>

</script>
