<?php
global $bookingpress_slugs,$BookingPressPro, $bookingpress_pro_staff_members,$BookingPress;
$request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
$bookingpress_user_id        = get_current_user_id();
$bookingpress_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $bookingpress_user_id );
$bookingpress_upcomming_appointment = array( 'appointment_date' => '', 'booking_id' => '', 'customer_email' => '', 'customer_name' => '', 'service_name' => '',	'appointment_duration' => '',
);
if(!empty($bookingpress_staffmember_id)) {
	$bookingpress_staffmember_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id($bookingpress_staffmember_id);
	$bookingpress_upcomming_appointment = $bookingpress_pro_staff_members->bookingpress_get_staffmember_upcomming_appointment_data($bookingpress_staffmember_id);
    /*
    ?>
    <div>
    <?php
    print_r(  $bookingpress_upcomming_appointment ); print_r('<br><br>');
    ?>
    </div>
    <?php
    */
}

$bookingpress_staffmember_access_admin = $BookingPress->bookingpress_get_settings( 'bookingpress_staffmember_access_admin', 'staffmember_setting' );
if ( $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember' ) && ( ! $bookingpress_pro_staff_members->bookingpress_check_staffmember_module_activation() || $bookingpress_pro_staff_members->bookingpress_current_login_staffmember_status() != 1 ) ) {
	
	wp_die( esc_html__( 'Sorry, you are not allowed to access this page', 'bookingpress-appointment-booking' ) );

} else {
	?>
<nav class="bpa-header-navbar__staff">
	<div class="bpa-hns__wrap">
		<div class="bpa-hns-wrap__left">
			<h2><?php esc_html_e('Welcome,','bookingpress-appointment-booking'); ?> <strong><?php echo esc_html(stripslashes_deep($bookingpress_staffmember_name));?></strong></h2>
		</div>
		<div class="bpa-hns-wrap__right">
			<?php
			if(!empty($bookingpress_upcomming_appointment)) { ?>
				<el-button class="bpa-btn bpa-btn__medium bpa-btn--icon-without-box bpa-hns-wrap-right__item bpa-hns__notification-item" @click="bookingpress_open_upcomming_appointment_model">
					<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.9102 8.82422C14.9102 5.01172 12.8594 3.71484 10.9414 3.42578C10.9414 3.40625 10.9453 3.38672 10.9453 3.36328C10.9453 2.88281 10.5195 2.5 10 2.5C9.48047 2.5 9.07031 2.88281 9.07031 3.36328C9.07031 3.38672 9.07031 3.40625 9.07422 3.42578C7.15234 3.71875 5.08984 5.01953 5.08984 8.83203C5.08984 13.2773 3.98438 13.7539 2.5 15.0039H17.5C16.0234 13.75 14.9102 13.2695 14.9102 8.82422Z" fill="#727E95"/>
						<path d="M10.0078 17.5C11.0547 17.5 11.9141 16.7227 12.0273 15.8203H7.98828C8.09766 16.7227 8.96094 17.5 10.0078 17.5Z" fill="#727E95"/>
					</svg>
				</el-button>
			<?php }else { ?>
				<el-button class="bpa-btn bpa-btn__medium bpa-btn--icon-without-box bpa-hns-wrap-right__item bpa-hns__notification-item __bpa-is-disabled" @click="bookingpress_open_upcomming_appointment_model"> 
					<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.9102 8.82422C14.9102 5.01172 12.8594 3.71484 10.9414 3.42578C10.9414 3.40625 10.9453 3.38672 10.9453 3.36328C10.9453 2.88281 10.5195 2.5 10 2.5C9.48047 2.5 9.07031 2.88281 9.07031 3.36328C9.07031 3.38672 9.07031 3.40625 9.07422 3.42578C7.15234 3.71875 5.08984 5.01953 5.08984 8.83203C5.08984 13.2773 3.98438 13.7539 2.5 15.0039H17.5C16.0234 13.75 14.9102 13.2695 14.9102 8.82422Z" fill="#727E95"/>
						<path d="M10.0078 17.5C11.0547 17.5 11.9141 16.7227 12.0273 15.8203H7.98828C8.09766 16.7227 8.96094 17.5 10.0078 17.5Z" fill="#727E95"/>
					</svg>
				</el-button> <?php
			}			
			if(!empty($bookingpress_staffmember_access_admin) && $bookingpress_staffmember_access_admin == 'true') { ?>
			<div class="bpa-hns-wrap-right__item" @click="bpa_staffmember_open_admin_view">
				<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.59288 9.9999C2.59239 12.8384 4.21392 15.4275 6.7678 16.6663L3.23415 6.98541C2.81055 7.93387 2.59207 8.96111 2.59288 9.9999ZM10.1304 10.6478L7.90755 17.1058C9.3999 17.5452 10.9927 17.5039 12.4602 16.9876C12.4396 16.9552 12.4218 16.9211 12.4071 16.8855L10.1304 10.6478ZM15.0009 9.62636C14.9909 8.90192 14.7795 8.19456 14.3902 7.58355C13.9921 7.08263 13.7402 6.48134 13.6625 5.84619C13.6446 5.1403 14.2006 4.55263 14.9065 4.53158C14.9393 4.53158 14.9705 4.53554 15.0024 4.53754C11.9864 1.77485 7.30187 1.98025 4.53922 4.99621C4.27191 5.28798 4.02848 5.6007 3.8112 5.93137C3.98503 5.9369 4.14887 5.94038 4.28787 5.94038C5.0625 5.94038 6.26216 5.84614 6.26216 5.84614C6.43099 5.83638 6.57579 5.96534 6.58556 6.13417C6.59505 6.29834 6.47314 6.44071 6.30946 6.4566C6.30946 6.4566 5.90799 6.50359 5.46181 6.52696L8.15907 14.5505L9.78038 9.68891L8.6263 6.52702C8.22721 6.50363 7.84939 6.45665 7.84939 6.45665C7.6811 6.44038 7.55784 6.29074 7.57406 6.12245C7.5899 5.95865 7.73232 5.8367 7.89654 5.84619C7.89654 5.84619 9.11952 5.94043 9.84728 5.94043C10.6219 5.94043 11.8218 5.84619 11.8218 5.84619C11.9906 5.83632 12.1355 5.96517 12.1453 6.13395C12.1549 6.29834 12.0329 6.44092 11.869 6.45665C11.869 6.45665 11.4672 6.50364 11.0213 6.52702L13.6982 14.4895L14.4623 12.0681C14.7607 11.2851 14.9422 10.4623 15.0009 9.62636ZM16.5502 7.20801C16.5374 8.12066 16.346 9.02203 15.9868 9.86112L13.7244 16.4024C17.1943 14.3839 18.4252 9.96908 16.5004 6.4464C16.5341 6.69884 16.5507 6.95329 16.5502 7.20801ZM10.0002 1.11133C5.09104 1.11133 1.11133 5.09104 1.11133 10.0002C1.11133 14.9094 5.09104 18.8891 10.0002 18.8891C14.9094 18.8891 18.8891 14.9094 18.8891 10.0002C18.8891 5.09104 14.9094 1.11133 10.0002 1.11133ZM13.2524 17.6993C10.6511 18.8002 7.66944 18.5104 5.32888 16.9291C3.98536 16.022 2.93365 14.7449 2.301 13.2524C1.19987 10.6511 1.4898 7.66933 3.0714 5.32888C3.9783 3.98524 5.25543 2.93343 6.74805 2.30105C9.34934 1.2002 12.331 1.49002 14.6716 3.07129C16.0151 3.97836 17.0668 5.25548 17.6994 6.74799C18.8006 9.34928 18.5106 12.3311 16.929 14.6715C16.0221 16.0151 14.745 17.067 13.2524 17.6993Z" />
				</svg>
			</div>
			<?php } ?>	
			<div class="bpa-hns-wrap-right__item">
				<el-button class="bpa-btn bpa-btn__medium" @click="bookingpress_staffmember_logout('<?php echo add_query_arg( 'bookingpress_action', 'bookingpress_logout', esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>')">
					<span>
						<svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
							<path d="M3 9C3 9.19891 3.07902 9.38968 3.21967 9.53033C3.36032 9.67098 3.55109 9.75 3.75 9.75H9.4425L7.7175 11.4675C7.6472 11.5372 7.59141 11.6202 7.55333 11.7116C7.51525 11.803 7.49565 11.901 7.49565 12C7.49565 12.099 7.51525 12.197 7.55333 12.2884C7.59141 12.3798 7.6472 12.4628 7.7175 12.5325C7.78722 12.6028 7.87017 12.6586 7.96157 12.6967C8.05296 12.7347 8.15099 12.7543 8.25 12.7543C8.34901 12.7543 8.44704 12.7347 8.53843 12.6967C8.62983 12.6586 8.71278 12.6028 8.7825 12.5325L11.7825 9.5325C11.8508 9.46117 11.9043 9.37706 11.94 9.285C12.015 9.1024 12.015 8.8976 11.94 8.715C11.9043 8.62294 11.8508 8.53883 11.7825 8.4675L8.7825 5.4675C8.71257 5.39757 8.62955 5.3421 8.53819 5.30426C8.44682 5.26641 8.34889 5.24693 8.25 5.24693C8.15111 5.24693 8.05318 5.26641 7.96181 5.30426C7.87045 5.3421 7.78743 5.39757 7.7175 5.4675C7.64757 5.53743 7.5921 5.62045 7.55426 5.71181C7.51641 5.80318 7.49693 5.90111 7.49693 6C7.49693 6.09889 7.51641 6.19682 7.55426 6.28819C7.5921 6.37955 7.64757 6.46257 7.7175 6.5325L9.4425 8.25H3.75C3.55109 8.25 3.36032 8.32902 3.21967 8.46967C3.07902 8.61032 3 8.80109 3 9ZM12.75 1.5H5.25C4.65326 1.5 4.08097 1.73705 3.65901 2.15901C3.23705 2.58097 3 3.15326 3 3.75V6C3 6.19891 3.07902 6.38968 3.21967 6.53033C3.36032 6.67098 3.55109 6.75 3.75 6.75C3.94891 6.75 4.13968 6.67098 4.28033 6.53033C4.42098 6.38968 4.5 6.19891 4.5 6V3.75C4.5 3.55109 4.57902 3.36032 4.71967 3.21967C4.86032 3.07902 5.05109 3 5.25 3H12.75C12.9489 3 13.1397 3.07902 13.2803 3.21967C13.421 3.36032 13.5 3.55109 13.5 3.75V14.25C13.5 14.4489 13.421 14.6397 13.2803 14.7803C13.1397 14.921 12.9489 15 12.75 15H5.25C5.05109 15 4.86032 14.921 4.71967 14.7803C4.57902 14.6397 4.5 14.4489 4.5 14.25V12C4.5 11.8011 4.42098 11.6103 4.28033 11.4697C4.13968 11.329 3.94891 11.25 3.75 11.25C3.55109 11.25 3.36032 11.329 3.21967 11.4697C3.07902 11.6103 3 11.8011 3 12V14.25C3 14.8467 3.23705 15.419 3.65901 15.841C4.08097 16.2629 4.65326 16.5 5.25 16.5H12.75C13.3467 16.5 13.919 16.2629 14.341 15.841C14.7629 15.419 15 14.8467 15 14.25V3.75C15 3.15326 14.7629 2.58097 14.341 2.15901C13.919 1.73705 13.3467 1.5 12.75 1.5Z" />
						</svg>
					</span>
					<?php esc_html_e( 'Logout', 'bookingpress-appointment-booking' ); ?>
				</el-button>
			</div>
		</div>
	</div>
</nav>
<div class="bpa-staff-sidebar-navigation" :class="(bpa_toggle_active == 1) ? '__bpa-is-active' : ''">
	<div class="bpa-ssn__brand-logoo">
		<a href="#" class="bpa-ssn-logo">
			<img src="https://foatconcept.com.ar/turnos/wp-content/uploads/2025/08/logo-svg.svg" alt="" />
		</a>		
	</div>
	<div class="bpa-ssn__navbar-wrap">		
		<ul class="bpa-ssn__navbar">
			<?php  if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress' ) ) { ?>
			<li>
				<a href="<?php echo esc_url( admin_url() . 'admin.php?page=bookingpress'); // phpcs:ignore ?>" class="<?php echo ( 'dashboard' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4458_14179)">
							<path d="M4 13H10C10.55 13 11 12.55 11 12V4C11 3.45 10.55 3 10 3H4C3.45 3 3 3.45 3 4V12C3 12.55 3.45 13 4 13ZM4 21H10C10.55 21 11 20.55 11 20V16C11 15.45 10.55 15 10 15H4C3.45 15 3 15.45 3 16V20C3 20.55 3.45 21 4 21ZM14 21H20C20.55 21 21 20.55 21 20V12C21 11.45 20.55 11 20 11H14C13.45 11 13 11.45 13 12V20C13 20.55 13.45 21 14 21ZM13 4V8C13 8.55 13.45 9 14 9H20C20.55 9 21 8.55 21 8V4C21 3.45 20.55 3 20 3H14C13.45 3 13 3.45 13 4Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4458_14179">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Dashboard', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_calendar' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_calendar, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'calendar' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4458_14174)">
							<path d="M16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3ZM18 20H6C5.45 20 5 19.55 5 19V9H19V19C19 19.55 18.55 20 18 20Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4458_14174">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Calendar', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_appointments' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_appointments, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'appointments' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4470_13557)">
							<path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"/>
							<path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"/>
						</g>
						<defs>
							<clipPath id="clip0_4470_13557">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Appointments', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_customers' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_customers, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'customers' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4458_14009)">
							<path d="M16.95 11.9998C18.468 11.9998 19.689 10.7678 19.689 9.2498C19.689 7.7318 18.468 6.4998 16.95 6.4998C15.432 6.4998 14.2 7.7318 14.2 9.2498C14.2 10.7678 15.432 11.9998 16.95 11.9998ZM8.7 10.8998C10.526 10.8998 11.989 9.4258 11.989 7.5998C11.989 5.7738 10.526 4.2998 8.7 4.2998C6.874 4.2998 5.4 5.7738 5.4 7.5998C5.4 9.4258 6.874 10.8998 8.7 10.8998ZM16.95 14.1998C14.937 14.1998 10.9 15.2118 10.9 17.2248V18.5998C10.9 19.2048 11.395 19.6998 12 19.6998H21.9C22.505 19.6998 23 19.2048 23 18.5998V17.2248C23 15.2118 18.963 14.1998 16.95 14.1998ZM8.7 13.0998C6.137 13.0998 1 14.3868 1 16.9498V18.5998C1 19.2048 1.495 19.6998 2.1 19.6998H8.7V17.2248C8.7 16.2898 9.063 14.6508 11.307 13.4078C10.35 13.2098 9.426 13.0998 8.7 13.0998Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4458_14009">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Customers', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			<?php }
            
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_appointments' ) ) {
                global $historiasClinicas_module_name;

			?>
			
			<li>
                
                
				<!-- Comentado temporalmente para mostrar solo el link boton de historias -->
                <a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_stories, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( (!empty($historiasClinicas_module_name)? $historiasClinicas_module_name:'historias') == $request_module ) ? '__bpa-is-active' : ''; ?>">
                
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4470_13557)">
							<path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"/>
							<path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"/>
						</g>
						<defs>
							<clipPath id="clip0_4470_13557">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Historias Clinicas', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			
			<?php }
            
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_payments' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_payments, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'payments' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4458_14014)">
							<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13.41 18.09V18.67C13.41 19.4 12.81 20 12.08 20H12.07C11.34 20 10.74 19.4 10.74 18.67V18.07C9.41 17.79 8.23 17.06 7.73 15.83C7.5 15.28 7.93 14.67 8.53 14.67H8.77C9.14 14.67 9.44 14.92 9.58 15.27C9.87 16.02 10.63 16.54 12.09 16.54C14.05 16.54 14.49 15.56 14.49 14.95C14.49 14.12 14.05 13.34 11.82 12.81C9.34 12.21 7.64 11.19 7.64 9.14C7.64 7.42 9.03 6.3 10.75 5.93V5.33C10.75 4.6 11.35 4 12.08 4H12.09C12.82 4 13.42 4.6 13.42 5.33V5.95C14.8 6.29 15.67 7.15 16.05 8.21C16.25 8.76 15.83 9.34 15.24 9.34H14.98C14.61 9.34 14.31 9.08 14.21 8.72C13.98 7.96 13.35 7.47 12.09 7.47C10.59 7.47 9.69 8.15 9.69 9.11C9.69 9.95 10.34 10.5 12.36 11.02C14.38 11.54 16.54 12.41 16.54 14.93C16.52 16.76 15.15 17.76 13.41 18.09Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4458_14014">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'Payments', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_timesheet' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_timesheet, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'timesheet' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4458_14017)">
							<path d="M17 12C14.24 12 12 14.24 12 17C12 19.76 14.24 22 17 22C19.76 22 22 19.76 22 17C22 14.24 19.76 12 17 12ZM18.65 19.35L16.5 17.2V14H17.5V16.79L19.35 18.64L18.65 19.35ZM18 3H14.82C14.4 1.84 13.3 1 12 1C10.7 1 9.6 1.84 9.18 3H6C4.9 3 4 3.9 4 5V20C4 21.1 4.9 22 6 22H12.11C11.52 21.43 11.04 20.75 10.69 20H6V5H8V8H16V5H18V10.08C18.71 10.18 19.38 10.39 20 10.68V5C20 3.9 19.1 3 18 3ZM12 5C11.45 5 11 4.55 11 4C11 3.45 11.45 3 12 3C12.55 3 13 3.45 13 4C13 4.55 12.55 5 12 5Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4458_14017">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'TimeSheet', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_myprofile' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_myprofile, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'myprofile' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_4733_13775)">
							<path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5C13.66 5 15 6.34 15 8C15 9.66 13.66 11 12 11C10.34 11 9 9.66 9 8C9 6.34 10.34 5 12 5ZM12 19.2C9.5 19.2 7.29 17.92 6 15.98C6.03 13.99 10 12.9 12 12.9C13.99 12.9 17.97 13.99 18 15.98C16.71 17.92 14.5 19.2 12 19.2Z" fill="#727E95"/>
						</g>
						<defs>
							<clipPath id="clip0_4733_13775">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<?php esc_html_e( 'My Profile', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			<?php }
			if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_myservices' ) ) {
			?>
			<li>
				<a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_myservices, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'myservices' == $request_module ) ? '__bpa-is-active' : ''; ?>"> 
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M7.5 3V4.5H5.25C5.05109 4.5 4.86032 4.57902 4.71967 4.71967C4.57902 4.86032 4.5 5.05109 4.5 5.25V21.75C4.5 21.9489 4.57902 22.1397 4.71967 22.2803C4.86032 22.421 5.05109 22.5 5.25 22.5H18.75C18.9489 22.5 19.1397 22.421 19.2803 22.2803C19.421 22.1397 19.5 21.9489 19.5 21.75V5.25C19.5 5.05109 19.421 4.86032 19.2803 4.71967C19.1397 4.57902 18.9489 4.5 18.75 4.5H16.5V3H7.5ZM6 6H7.5V7.5H16.5V6H18V21H6V6ZM8.25 9C8.05109 9 7.86032 9.07902 7.71967 9.21967C7.57902 9.36032 7.5 9.55109 7.5 9.75C7.5 9.94891 7.57902 10.1397 7.71967 10.2803C7.86032 10.421 8.05109 10.5 8.25 10.5C8.44891 10.5 8.63968 10.421 8.78033 10.2803C8.92098 10.1397 9 9.94891 9 9.75C9 9.55109 8.92098 9.36032 8.78033 9.21967C8.63968 9.07902 8.44891 9 8.25 9ZM10.5 9V10.5H16.5V9H10.5ZM8.25 12C8.05109 12 7.86032 12.079 7.71967 12.2197C7.57902 12.3603 7.5 12.5511 7.5 12.75C7.5 12.9489 7.57902 13.1397 7.71967 13.2803C7.86032 13.421 8.05109 13.5 8.25 13.5C8.44891 13.5 8.63968 13.421 8.78033 13.2803C8.92098 13.1397 9 12.9489 9 12.75C9 12.5511 8.92098 12.3603 8.78033 12.2197C8.63968 12.079 8.44891 12 8.25 12ZM10.5 12V13.5H16.5V12H10.5ZM8.25 15C8.05109 15 7.86032 15.079 7.71967 15.2197C7.57902 15.3603 7.5 15.5511 7.5 15.75C7.5 15.9489 7.57902 16.1397 7.71967 16.2803C7.86032 16.421 8.05109 16.5 8.25 16.5C8.44891 16.5 8.63968 16.421 8.78033 16.2803C8.92098 16.1397 9 15.9489 9 15.75C9 15.5511 8.92098 15.3603 8.78033 15.2197C8.63968 15.079 8.44891 15 8.25 15ZM10.5 15V16.5H16.5V15H10.5ZM8.25 18C8.05109 18 7.86032 18.079 7.71967 18.2197C7.57902 18.3603 7.5 18.5511 7.5 18.75C7.5 18.9489 7.57902 19.1397 7.71967 19.2803C7.86032 19.421 8.05109 19.5 8.25 19.5C8.44891 19.5 8.63968 19.421 8.78033 19.2803C8.92098 19.1397 9 18.9489 9 18.75C9 18.5511 8.92098 18.3603 8.78033 18.2197C8.63968 18.079 8.44891 18 8.25 18ZM10.5 18V19.5H16.5V18H10.5Z" />
					</svg>
					<?php esc_html_e( 'My Services', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php } ?>			
			<li>
				<a href="<?php echo add_query_arg( 'bookingpress_action', 'bookingpress_logout', esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H12.59L10.29 15.29C10.1963 15.383 10.1219 15.4936 10.0711 15.6154C10.0203 15.7373 9.9942 15.868 9.9942 16C9.9942 16.132 10.0203 16.2627 10.0711 16.3846C10.1219 16.5064 10.1963 16.617 10.29 16.71C10.383 16.8037 10.4936 16.8781 10.6154 16.9289C10.7373 16.9797 10.868 17.0058 11 17.0058C11.132 17.0058 11.2627 16.9797 11.3846 16.9289C11.5064 16.8781 11.617 16.8037 11.71 16.71L15.71 12.71C15.801 12.6149 15.8724 12.5028 15.92 12.38C16.02 12.1365 16.02 11.8635 15.92 11.62C15.8724 11.4972 15.801 11.3851 15.71 11.29L11.71 7.29C11.6168 7.19676 11.5061 7.1228 11.3842 7.07234C11.2624 7.02188 11.1319 6.99591 11 6.99591C10.8681 6.99591 10.7376 7.02188 10.6158 7.07234C10.4939 7.1228 10.3832 7.19676 10.29 7.29C10.1968 7.38324 10.1228 7.49393 10.0723 7.61575C10.0219 7.73757 9.99591 7.86814 9.99591 8C9.99591 8.13186 10.0219 8.26243 10.0723 8.38425C10.1228 8.50607 10.1968 8.61676 10.29 8.71L12.59 11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12ZM17 2H7C6.20435 2 5.44129 2.31607 4.87868 2.87868C4.31607 3.44129 4 4.20435 4 5V8C4 8.26522 4.10536 8.51957 4.29289 8.70711C4.48043 8.89464 4.73478 9 5 9C5.26522 9 5.51957 8.89464 5.70711 8.70711C5.89464 8.51957 6 8.26522 6 8V5C6 4.73478 6.10536 4.48043 6.29289 4.29289C6.48043 4.10536 6.73478 4 7 4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H7C6.73478 20 6.48043 19.8946 6.29289 19.7071C6.10536 19.5196 6 19.2652 6 19V16C6 15.7348 5.89464 15.4804 5.70711 15.2929C5.51957 15.1054 5.26522 15 5 15C4.73478 15 4.48043 15.1054 4.29289 15.2929C4.10536 15.4804 4 15.7348 4 16V19C4 19.7956 4.31607 20.5587 4.87868 21.1213C5.44129 21.6839 6.20435 22 7 22H17C17.7956 22 18.5587 21.6839 19.1213 21.1213C19.6839 20.5587 20 19.7956 20 19V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2Z" />
					</svg>
					<?php esc_html_e( 'Logout', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php if(!empty($bookingpress_staffmember_access_admin) && $bookingpress_staffmember_access_admin == 'true') { ?>
			<li class="bpa-ssn-nav__swtich-wp-btn">
				<el-button class="bpa-btn bpa-btn--full-width" @click="bpa_staffmember_open_admin_view">
					<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path d="M2.59288 9.9999C2.59239 12.8384 4.21392 15.4275 6.7678 16.6663L3.23415 6.98541C2.81055 7.93387 2.59207 8.96111 2.59288 9.9999ZM10.1304 10.6478L7.90755 17.1058C9.3999 17.5452 10.9927 17.5039 12.4602 16.9876C12.4396 16.9552 12.4218 16.9211 12.4071 16.8855L10.1304 10.6478ZM15.0009 9.62636C14.9909 8.90192 14.7795 8.19456 14.3902 7.58355C13.9921 7.08263 13.7402 6.48134 13.6625 5.84619C13.6446 5.1403 14.2006 4.55263 14.9065 4.53158C14.9393 4.53158 14.9705 4.53554 15.0024 4.53754C11.9864 1.77485 7.30187 1.98025 4.53922 4.99621C4.27191 5.28798 4.02848 5.6007 3.8112 5.93137C3.98503 5.9369 4.14887 5.94038 4.28787 5.94038C5.0625 5.94038 6.26216 5.84614 6.26216 5.84614C6.43099 5.83638 6.57579 5.96534 6.58556 6.13417C6.59505 6.29834 6.47314 6.44071 6.30946 6.4566C6.30946 6.4566 5.90799 6.50359 5.46181 6.52696L8.15907 14.5505L9.78038 9.68891L8.6263 6.52702C8.22721 6.50363 7.84939 6.45665 7.84939 6.45665C7.6811 6.44038 7.55784 6.29074 7.57406 6.12245C7.5899 5.95865 7.73232 5.8367 7.89654 5.84619C7.89654 5.84619 9.11952 5.94043 9.84728 5.94043C10.6219 5.94043 11.8218 5.84619 11.8218 5.84619C11.9906 5.83632 12.1355 5.96517 12.1453 6.13395C12.1549 6.29834 12.0329 6.44092 11.869 6.45665C11.869 6.45665 11.4672 6.50364 11.0213 6.52702L13.6982 14.4895L14.4623 12.0681C14.7607 11.2851 14.9422 10.4623 15.0009 9.62636ZM16.5502 7.20801C16.5374 8.12066 16.346 9.02203 15.9868 9.86112L13.7244 16.4024C17.1943 14.3839 18.4252 9.96908 16.5004 6.4464C16.5341 6.69884 16.5507 6.95329 16.5502 7.20801ZM10.0002 1.11133C5.09104 1.11133 1.11133 5.09104 1.11133 10.0002C1.11133 14.9094 5.09104 18.8891 10.0002 18.8891C14.9094 18.8891 18.8891 14.9094 18.8891 10.0002C18.8891 5.09104 14.9094 1.11133 10.0002 1.11133ZM13.2524 17.6993C10.6511 18.8002 7.66944 18.5104 5.32888 16.9291C3.98536 16.022 2.93365 14.7449 2.301 13.2524C1.19987 10.6511 1.4898 7.66933 3.0714 5.32888C3.9783 3.98524 5.25543 2.93343 6.74805 2.30105C9.34934 1.2002 12.331 1.49002 14.6716 3.07129C16.0151 3.97836 17.0668 5.25548 17.6994 6.74799C18.8006 9.34928 18.5106 12.3311 16.929 14.6715C16.0221 16.0151 14.745 17.067 13.2524 17.6993Z" />
					</svg>
					<?php esc_html_e( 'Swtich to WordPress', 'bookingpress-appointment-booking' ); ?>
				</el-button>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>

<div class="bpa-staff-header-navbar__mob">
	<div class="bpa-shn-mob__wrap">
		<div class="bpa-shn-wrap__left">
			<a href="#">
				<img width="88" src="https://foatconcept.com.ar/turnos/wp-content/uploads/2025/08/logo-svg.svg" alt="" />
			</a>
		</div>
		<div class="bpa-shn-wrap__right">
			<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path d="M14.9102 8.82422C14.9102 5.01172 12.8594 3.71484 10.9414 3.42578C10.9414 3.40625 10.9453 3.38672 10.9453 3.36328C10.9453 2.88281 10.5195 2.5 10 2.5C9.48047 2.5 9.07031 2.88281 9.07031 3.36328C9.07031 3.38672 9.07031 3.40625 9.07422 3.42578C7.15234 3.71875 5.08984 5.01953 5.08984 8.83203C5.08984 13.2773 3.98438 13.7539 2.5 15.0039H17.5C16.0234 13.75 14.9102 13.2695 14.9102 8.82422Z" fill="#727E95"/>
				<path d="M10.0078 17.5C11.0547 17.5 11.9141 16.7227 12.0273 15.8203H7.98828C8.09766 16.7227 8.96094 17.5 10.0078 17.5Z" fill="#727E95"/>
			</svg>
			<div class="bpa-shn-mob-hamburger" @click="bpa_staffmemeber_toogle_menu" :class="(bpa_toggle_active == 1) ? '__bpa-is-active' : ''">
				<div class="bpa-menu-toggle" id="bpa-mobile-menu">
					<span class="bpa-mm-bar"></span>
					<span class="bpa-mm-bar"></span>
					<span class="bpa-mm-bar"></span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="mob-nav-overlay" id="mob-nav-overlay"></div>

<?php if(!empty($bookingpress_upcomming_appointment)) { ?>
<el-dialog custom-class="bpa-dialog bpa-dailog__small bpa-dialog--staff-upcoming-appointment" id="staffmember_customize_notification_model" title="" :visible.sync="staffmember_customize_notification_model" :close-on-press-escape="close_modal_on_esc" :modal="is_mask_display" @open="bookingpress_enable_modal" @close="bookingpress_disable_modal">	
	<div class="bpa-dialog-body">
		<div class="bpa-sua__wrapper">
			<div class="bpa-sua-upcoming-pill">
				<el-tag><?php esc_html_e('Upcoming','bookingpress-appointment-booking'); ?></el-tag>
			</div>
		</div>
		<div class="bpa-sua__info-wrapper">
			<div class="bpa-sua-iw__head">
				<span><?php echo esc_html__('ID','bookingpress-appointment-booking').': #'.esc_html($bookingpress_upcomming_appointment['booking_id']); ?></span>
				<h4><?php  echo esc_html($bookingpress_upcomming_appointment['service_name']); ?></h4>
			</div>
			<div class="bpa-sua-iw__body">
				<div class="bpa-sua-iw__body-item">
					<div class="bpa-sua-iw__body-item-row">
						<span><?php esc_html_e('Date:','bookingpress-appointment-booking'); ?></span>
						<p><?php  echo esc_html($bookingpress_upcomming_appointment['appointment_date']); ?></p>
					</div>
					<div class="bpa-sua-iw__body-item-row">
						<span><?php esc_html_e('Duration:','bookingpress-appointment-booking'); ?></span>
						<p><?php echo esc_html($bookingpress_upcomming_appointment['appointment_duration']); ?></p>
					</div>
				</div>
				<div class="bpa-sua-iw__body-item">
					<h5><?php esc_html_e('Customer Details','bookingpress-appointment-booking'); ?></h5>
					<div class="bpa-sua-iw__body-item-row">
						<span><?php esc_html_e('Full Name:','bookingpress-appointment-booking'); ?></span>
						<p><?php echo esc_html($bookingpress_upcomming_appointment['customer_name']); ?></p>
					</div>
					<div class="bpa-sua-iw__body-item-row">
						<span><?php esc_html_e('Email:','bookingpress-appointment-booking'); ?></span>
						<p><?php echo esc_html($bookingpress_upcomming_appointment['customer_email']); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</el-dialog>
<?php } ?>