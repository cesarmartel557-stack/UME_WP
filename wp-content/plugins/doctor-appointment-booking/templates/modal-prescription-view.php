<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	$prescription_info = \Ctmdcd\api\DataApi::get_prescription_info_by_id( \Ctmdcd\base\AjaxPosts::$param1 );
	foreach ( $prescription_info as $prescription ) :
		$patient_info = \Ctmdcd\api\DataApi::get_patient_info_by_id( $prescription->patient_id );
?>

<div class="row">
	<div class="col">
		<button type="button" class="btn btn-info pull-right"
            onclick="print_prescription()">
			<i class="fa fa-print"></i> &nbsp; Print
		</button>
	</div>
</div>

<div id="print-area" class="prescription-view">
    <div class="row mt-4">
        <div class="col">
			<div class="doctor-info">
            	<h4 class="name">
            		<?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_name' ); ?>
            	</h4>
				<p>
					<?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_qualification' ); ?>
				</p>
				<p>Email: <?php echo \Ctmdcd\api\DataApi::get_settings( 'default_email' );?></p>
				<p>Phone: <?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_phone' );?></p>
			</div>
        </div>
		<div class="col">
			<div class="chamber-info text-right">
				<?php foreach ( $patient_info as $patient ) : ?>
					<p><i class="fa fa-envelope-o"></i> <?php echo $patient->email;?></p>
					<p><i class="fa fa-phone"></i> <?php echo $patient->phone;?></p>
				<?php endforeach;?>
			</div>
		</div>
    </div>

	<div class="row">
		<div class="col">
			<div class="patient-info">
				<?php foreach ( $patient_info as $patient ) : ?>
				<table class="table table-bordered">
      				<tbody>
      					<tr>
      						<td width="45%">Patient Name : <b><?php echo $patient->name;?></b></td>
      						<td width="15%">Age : <b><?php echo $patient->age;?></b></td>
      						<td width="15%">Sex : <b><?php echo $patient->gender;?></b></td>
      						<td width="25%">Date : <b><?php echo date( get_option('date_format'), $prescription->timestamp );?></b></td>
  						</tr>
      				</tbody>
      			</table>
		            <!-- <div class="col text-right">
						<div class="">
			                <h5><?php echo $patient->name;?></h5>
			                <?php if ( $patient->age != NULL ) : ?>
			                    <p>
			                        Age : &nbsp; <?php echo $patient->age;?> years
			                    </p>
			                <?php endif;?>
			                <?php if ( $patient->address != NULL ) : ?>
			                    <p>
			                        <i class="fa fa-map-marker"></i> &nbsp; <?php echo $patient->address;?>
			                    </p>
			                <?php endif;?>
			                <p>
			                    <i class="fa fa-envelope-o"></i> &nbsp; <?php echo $patient->email;?>
			                </p>
			                <p>
			                    <i class="fa fa-phone"></i> &nbsp; <?php echo $patient->phone;?>
			                </p>
						</div>
		            </div> -->

		        <?php endforeach;?>

			</div>
		</div>
	</div>

    <div class="row mt-4 ">
        <div class="col">
			<div class="symptoms">
	            <h4>Symptoms</h4>
	            <p><?php echo $prescription->symptom;?></p>
			</div>
        </div>
        <div class="col">
			<div class="diagnosis">
	            <h4>Diagnosis</h4>
	            <p><?php echo $prescription->diagnosis;?></p>
			</div>
        </div>
    </div>

    <?php
        $medicines = json_decode( $prescription->medicine );
        $count_medicine = count( $medicines );

        $tests = json_decode( $prescription->test );
        $count_test = count( $tests );
    ?>
    <div class="row mt-4 medicines">
        <div class="col">
            <h4>Medicines</h4>
            <?php if ( $count_medicine > 0 ) { ?>
				<table class="table table-bordered">
      				<thead>
      					<tr>
      						<th width="40%">Name</th>
      						<th width="60%">Notes</th>
      					</tr>
      				</thead>
      				<tbody>
						<?php for ( $i = 0; $i < $count_medicine; $i++ ) : ?>
	                        <tr>
	                            <td><?php echo $medicines[$i]->medicine_name; ?></td>
	                            <td><?php echo $medicines[$i]->medicine_note; ?></td>
	                        </tr>
	                    <?php endfor;?>
      				</tbody>
      			</table>
            <?php } else { ?>
                <h6 class="alert alert-info">No medicine was suggested</h6>
            <?php } ?>
        </div>
	</div>
	<div class="row tests mt-4">
        <div class="col">
            <h4>Tests</h4>
            <?php if ( $count_test > 0 ) { ?>
				<table class="table table-bordered">
      				<thead>
      					<tr>
      						<th width="40%">Name</th>
      						<th width="60%">Notes</th>
      					</tr>
      				</thead>
      				<tbody>
						<?php for ( $i = 0; $i < $count_test; $i++ ) : ?>
	                        <tr>
	                            <td><?php echo $tests[$i]->test_name; ?></td>
	                            <td><?php echo $tests[$i]->test_note; ?></td>
	                        </tr>
	                    <?php endfor;?>
      				</tbody>
      			</table>
                <ul>

                </ul>
            <?php } else { ?>
                <h6 class="alert alert-info">No test was suggested</h6>
            <?php } ?>
        </div>
    </div>

</div>

<?php endforeach;?>

<script>
    function print_prescription() {
        jQuery('#print-area').printThis();
    }
</script>
