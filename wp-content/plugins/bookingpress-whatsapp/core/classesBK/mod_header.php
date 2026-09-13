<?php
global $BookingPressPro, $bookingpress_slugs;
$request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard'; //// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['action'] sanitized properly
$request_action = ( ! empty($_REQUEST['action']) ) ? sanitize_text_field($_REQUEST['action']) : 'forms'; //// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['action'] sanitized properly

$bookingpress_stories_plural_name = "Historias Clinicas";
$bookingpress_stories_singular_name = "Historia Clinica";


                    if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_staff_members' ) ) {
						?>
					<li class="bpa-nav-item <?php echo ( 'stories' == $request_module ) ? '__active' : ''; ?>" v-if="staffmember_module == 1">
					<?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - URL is escaped properly ?>
						<a href="<?php echo add_query_arg( 'page', esc_html($bookingpress_slugs->bookingpress_stories), esc_url( admin_url() . 'admin.php?page=bookingpress' ) );  // phpcs:ignore ?>" class="bpa-nav-link">		
							<div class="bpa-nav-link--icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm0 4c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V19z"/></svg>
							</div>
							<?php echo esc_html(stripslashes_deep($bookingpress_stories_plural_name)); ?>
						</a>
					</li>				
						<?php
					}