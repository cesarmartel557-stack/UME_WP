<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<?php
	$day = \Ctmdcd\base\AjaxPosts::$param1;
	$chamber_info = \Ctmdcd\api\DataApi::get_chamber_info_by_id( \Ctmdcd\base\AjaxPosts::$param2 );
	foreach ( $chamber_info as $chamber ) :
?>

<?php $schedule = ( $chamber->schedule != '' ) ? ( array )json_decode( $chamber->schedule ) : array(); ?>

<?php if ( empty( $schedule ) ) { ?>
	<div class="alert alert-info">
		<b>No schedule found</b>
	</div>
	<input type="hidden" name="schedule" value="" id="schedule">
<?php } else { ?>
	<?php $open = ( isset( $schedule[$day]->status ) ) ? $schedule[$day]->status : 'closed'; ?>

	<?php if( $open == 'closed' ){ ?>
		<div class="alert alert-info">
			<b>No schedule found</b>
		</div>
		<input type="hidden" name="schedule" value="" id="schedule">

	<?php } else { ?>

		<?php $day_schedule = array();

		if( $schedule[$day]->morning != '' )
			array_push( $day_schedule, $schedule[$day]->morning );

		if( $schedule[$day]->afternoon != '' )
			array_push( $day_schedule, $schedule[$day]->afternoon );

		if( $schedule[$day]->evening != '' )
			array_push( $day_schedule, $schedule[$day]->evening );

		?>
		<div class="form-group">
			<label><b>Schedule</b></label>
			<select name="schedule" class="form-control select2" id="schedule"
			        style="width: 100%;">
			<?php foreach($day_schedule as $time){ ?>
				<option value="<?php echo $time; ?>"><?php echo $time; ?></option>
			<?php } ?>
			</select>
		</div>
	<?php } ?>

<?php } ?>

<?php endforeach;?>

<script>
	jQuery(document).ready(function () {
		jQuery('.select2').select2({
			width: 'resolve'
		});
    });
</script>
