<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	$prescription_info = \Ctmdcd\api\DataApi::get_prescription_info_by_id( \Ctmdcd\base\AjaxPosts::$param1 );
	foreach ( $prescription_info as $prescription ) :
?>
<div class="row">
	<div class="col">
		<form method="post" class="prescription-edit-form"
		      action="<?php echo admin_url();?>admin-post.php">

			<input type="hidden" name="action" value="ctmdcd">
			<input type="hidden" name="task" value="edit_prescription">
			<input type="hidden" name="prescription_id" value="<?php echo \Ctmdcd\base\AjaxPosts::$param1 ?>">
            <input type="hidden" name="edit_prescription_nonce" value="<?php echo wp_create_nonce( 'edit_prescription_nonce' ); ?>">

			<div class="form-group">
				<label><b>Patient</b></label>
				<select name="patient_id" class="form-control select2" id="patient_id"
				        style="width: 100%">
					<option value="">Select a patient</option>
					<?php
					$patients = \Ctmdcd\api\DataApi::get_patients();
					foreach ( $patients as $row ):
						?>
						<option value="<?php echo $row->patient_id; ?>"
							<?php if ( $prescription->patient_id == $row->patient_id ) echo 'selected'; ?>>
							<?php echo $row->name; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label><b>Symptoms</b></label>
				<textarea name="symptom" rows="3" class="form-control" id="symptom"><?php echo $prescription->symptom;?></textarea>
			</div>
			<div class="form-group">
				<label><b>Diagnosis</b></label>
				<textarea name="diagnosis" rows="3" class="form-control" id="diagnosis"><?php echo $prescription->diagnosis;?></textarea>
			</div>
			<label><b>Medicine</b></label>
                <?php
                    if ( $prescription->medicine != '' ) :
                        $medicines_array = json_decode( $prescription->medicine );
                    for ( $i = 0; $i < count( $medicines_array ); $i++ ) :
                ?>
				<div class="form-group">
					<div class="row">
						<div class="col-5">
							<input type="text" name="medicine_name[]" class="form-control" placeholder="Medicine name"
                                value="<?php echo $medicines_array[$i]->medicine_name;?>">
						</div>
						<div class="col-6">
							<input type="text" name="medicine_note[]" class="form-control" placeholder="Notes"
                                value="<?php echo $medicines_array[$i]->medicine_note;?>">
						</div>
						<div class="col-1">
							<button type="button" class="btn btn-outline-danger delete-btn btn-sm"
							        onclick="delete_parent_element(this, 'medicine')">
								<i class="fa fa-close"></i>
							</button>
						</div>
					</div>
				</div>
				<?php
                    endfor;
                    endif;
                ?>
			<div id="append_holder_for_medicine_entries"></div>
			<div class="form-group">
				<button type="button" class="btn btn-info btn-add-more"
				        onclick="append_blank_entry('medicine')">
					<i class="fa fa-plus"></i> &nbsp; Add More Medicine
				</button>
			</div>
			<label><b>Tests</b></label>
                <?php
                    if ( $prescription->test != '' ) :
                        $tests_array = json_decode( $prescription->test );
                    for ( $i = 0; $i < count( $tests_array ); $i++ ) :
                ?>
				<div class="form-group">
					<div class="row">
						<div class="col-5">
							<input type="text" name="test_name[]" class="form-control" placeholder="Name of test"
                                value="<?php echo $tests_array[$i]->test_name;?>">
						</div>
						<div class="col-6">
							<input type="text" name="test_note[]" class="form-control" placeholder="Notes"
                                value="<?php echo $tests_array[$i]->test_note;?>">
						</div>
						<div class="col-1">
							<button type="button" class="btn btn-outline-danger delete-btn btn-sm"
							        onclick="delete_parent_element(this, 'test')">
								<i class="fa fa-close"></i>
							</button>
						</div>
					</div>
				</div>
                <?php
                    endfor;
                    endif;
                ?>
			<div id="append_holder_for_test_entries"></div>
			<div class="form-group">
				<button type="button" class="btn btn-info btn-add-more"
				        onclick="append_blank_entry('test')">
					<i class="fa fa-plus"></i> &nbsp; Add More Tests
				</button>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-save"></i> &nbsp; Update
				</button>
				<a href="#" class="btn btn-info btn-cancel" data-dismiss="modal">
					<i class="fa fa-close"></i> Cancel
				</a>
			</div>
		</form>
	</div>
</div>

    <?php if ( $prescription->medicine != '' ): ?>
        <script type="text/javascript">
            var num = '<?php echo count( json_decode( $prescription->medicine ) );?>';
            var number_of_medicine = parseInt( num );
        </script>
	<?php endif; ?>
		<?php if ( $prescription->test != '' ): ?>
        <script type="text/javascript">
            var num = '<?php echo count( json_decode( $prescription->test ) );?>';
            var number_of_test = parseInt( num );
        </script>
	<?php endif; ?>
		<?php if ( $prescription->medicine == '' ): ?>
        <script type="text/javascript">
            var number_of_medicine = 0;
        </script>
	<?php endif; ?>
		<?php if ( $prescription->medicine == '' ): ?>
        <script type="text/javascript">
            var number_of_test = 0;
        </script>
	<?php endif; ?>

<?php endforeach;?>

<script>

    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

    jQuery(document).ready(function() {

        jQuery('.select2').select2({
            width: 'resolve'
        });

        var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.prescription-edit-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });

    });

    function append_blank_entry(selector) {
        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'blank-prescription-entry', 'append_holder_for_' + selector + '_entries', selector, 'append' );
        if ( selector == 'medicine' )
            number_of_medicine = number_of_medicine + 1;
        else
            number_of_test = number_of_test + 1;
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
        var patient_id = jQuery('#patient_id').val();
        if ( patient_id == '' || symptoms == '' || diagnosis == '' ) {
            notify( 'You must select a patient and enter symptoms and diagnosis', 'warning' );
            return false;
        }
        return true;
    }

    function showResponse() {

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-prescription-list', 'prescription-list', patient_id, start, end );

        notify( 'Prescription was edited successfully', 'success' );

    }

</script>
