<?php


		function remove_admin_bar_style_backend() {
			echo '<style>body.admin-bar #wpcontent #wpadminbar { display:none !important; }.bpa-header-navbar{top:0px !important;} html.wp-toolbar{padding-top:0px !important;} .bpa-header-navbar .bpa-navbar-nav ul{ top: 88px !important; }</style>';
		}
		function bookingpress_body_unique_class_staff_panel($classes) {
			$classes .= ' bpa-admin-bar--hidden';
			return $classes;
		}
		function bookingpress_modify_header_content_func( $bookingpress_header_file_url,$from_header = 0 ) {
			global $bookingpress_coupons,$bookingpress_slugs, $bookingpress_pro_staff_members,$BookingPress;
			$bookingpress_new_slugs = new stdClass();
			$bookingpress_new_slugs->bookingpress_staff_members = 'bookingpress_staff_members';
			$bookingpress_new_slugs->bookingpress_addons        = 'bookingpress_addons';
			$bookingpress_new_slugs->bookingpress_coupons       = 'bookingpress_coupons';
			$bookingpress_new_slugs->bookingpress_reports       = 'bookingpress_reports';
			$bookingpress_new_slugs->bookingpress_timesheet     = 'bookingpress_timesheet';
			$bookingpress_new_slugs->bookingpress_myprofile     = 'bookingpress_myprofile';
			$bookingpress_new_slugs->bookingpress_myservices    = 'bookingpress_myservices';
			
			if ( ! empty( $_REQUEST['page'] ) && $_REQUEST['page'] == 'bookingpress_coupons' && ! $bookingpress_coupons->
				bookingpress_check_coupon_module_activation() ) {
				wp_redirect( add_query_arg( 'page', $bookingpress_slugs->bookingpress_addons, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ) );
				exit;
			} elseif ( ! empty( $_REQUEST['page'] ) && $_REQUEST['page'] == 'bookingpress_staff_members' && ! $bookingpress_pro_staff_members->bookingpress_check_staffmember_module_activation() ) {
				wp_redirect( add_query_arg( 'page', $bookingpress_slugs->bookingpress_addons, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ) );
				exit;
			} else {
				if ( $this->bookingpress_check_user_role( 'bookingpress-staffmember' ) ) {

					$bookingpress_staffmember_access_admin = $BookingPress->bookingpress_get_settings( 'bookingpress_staffmember_access_admin', 'staffmember_setting' );
					$bookingpress_staffmember_view = !empty($_REQUEST['staffmember_view']) && ( sanitize_text_field($_REQUEST['staffmember_view']) == 'admin_view' || sanitize_text_field($_REQUEST['staffmember_view']) == 'customize_view') ? sanitize_text_field($_REQUEST['staffmember_view']) : '';

					if($from_header == 0) {
						if(empty($_COOKIE['bookingpress_staffmember_view']) && empty($bookingpress_staffmember_view)) {
							setcookie("bookingpress_staffmember_view",'customize_view',time()+(86400 * 365 *10), "/");
						} elseif (!empty($bookingpress_staffmember_view) && ( $bookingpress_staffmember_view == 'admin_view' || $bookingpress_staffmember_view == 'customize_view')) {
							setcookie("bookingpress_staffmember_view", $bookingpress_staffmember_view,time()+(86400 * 365 *10), "/");
						}
					}

					if(!empty($bookingpress_staffmember_access_admin ) && $bookingpress_staffmember_access_admin == 'true' && (!empty($_COOKIE['bookingpress_staffmember_view']) && ( $_COOKIE['bookingpress_staffmember_view'] == 'admin_view' && $bookingpress_staffmember_view != 'customize_view') || $bookingpress_staffmember_view == 'admin_view')) {

						$bookingpress_header_file_url = BOOKINGPRESS_PRO_VIEWS_DIR . '/bookingpress_pro_staffmember_header.php';	
					} else {
						$bookingpress_header_file_url = BOOKINGPRESS_PRO_VIEWS_DIR . '/bookingpress_pro_staffmember_customize_view.php';
						if ( ! empty( $_REQUEST['page'] ) && (in_array( $_REQUEST['page'], (array) $bookingpress_slugs ) || in_array($_REQUEST['page'], (array) $bookingpress_new_slugs))) {
							add_filter( 'admin_body_class', array( $this, 'bookingpress_dynamic_class_for_customize_view' ) );
						}
					}

					if ( ! empty( $_REQUEST['page'] ) && (in_array( $_REQUEST['page'], (array) $bookingpress_slugs ) || in_array($_REQUEST['page'], (array) $bookingpress_new_slugs))) {
						add_filter( 'admin_head', array( $this, 'remove_admin_bar_style_backend' ) );
						remove_all_filters( 'show_admin_bar' );		
						add_filter( 'show_admin_bar', '__return_false' );
						add_filter( 'admin_body_class',array($this,'bookingpress_body_unique_class_staff_panel'));		
					}					
					
				} else {
					$bookingpress_header_file_url = BOOKINGPRESS_PRO_VIEWS_DIR . '/bookingpress_pro_header.php';
				}
			}			
			
			return $bookingpress_header_file_url;
		}
        
        
        