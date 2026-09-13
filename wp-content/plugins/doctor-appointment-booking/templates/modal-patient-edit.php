<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	use \Ctmdcd\base\AjaxPosts;
	use \Ctmdcd\api\DataApi;

	$results = DataApi::get_patient_info_by_id( AjaxPosts::$param1 );
	foreach ( $results as $row ):
?>
<form method="post" class="patient-edit-form"
	action="<?php echo admin_url();?>admin-post.php">
	<div class="row">
		<div class="col">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab"
					   aria-controls="basic" aria-selected="true">Basic Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="medical-tab" data-toggle="tab" href="#medical" role="tab"
					   aria-controls="medical" aria-selected="false">Medical Information</a>
				</li>
			</ul>
			<div class="tab-content pt-3">
				<div class="tab-pane active" id="basic" role="tabpanel" aria-labelledby="basic-tab">

					<input type="hidden" name="action" value="ctmdcd">
					<input type="hidden" name="task" value="edit_patient">
					<input type="hidden" name="patient_id" value="<?php echo $row->patient_id; ?>">
                    <input type="hidden" name="edit_patient_nonce" value="<?php echo wp_create_nonce( 'edit_patient_nonce' );?>">

					<div class="form-group">
						<label><b>Name</b></label>
						<input type="text" name="name" class="form-control" placeholder="Patient's name" id="name"
						       value="<?php echo $row->name; ?>">
					</div>
					<div class="form-group">
						<label><b>Email</b></label>
						<input type="email" name="email" class="form-control" placeholder="Patient's email address" id="email"
						       value="<?php echo $row->email; ?>">
					</div>
					<div class="form-group">
						<label><b>Phone</b></label>
						<input type="text" name="phone" class="form-control" placeholder="Patient's phone number" id="phone"
						       value="<?php echo $row->phone; ?>">
					</div>
					<div class="form-group">
						<label><b>Address</b></label>
						<input type="text" name="address" class="form-control" placeholder="Patient's address" id="address"
						       value="<?php echo $row->address; ?>">
					</div>
					<div class="form-group">
		                <label><b>Age</b></label>
		                <input type="text" name="age" class="form-control"
		                       placeholder="Patient's age" value="<?php echo $row->age;?>">
		            </div>
		            <div class="form-group">
		                <label><b>Gender</b></label>
		                <select name="gender" class="form-control select2"
		                        style="width: 100%">
		                    <option value="Male" <?php if ($row->gender == 'Male') echo 'selected' ;?>>Male</option>
		                    <option value="Female" <?php if ($row->gender == 'Female') echo 'selected' ;?>>Female</option>
		                    <option value="Others" <?php if ($row->gender == 'Others') echo 'selected' ;?>>Others</option>
		                </select>
		            </div>
		            <div class="form-group">
		                <label><b>Notes</b></label>
		                <textarea class="form-control" name="notes" rows="3"><?php echo $row->notes;?></textarea>
		            </div>
				</div>
				<div class="tab-pane" id="medical" role="tabpanel" aria-labelledby="medical-tab">
					<?php
						if ( $row->medical_info != NULL ) {
							$medical_info = json_decode( $row->medical_info );
						}
					?>
					<div class="row">
						<div class="col">
							<div class="form-group">
				                <label><b>Blood group</b></label>
				                <?php
				                	$blood_group = '';
				                	if ( isset( $medical_info ) ) {
				                		$blood_group = $medical_info[0]->blood_group;
				                	}
				                ?>
				                <select class="form-control select2" name="blood_group"
				                	style="width: 100%;">
				                	<option value="A+" <?php if ( $blood_group == 'A+' ) echo 'selected';?>>A+</option>
				                	<option value="A-" <?php if ( $blood_group == 'A-' ) echo 'selected';?>>A-</option>
				                	<option value="B+" <?php if ( $blood_group == 'B+' ) echo 'selected';?>>B+</option>
				                	<option value="B-" <?php if ( $blood_group == 'B-' ) echo 'selected';?>>B-</option>
				                	<option value="AB+" <?php if ( $blood_group == 'AB+' ) echo 'selected';?>>AB+</option>
				                	<option value="AB-" <?php if ( $blood_group == 'AB-' ) echo 'selected';?>>AB-</option>
				                	<option value="O+" <?php if ( $blood_group == 'O+' ) echo 'selected';?>>O+</option>
				                	<option value="O-" <?php if ( $blood_group == 'O-' ) echo 'selected';?>>O-</option>
				                </select>
				            </div>
						</div>
						<div class="col">
							<div class="form-group">
				                <label><b>Height</b></label>
				                <input type="text" name="height" class="form-control"
				                       placeholder="" value="<?php echo isset( $medical_info ) ? $medical_info[0]->height : '' ;?>">
				            </div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
				                <label><b>Weight</b></label>
				                <input type="text" name="weight" class="form-control"
				                       placeholder="" value="<?php echo isset( $medical_info ) ? $medical_info[0]->weight : '' ;?>">
				            </div>
						</div>
						<div class="col">
							<div class="form-group">
				                <label><b>Blood pressure</b></label>
				                <input type="text" name="blood_pressure" class="form-control"
				                       placeholder="" value="<?php echo isset( $medical_info ) ? $medical_info[0]->blood_pressure : '' ;?>">
				            </div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
				                <label><b>Pulse</b></label>
				                <input type="text" name="pulse" class="form-control"
				                       placeholder="" value="<?php echo isset( $medical_info ) ? $medical_info[0]->pulse : '' ;?>">
				            </div>
						</div>
						<div class="col">
							<div class="form-group">
				                <label><b>Respiration</b></label>
				                <input type="text" name="respiration" class="form-control"
				                       placeholder="" value="<?php echo isset( $medical_info ) ? $medical_info[0]->resporation : '' ;?>">
				            </div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
				                <label><b>Allergy</b></label>
				                <textarea class="form-control" name="allergy" cols="2"><?php echo isset( $medical_info ) ? $medical_info[0]->allergy : '' ;?></textarea>
				            </div>
						</div>
						<div class="col">
							<div class="form-group">
				                <label><b>Diet</b></label>
				                <textarea class="form-control" name="diet" cols="2"><?php echo isset( $medical_info ) ? $medical_info[0]->diet : '' ;?></textarea>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group mb-0">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> &nbsp; Update
				</button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
			</div>
		</div>
	</div>
</form>
<?php endforeach;?>

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
        jQuery('.patient-edit-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });
	});

	function validate() {
		var name = jQuery('#name').val();
		var email = jQuery('#email').val();
		var phone = jQuery('#phone').val();
		if (name == '' || email == '' || phone == '') {
			notify( 'You must enter name, email and phone number for a patient', 'warning' );
            return false;
		}
		return true;
	}

	function showResponse() {
        var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-patient-list', 'patient-list', start, end );

        notify( 'Patient information was updated successfully', 'success' );
    }

</script>
