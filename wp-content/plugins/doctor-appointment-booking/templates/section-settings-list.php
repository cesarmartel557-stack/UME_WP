<?php defined( 'ABSPATH' ) or die( 'You can not access the file directly' );?>
<form method="post" class="settings-edit-form"
      action="<?php echo admin_url();?>admin-post.php">

	<input type="hidden" name="action" value="ctmdcd">
	<input type="hidden" name="task" value="edit_settings">
    <input type="hidden" name="edit_settings_nonce" value="<?php echo wp_create_nonce( 'edit_settings_nonce' );?>">

    <div class="form-group">
        <label><b>Doctor's Name</b></label>
        <input type="text" name="doctor_name" class="form-control" id="doctor_name"
               value="<?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_name' ); ?>">
    </div>

    <div class="form-group">
        <label><b>Doctor's Qualification</b></label>
        <textarea name="doctor_qualification" id="doctor_qualification" rows="3" class="form-control"><?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_qualification' ); ?></textarea>
    </div>

    <div class="form-group">
        <label><b>Email</b></label>
        <input type="email" name="default_email" class="form-control" id="default_email"
               value="<?php echo \Ctmdcd\api\DataApi::get_settings( 'default_email' ); ?>">
    </div>

    <div class="form-group">
        <label><b>Doctor's Phone</b></label>
        <input type="text" name="doctor_phone" class="form-control" id="doctor_phone"
               value="<?php echo \Ctmdcd\api\DataApi::get_settings( 'doctor_phone' ); ?>">
    </div>

	<div class="form-group">
		<label><b>Default Chamber</b></label>
		<select name="default_chamber_id" class="form-control select2" id="default_chamber_id"
		        style="width: 100%;">
			<?php
			$settings_chamber = \Ctmdcd\api\DataApi::get_settings( 'default_chamber_id' );
			$chambers = \Ctmdcd\api\DataApi::get_chambers();
			foreach ( $chambers as $chamber ) :
				if ( $chamber->status == 0 )
					continue;
				?>
				<option value="<?php echo $chamber->chamber_id;?>"
					<?php if ( $settings_chamber == $chamber->chamber_id ) echo 'selected'; ?>>
					<?php echo $chamber->name;?>
				</option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label><b>Default Currency</b></label>
		<select name="default_currency" class="form-control select2" id="default_currency"
		        style="width: 100%;">
			<?php
			$settings_currency = \Ctmdcd\api\DataApi::get_settings( 'default_currency' );
			$countries = \Ctmdcd\api\DataApi::get_countries();
			foreach ( $countries as $country ) :
                if ( $country->currency_symbol == '' )
                    continue;
				?>
				<option value="<?php echo $country->ID;?>"
					<?php if ( $settings_currency == $country->ID ) echo 'selected'; ?>>
					<?php echo $country->name . ' - ' . $country->currency_name . ' - ' . $country->currency_symbol;?>
				</option>
			<?php endforeach;?>
		</select>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-success">
			<i class="fa fa-save"></i> &nbsp; Update Settings
		</button>
        <div id="preloader" style="display: none;">
			<?php $base = new \Ctmdcd\base\BaseController();?>
            <img width="40" src="<?php echo $base->plugin_url;?>assets/images/preloader.gif">
        </div>
	</div>

</form>

<script>

    var ajaxurl = "<?php echo admin_url('admin-ajax.php');?>";

    jQuery(document).ready(function () {
        // Initialize select2
        jQuery('.select2').select2({
            width: 'resolve'
        });
		// Binding the form with Jquery
        var options = {
            beforeSubmit        :   validate,
            success             :   showResponse,
            resetForm           :   true
        };
        jQuery('.settings-edit-form').submit(function() {
            jQuery(this).ajaxSubmit(options);
            return false;
        });

    });

    function validate() {
        var chamber_id = jQuery('#default_chamber_id').val();
        var currency = jQuery('#default_currency').val();
        var email = jQuery('#default_email').val();
        var name = jQuery('#doctor_name').val();
        if (chamber_id == '' || currency == '' || email == '' || name == '') {
            notify( 'Please provide all the information required', 'warning' );
            return false;
        }
        return true;
    }

    function showResponse() {

        jQuery('#ajax-modal-page').modal('hide');

        make_ajax_call( '<?php echo wp_create_nonce( 'ctmdcd-ajax-nonce' ); ?>', ajaxurl, 'section-settings-list', 'settings-list' );

        notify( 'Settings was updated successfully ', 'success' );

    }

</script>