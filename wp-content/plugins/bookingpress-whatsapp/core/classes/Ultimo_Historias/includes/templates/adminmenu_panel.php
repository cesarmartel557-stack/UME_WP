<?php 

defined('BPHC_PLUGIN_DIR') || exit;

if(!isset($request_module) ) $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';

?>
<li id="expansion_menu_items">
<?php
/*<style>
body.__expansion-is-admin-turnos div#adminmenuback,
div#adminmenuwrap,
ul#adminmenu {
    background: white;
    
}
</style>*/
?>
<div>
     <div class="bpa-ssn__brand-logo">
		<a href="#" class="bpa-ssn-logo">
			<img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod('custom_logo') ) ); #src="https://foatconcept.com.ar/turnos/wp-content/uploads/2025/08/logo-svg.svg"; ?>" alt="" style="max-width: 100%;" />
		</a>		
	</div>
	<div class="bpa-ssn__navbar-wrap">		
		<ul class="bpa-ssn__navbar">
        <?php  if ( $request_module == 'modulos' ) { ?>
            <li >
				<a href="#listadoInternacion" class="" > <!-- class="link_listadoInternacion __bpa-is-active" -->
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
					Listado Internación					
				</a>
			</li>
            
            <li >
				<a href="#internacionIngreso" class="" > <!-- class="link_listadoInternacion __bpa-is-active" -->
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
					Ingreso Internación					
				</a>
			</li>
            
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
					ir a Turnos					
				</a>
			</li>
            
            <li>
				<a href="<?php echo add_query_arg( 'bookingpress_action', 'bookingpress_logout', esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M4 12C4 12.2652 4.10536 12.5196 4.29289 12.7071C4.48043 12.8946 4.73478 13 5 13H12.59L10.29 15.29C10.1963 15.383 10.1219 15.4936 10.0711 15.6154C10.0203 15.7373 9.9942 15.868 9.9942 16C9.9942 16.132 10.0203 16.2627 10.0711 16.3846C10.1219 16.5064 10.1963 16.617 10.29 16.71C10.383 16.8037 10.4936 16.8781 10.6154 16.9289C10.7373 16.9797 10.868 17.0058 11 17.0058C11.132 17.0058 11.2627 16.9797 11.3846 16.9289C11.5064 16.8781 11.617 16.8037 11.71 16.71L15.71 12.71C15.801 12.6149 15.8724 12.5028 15.92 12.38C16.02 12.1365 16.02 11.8635 15.92 11.62C15.8724 11.4972 15.801 11.3851 15.71 11.29L11.71 7.29C11.6168 7.19676 11.5061 7.1228 11.3842 7.07234C11.2624 7.02188 11.1319 6.99591 11 6.99591C10.8681 6.99591 10.7376 7.02188 10.6158 7.07234C10.4939 7.1228 10.3832 7.19676 10.29 7.29C10.1968 7.38324 10.1228 7.49393 10.0723 7.61575C10.0219 7.73757 9.99591 7.86814 9.99591 8C9.99591 8.13186 10.0219 8.26243 10.0723 8.38425C10.1228 8.50607 10.1968 8.61676 10.29 8.71L12.59 11H5C4.73478 11 4.48043 11.1054 4.29289 11.2929C4.10536 11.4804 4 11.7348 4 12ZM17 2H7C6.20435 2 5.44129 2.31607 4.87868 2.87868C4.31607 3.44129 4 4.20435 4 5V8C4 8.26522 4.10536 8.51957 4.29289 8.70711C4.48043 8.89464 4.73478 9 5 9C5.26522 9 5.51957 8.89464 5.70711 8.70711C5.89464 8.51957 6 8.26522 6 8V5C6 4.73478 6.10536 4.48043 6.29289 4.29289C6.48043 4.10536 6.73478 4 7 4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H7C6.73478 20 6.48043 19.8946 6.29289 19.7071C6.10536 19.5196 6 19.2652 6 19V16C6 15.7348 5.89464 15.4804 5.70711 15.2929C5.51957 15.1054 5.26522 15 5 15C4.73478 15 4.48043 15.1054 4.29289 15.2929C4.10536 15.4804 4 15.7348 4 16V19C4 19.7956 4.31607 20.5587 4.87868 21.1213C5.44129 21.6839 6.20435 22 7 22H17C17.7956 22 18.5587 21.6839 19.1213 21.1213C19.6839 20.5587 20 19.7956 20 19V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2Z" />
					</svg>
					<?php esc_html_e( 'Logout', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
            <li>
				<a class="expansion-wp-menu-item collapse-toggle hide-if-no-js" onclick="document.body.classList.toggle('folded');/*document.querySelector(`button#collapse-button`).click();*/">
					<span class="collapse-button-icon" aria-hidden="true"></span>
					<?php esc_html_e( 'Collapse Menu' ); ?>					
				</a>
			</li>
            
        <?php  } else { ?>
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
			<?php 
            }
                        
            global $bookingpress_stories;
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_appointments' ) && $bookingpress_stories->user_can_access_historias() ) {
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
			<?php 
            }
            
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_services' ) ) {
			?>
			<li>
                <?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - URL is escaped properly ?>
                <a href="<?php echo add_query_arg( 'page',esc_html($bookingpress_slugs->bookingpress_services), esc_url( admin_url() . 'admin.php?page=bookingpress' ) );  // phpcs:ignore ?>" class="<?php echo ( 'services' == $request_module ) ? '__bpa-is-active' : ''; ?>">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#727E95">
                        <path d="M0 0h24v24H0V0z" fill="none" style="fill: none !important;"/>
                        <path d="M14 9.5h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm0 7h3c.55 0 1-.45 1-1s-.45-1-1-1h-3c-.55 0-1 .45-1 1s.45 1 1 1zm5 4.5H5c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h14c1.1 0 2 .9 2 2v14c0 1.1-.9 2-2 2zM7 11h3c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7V7zm0 11h3c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1zm0-4h3v3H7v-3z"/>
                    </svg>
                    <?php esc_html_e( 'Services', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php }
            
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_staff_members' ) ) {
            global $BookingPress;
            $bookingpress_staffmember_plural_name = $BookingPress->bookingpress_get_settings('bookingpress_staffmember_module_plural_name', 'staffmember_setting');
			?>
            <li>
                <?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - URL is escaped properly ?>
                <a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_staff_members, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ); // phpcs:ignore ?>" class="<?php echo ( 'staff_members' == $request_module ) ? '__bpa-is-active' : ''; ?>">
    				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#727E95">
                        <path d="M0 0h24v24H0V0z" fill="none" style="fill: none !important;"/>
                        <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"/>
                    </svg>
    				<?php echo esc_html(stripslashes_deep($bookingpress_staffmember_plural_name)); ?>
				</a>
			</li>				
			<?php 
            }
            
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_reports' ) ) {
			?>
			<li>
                <?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - URL is escaped properly ?>
				<a href="<?php echo add_query_arg( 'page', esc_html($bookingpress_slugs->bookingpress_reports), esc_url( admin_url() . 'admin.php?page=bookingpress' ) );  // phpcs:ignore ?>" class="<?php echo ( 'reports' == $request_module ) ? '__bpa-is-active' : ''; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                        <g><path d="M0,0h24v24H0V0z" fill="none" style="fill: none !important;"/></g>
                        <g>
                            <g><path d="M15.59,3.59C15.21,3.21,14.7,3,14.17,3H5C3.9,3,3.01,3.9,3.01,5L3,19c0,1.1,0.89,2,1.99,2H19c1.1,0,2-0.9,2-2V9.83 c0-0.53-0.21-1.04-0.59-1.41L15.59,3.59z M8,17c-0.55,0-1-0.45-1-1s0.45-1,1-1s1,0.45,1,1S8.55,17,8,17z M8,13c-0.55,0-1-0.45-1-1 s0.45-1,1-1s1,0.45,1,1S8.55,13,8,13z M8,9C7.45,9,7,8.55,7,8s0.45-1,1-1s1,0.45,1,1S8.55,9,8,9z M14,9V4.5l5.5,5.5H15 C14.45,10,14,9.55,14,9z"/></g>
                        </g>
                    </svg>
				    <?php esc_html_e( 'Reports', 'bookingpress-appointment-booking' ); ?>
				</a>
			</li>
			<?php 
            }
            /** REMOVIDO -- FALSE */
			if ( FALSE && $BookingPressPro->bookingpress_check_capability( 'bookingpress_timesheet' ) ) {
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
            
            /** IGNORADO ---  FALSE */
			if ( FALSE && $BookingPressPro->bookingpress_check_capability( 'bookingpress_myservices' ) ) {
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
            <?php
            $in_list_perfil_wordpress = TRUE;
            if ( $in_list_perfil_wordpress ) {
			?>
			<li>
				<a href="<?php echo esc_url( admin_url() . 'profile.php' ); // phpcs:ignore ?>" class="expansion-wp-menu-item <?php echo ( strstr($_SERVER['REQUEST_URI'], 'profile.php' ) ) ? '__bpa-is-active' : ''; ?>">
					<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#727E95">
                        <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
                    </svg>
					<?php esc_html_e( 'Profile', 'bookingpress-appointment-booking' ); ?>
                    <?php esc_html_e( 'WP', 'bookingpress-appointment-booking' ); ?>					
				</a>
			</li>
			<?php } ?>
            
            <li>
				<a class="expansion-wp-menu-item collapse-toggle hide-if-no-js" onclick="document.body.classList.toggle('folded');/*document.querySelector(`button#collapse-button`).click();*/">
					<span class="collapse-button-icon" aria-hidden="true"></span>
					<?php esc_html_e( 'Collapse Menu' ); ?>					
				</a>
			</li>
            
        <?php } ?>
        </ul>
   </div>
</div>
</li>

<?php
        /**
        echo '<li id="collapse-menu" class="hide-if-no-js" onclick="document.querySelector(`button#collapse-button`).click()">' .
		'<button type="button" id="collapse-button" aria-label="' . esc_attr__( 'Collapse Main Menu' ) . '" aria-expanded="true">' .
		'<span class="collapse-button-icon" aria-hidden="true"></span>' .
		'<span class="collapse-button-label expansion-wp-menu-item">' . __( 'Collapse Menu' ) . '</span>' .
		'</button></li>';
        */
        
        