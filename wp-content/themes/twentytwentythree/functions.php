<?php
// ============================================
// MENÃš ADMIN SEPARADO - TURNOS APROBADOS POR USUARIO
// ============================================

// 1. Crear tabla para tracking de aprobaciones al activar
//register_activation_hook(__FILE__, 'bpa_create_approval_tracking_table');
//add_action('admin_init', 'bpa_create_approval_tracking_table');

function bpa_create_approval_tracking_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'bpa_approvals_tracking';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        booking_id bigint(20) NOT NULL,
        approved_by_user_id bigint(20) NOT NULL,
        approved_by_name varchar(255) NOT NULL,
        customer_name varchar(255) NOT NULL,
        customer_email varchar(255) NOT NULL,
        service_name varchar(255) NOT NULL,
        appointment_date datetime NOT NULL,
        approved_at datetime DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY booking_id (booking_id),
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// 2. FunciÃ³n para sincronizar citas confirmadas con nuestra tabla
function bpa_sync_confirmed_appointments() {
    global $wpdb;
    
    $booking_table = $wpdb->prefix . 'bookingpress_entries';
    $services_table = $wpdb->prefix . 'bookingpress_services';
    $tracking_table = $wpdb->prefix . 'bpa_approvals_tracking';
    $current_user = wp_get_current_user();
    
    // Obtener citas confirmadas que no estÃ¡n en nuestra tabla de tracking
    $confirmed_appointments = $wpdb->get_results("
        SELECT 
            be.bookingpress_entry_id,
            be.bookingpress_customer_firstname,
            be.bookingpress_customer_lastname,
            be.bookingpress_customer_email,
            be.bookingpress_appointment_date,
            be.bookingpress_appointment_time,
            be.bookingpress_service_id,
            bs.bookingpress_service_name
        FROM {$booking_table} be
        LEFT JOIN {$services_table} bs ON be.bookingpress_service_id = bs.bookingpress_service_id
        LEFT JOIN {$tracking_table} bt ON be.bookingpress_entry_id = bt.booking_id
        WHERE be.bookingpress_appointment_status = '1' 
        AND bt.booking_id IS NULL
    ");
    
    // Insertar en nuestra tabla de tracking
    foreach ($confirmed_appointments as $appointment) {
        $customer_name = trim($appointment->bookingpress_customer_firstname . ' ' . $appointment->bookingpress_customer_lastname);
        $appointment_datetime = $appointment->bookingpress_appointment_date . ' ' . $appointment->bookingpress_appointment_time;
        
        $wpdb->insert(
            $tracking_table,
            array(
                'booking_id' => $appointment->bookingpress_entry_id,
                'approved_by_user_id' => $current_user->ID,
                'approved_by_name' => $current_user->display_name,
                'customer_name' => $customer_name,
                'customer_email' => $appointment->bookingpress_customer_email,
                'service_name' => $appointment->bookingpress_service_name,
                'appointment_date' => $appointment_datetime,
                'approved_at' => current_time('mysql')
            ),
            array('%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s')
        );
    }
    
    return count($confirmed_appointments);
}

// 3. Crear menÃº en el admin
//add_action('admin_menu', 'bpa_add_approvals_menu');

function bpa_add_approvals_menu() {
    add_menu_page(
        'Turnos Aprobados',                    // TÃ­tulo de la pÃ¡gina
        'Turnos Aprobados',                    // Texto del menÃº
        'manage_options',                      // Capacidad requerida
        'turnos-aprobados',                    // Slug del menÃº
        'bpa_approvals_page',                  // FunciÃ³n que muestra la pÃ¡gina
        'dashicons-yes-alt',                   // Icono
        30                                     // PosiciÃ³n
    );
    
    add_submenu_page(
        'turnos-aprobados',
        'EstadÃ­sticas',
        'EstadÃ­sticas',
        'manage_options',
        'turnos-estadisticas',
        'bpa_stats_page'
    );
}

// 4. PÃ¡gina principal del menÃº
function bpa_approvals_page() {
    // Sincronizar citas al cargar la pÃ¡gina
    $synced = bpa_sync_confirmed_appointments();
    
    global $wpdb;
    $tracking_table = $wpdb->prefix . 'bpa_approvals_tracking';
    
    // Obtener filtros
    $approved_by_filter = isset($_GET['approved_by']) ? sanitize_text_field($_GET['approved_by']) : '';
    $date_from = isset($_GET['date_from']) ? sanitize_text_field($_GET['date_from']) : '';
    $date_to = isset($_GET['date_to']) ? sanitize_text_field($_GET['date_to']) : '';
    
    // Construir consulta con filtros
    $where_conditions = array('1=1');
    $where_values = array();
    
    if ($approved_by_filter) {
        $where_conditions[] = "approved_by_name LIKE %s";
        $where_values[] = '%' . $approved_by_filter . '%';
    }
    
    if ($date_from) {
        $where_conditions[] = "DATE(appointment_date) >= %s";
        $where_values[] = $date_from;
    }
    
    if ($date_to) {
        $where_conditions[] = "DATE(appointment_date) <= %s";
        $where_values[] = $date_to;
    }
    
    $where_clause = implode(' AND ', $where_conditions);
    
    // Obtener datos con paginaciÃ³n
    $per_page = 20;
    $page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $offset = ($page - 1) * $per_page;
    
    if (!empty($where_values)) {
        $query = $wpdb->prepare("
            SELECT * FROM {$tracking_table} 
            WHERE {$where_clause} 
            ORDER BY approved_at DESC 
            LIMIT %d OFFSET %d
        ", array_merge($where_values, array($per_page, $offset)));
        
        $count_query = $wpdb->prepare("
            SELECT COUNT(*) FROM {$tracking_table} 
            WHERE {$where_clause}
        ", $where_values);
    } else {
        $query = $wpdb->prepare("
            SELECT * FROM {$tracking_table} 
            ORDER BY approved_at DESC 
            LIMIT %d OFFSET %d
        ", $per_page, $offset);
        
        $count_query = "SELECT COUNT(*) FROM {$tracking_table}";
    }
    
    $approvals = $wpdb->get_results($query);
    $total_items = $wpdb->get_var($count_query);
    $total_pages = ceil($total_items / $per_page);
    
    // Obtener lista de usuarios que han aprobado citas
    $approved_by_users = $wpdb->get_results("
        SELECT DISTINCT approved_by_name 
        FROM {$tracking_table} 
        ORDER BY approved_by_name
    ");
    
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">
            <span style="color: #0073aa;">ðŸ“‹</span> Turnos Aprobados por Usuario
        </h1>
        
        <?php if ($synced > 0): ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>âœ… Se sincronizaron <?php echo $synced; ?> nuevas citas confirmadas.</strong></p>
        </div>
        <?php endif; ?>
        
        <!-- Filtros -->
        <div class="tablenav top">
            <form method="get" style="display: flex; gap: 15px; align-items: center; background: #f9f9f9; padding: 15px; border-radius: 8px; margin: 20px 0;">
                <input type="hidden" name="page" value="turnos-aprobados">
                
                <div>
                    <label><strong>Aprobado por:</strong></label>
                    <select name="approved_by" style="width: 200px;">
                        <option value="">Todos los usuarios</option>
                        <?php foreach ($approved_by_users as $user): ?>
                        <option value="<?php echo esc_attr($user->approved_by_name); ?>" 
                                <?php selected($approved_by_filter, $user->approved_by_name); ?>>
                            <?php echo esc_html($user->approved_by_name); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div>
                    <label><strong>Desde:</strong></label>
                    <input type="date" name="date_from" value="<?php echo esc_attr($date_from); ?>">
                </div>
                
                <div>
                    <label><strong>Hasta:</strong></label>
                    <input type="date" name="date_to" value="<?php echo esc_attr($date_to); ?>">
                </div>
                
                <input type="submit" value="Filtrar" class="button button-primary">
                <a href="?page=turnos-aprobados" class="button">Limpiar filtros</a>
            </form>
        </div>
        
        <!-- Resumen -->
        <div style="display: flex; gap: 20px; margin: 20px 0;">
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                <h3 style="margin: 0; font-size: 24px;"><?php echo number_format($total_items); ?></h3>
                <p style="margin: 5px 0 0 0;">Total de Turnos Aprobados</p>
            </div>
            
            <div style="background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                <h3 style="margin: 0; font-size: 24px;"><?php echo count($approved_by_users); ?></h3>
                <p style="margin: 5px 0 0 0;">Usuarios que Aprueban</p>
            </div>
            
            <div style="background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; flex: 1;">
                <h3 style="margin: 0; font-size: 24px;"><?php echo date('d/m/Y'); ?></h3>
                <p style="margin: 5px 0 0 0;">Ãšltima ActualizaciÃ³n</p>
            </div>
        </div>
        
        <!-- Tabla de turnos -->
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Servicio</th>
                    <th>Fecha del Turno</th>
                    <th>Aprobado por</th>
                    <th>Fecha de AprobaciÃ³n</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($approvals)): ?>
                <tr>
                    <td colspan="8" style="text-align: center; padding: 40px;">
                        <div style="color: #666;">
                            <span style="font-size: 48px;">ðŸ“­</span>
                            <h3>No hay turnos aprobados</h3>
                            <p>AÃºn no se han registrado turnos aprobados con los filtros seleccionados.</p>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($approvals as $approval): ?>
                <tr>
                    <td><strong>#<?php echo esc_html($approval->booking_id); ?></strong></td>
                    <td>
                        <strong><?php echo esc_html($approval->customer_name); ?></strong>
                    </td>
                    <td><?php echo esc_html($approval->customer_email); ?></td>
                    <td>
                        <span style="background: #e1f5fe; color: #0277bd; padding: 4px 8px; border-radius: 12px; font-size: 12px;">
                            <?php echo esc_html($approval->service_name); ?>
                        </span>
                    </td>
                    <td>
                        <strong><?php echo date('d/m/Y H:i', strtotime($approval->appointment_date)); ?></strong>
                    </td>
                    <td>
                        <span style="background: linear-gradient(135deg, #28a745, #20c997); color: white; padding: 6px 12px; border-radius: 15px; font-weight: bold; font-size: 12px;">
                            âœ… <?php echo esc_html($approval->approved_by_name); ?>
                        </span>
                    </td>
                    <td><?php echo date('d/m/Y H:i', strtotime($approval->approved_at)); ?></td>
                    <td>
                        <a href="?page=bookingpress&view=appointment&id=<?php echo $approval->booking_id; ?>" 
                           class="button button-small" 
                           title="Ver en BookingPress">
                            ðŸ‘ï¸ Ver
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
        <!-- PaginaciÃ³n -->
        <?php if ($total_pages > 1): ?>
        <div class="tablenav bottom">
            <div class="tablenav-pages">
                <span class="displaying-num"><?php echo number_format($total_items); ?> elementos</span>
                <?php
                $page_links = paginate_links(array(
                    'base' => add_query_arg('paged', '%#%'),
                    'format' => '',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                    'total' => $total_pages,
                    'current' => $page
                ));
                echo $page_links;
                ?>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Acciones adicionales -->
        <div style="margin: 30px 0; padding: 20px; background: #f0f8ff; border: 1px solid #b3d9ff; border-radius: 8px;">
            <h3>ðŸ”§ Acciones de Mantenimiento</h3>
            <p>
                <button id="sync-appointments" class="button button-secondary">
                    ðŸ”„ Sincronizar Citas Confirmadas
                </button>
                <button id="export-csv" class="button button-secondary" style="margin-left: 10px;">
                    ðŸ“Š Exportar a CSV
                </button>
            </p>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Sincronizar citas
        $('#sync-appointments').click(function() {
            $(this).prop('disabled', true).text('ðŸ”„ Sincronizando...');
            location.reload();
        });
        
        // Exportar CSV
        $('#export-csv').click(function() {
            var params = new URLSearchParams(window.location.search);
            params.set('action', 'export_approvals_csv');
            window.location.href = 'admin-ajax.php?' + params.toString();
        });
    });
    </script>
    
    <style>
    .wp-list-table th, .wp-list-table td {
        padding: 12px 10px;
        vertical-align: middle;
    }
    .wp-list-table tbody tr:hover {
        background: #f0f8ff;
    }
    </style>
    <?php
}

// 5. PÃ¡gina de estadÃ­sticas
function bpa_stats_page() {
    global $wpdb;
    $tracking_table = $wpdb->prefix . 'bpa_approvals_tracking';
    
    // EstadÃ­sticas por usuario
    $stats_by_user = $wpdb->get_results("
        SELECT 
            approved_by_name,
            COUNT(*) as total_approved,
            MIN(approved_at) as first_approval,
            MAX(approved_at) as last_approval
        FROM {$tracking_table}
        GROUP BY approved_by_name
        ORDER BY total_approved DESC
    ");
    
    // EstadÃ­sticas por mes
    $stats_by_month = $wpdb->get_results("
        SELECT 
            DATE_FORMAT(approved_at, '%Y-%m') as month,
            COUNT(*) as total_approved
        FROM {$tracking_table}
        GROUP BY month
        ORDER BY month DESC
        LIMIT 12
    ");
    
    ?>
    <div class="wrap">
        <h1><span style="color: #0073aa;">ðŸ“Š</span> EstadÃ­sticas de Aprobaciones</h1>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 30px 0;">
            <!-- EstadÃ­sticas por usuario -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h2 style="margin-top: 0; color: #333;">ðŸ‘¥ Aprobaciones por Usuario</h2>
                
                <?php if (empty($stats_by_user)): ?>
                <p style="text-align: center; color: #666; padding: 40px;">
                    No hay datos de aprobaciones aÃºn.
                </p>
                <?php else: ?>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8f9fa;">
                            <th style="padding: 12px; text-align: left; border-bottom: 2px solid #dee2e6;">Usuario</th>
                            <th style="padding: 12px; text-align: center; border-bottom: 2px solid #dee2e6;">Total</th>
                            <th style="padding: 12px; text-align: center; border-bottom: 2px solid #dee2e6;">Ãšltima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stats_by_user as $stat): ?>
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #eee;">
                                <strong><?php echo esc_html($stat->approved_by_name); ?></strong>
                            </td>
                            <td style="padding: 10px; text-align: center; border-bottom: 1px solid #eee;">
                                <span style="background: #28a745; color: white; padding: 4px 8px; border-radius: 12px; font-weight: bold;">
                                    <?php echo number_format($stat->total_approved); ?>
                                </span>
                            </td>
                            <td style="padding: 10px; text-align: center; border-bottom: 1px solid #eee; font-size: 12px;">
                                <?php echo date('d/m/Y', strtotime($stat->last_approval)); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
            
            <!-- EstadÃ­sticas por mes -->
            <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                <h2 style="margin-top: 0; color: #333;">ðŸ“… Aprobaciones por Mes</h2>
                
                <?php if (empty($stats_by_month)): ?>
                <p style="text-align: center; color: #666; padding: 40px;">
                    No hay datos de aprobaciones aÃºn.
                </p>
                <?php else: ?>
                <div style="max-height: 400px; overflow-y: auto;">
                    <?php foreach ($stats_by_month as $stat): ?>
                    <?php 
                    $month_name = date('F Y', strtotime($stat->month . '-01'));
                    $percentage = ($stat->total_approved / max(array_column($stats_by_month, 'total_approved'))) * 100;
                    ?>
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <strong><?php echo $month_name; ?></strong>
                            <span style="font-weight: bold; color: #0073aa;"><?php echo $stat->total_approved; ?></span>
                        </div>
                        <div style="background: #e9ecef; height: 10px; border-radius: 5px;">
                            <div style="
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
                                height: 100%; 
                                width: <?php echo $percentage; ?>%; 
                                border-radius: 5px;
                                transition: width 0.3s ease;
                            "></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div style="background: #f0f8ff; padding: 20px; border-radius: 10px; border: 1px solid #b3d9ff;">
            <h3>â„¹ï¸ InformaciÃ³n</h3>
            <p>Esta pÃ¡gina muestra estadÃ­sticas detalladas sobre quiÃ©n ha aprobado turnos y cuÃ¡ndo. Los datos se actualizan automÃ¡ticamente cada vez que se aprueba una nueva cita.</p>
            <p><a href="?page=turnos-aprobados" class="button button-primary">â† Volver a la lista de turnos</a></p>
        </div>
    </div>
    <?php
}

// 6. Exportar CSV
//add_action('wp_ajax_export_approvals_csv', 'bpa_export_approvals_csv');

function bpa_export_approvals_csv() {
    if (!current_user_can('manage_options')) {
        wp_die('Sin permisos');
    }
    
    global $wpdb;
    $tracking_table = $wpdb->prefix . 'bpa_approvals_tracking';
    
    $approvals = $wpdb->get_results("SELECT * FROM {$tracking_table} ORDER BY approved_at DESC");
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="turnos-aprobados-' . date('Y-m-d') . '.csv"');
    
    $output = fopen('php://output', 'w');
    
    // Encabezados CSV
    fputcsv($output, array(
        'ID Turno',
        'Cliente',
        'Email',
        'Servicio', 
        'Fecha del Turno',
        'Aprobado por',
        'Fecha de AprobaciÃ³n'
    ));
    
    // Datos
    foreach ($approvals as $approval) {
        fputcsv($output, array(
            $approval->booking_id,
            $approval->customer_name,
            $approval->customer_email,
            $approval->service_name,
            $approval->appointment_date,
            $approval->approved_by_name,
            $approval->approved_at
        ));
    }
    
    fclose($output);
    exit;
}



function dolly_css22() {
      // Cargar Google Fonts Poppins
      wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', false);
      wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css' );
     
      // Rol a verificar
      $rol = 'bookingpress-staffmember'; // Cambia esto por el rol que deseas verificar

      // Obtener el objeto del usuario actual
      $usuario_actual = wp_get_current_user();

      // Admin Limitado ID: 328

      // Carruega Walter Ariel ID: 311

      // Ferando ID: 309

      // Micaela Esquivel  ID: 620
	
      // This makes sure that the positioning is also good for right-to-left languages
      if (false && get_current_user_id() != 1 ) {
        
    ?>

        <style>
        #adminmenuwrap {
            width: 250px;
            background: #fff !important;
            border-right: 1px solid #eee;
            position: fixed;
            height: 100%;
        }

        .bpa-dialog--fullscreen.is-fullscreen {
            margin: unset;
            width: 100%;
            z-index: 9998!important;
            margin-left: 250px;
            width: calc(100% - 250px);
            box-shadow: none;
            border-radius: unset;
        }

        #adminmenu {
        width: 100%;
        background: #fff !important;
        }

        #adminmenuback {display: none;}

        #adminmenu .wp-has-current-submenu .wp-submenu {
        width: 100%;
        background: #fff !important;
        }

        #wpcontent, #wpfooter {
        margin-left: 250px;
        }

        #adminmenu .wp-submenu li:not(:last-child) {
            margin-bottom: 3px;
        }

        #adminmenu .wp-submenu a {
            padding: 13px 0 13px 30px !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            font-family:'Poppins', sans-serif !important;
            color: rgb(83, 93, 113);
            display: flex;
            align-items: center;
        }

        #adminmenu .wp-submenu a.current, #adminmenu .wp-submenu a:hover, #adminmenu .wp-submenu a:active {
            background-color: #096f95;
            color: #fff !important;
            box-shadow: none !important
        }

        /*
        body:not( .bookingpress_page_bookingpress_appointments ) .bpa-table-actions {            
            display:none !important;
        }
        */

        /*
        .bpa-table-actions-wrap .bpa-table-actions>span button {
            display:none !important;
            padding: 6px 8px !important
        }
        
        
        .bpa-table-actions-wrap {
             transform: translateX(0);
        }

        .el-button.bpa-btn.bpa-btn--primary.el-button--default span, .bpa-table-actions .el-button.el-tooltip.bpa-btn.bpa-btn--icon-without-box.el-button--default span,
        .bpa-table-actions .el-button.bpa-btn.bpa-btn--icon-without-box.__secondary.el-button--text.el-popover__reference span {color: #fff !important}

        .bpa-table-actions .el-button.bpa-btn.bpa-btn--icon-without-box.__secondary.el-button--text.el-popover__reference svg {fill: #fff !important}


        .bpa-pagination.el-row .bpa-bulk-actions-card {
            display:none;
        }

        .bpa-vac--head .bpa-hw-right-btn-group.bpa-vac--head__right .btn-goHistoryBooking.el-button {
			 display:none;
		}
		*/
		
		.bookingpress_page_inner_wrapper button, .bookingpress_page_inner_wrapper .el-button--primary, .bookingpress_page_inner_wrapper button {
            color: rgb(32, 44, 69) !important
        }
        
        .el-button.bpa-btn.el-button--default span {color: #727E95 !important;}
        
         #adminmenu li#menu-dashboard a.menu-top {
            text-indent:-9999px;
            padding: 10px 12px;
            display: block;
            height: 54px;
            background-size: 192px 186px;
        }

        #adminmenu > li#toplevel_page_bookingpress > a {display: none !important;}

        /* Ãcono de Escritorio */
        #adminmenu .wp-submenu li:nth-child(2) a::before {
            font-family: "bootstrap-icons";
            content: "\F6CE";
            margin-right: 10px;
            font-size: 1.3rem;
            vertical-align: middle;
            color:#096f95;
        }
        </style>

<?php
    }  
    
    if ( get_current_user_id() == 308 || get_current_user_id() == 307 || get_current_user_id() == 311 || get_current_user_id() == 312 || get_current_user_id() == 309 || get_current_user_id() == 328 || get_current_user_id() == 310 || get_current_user_id() == 334 || get_current_user_id() == 315 ) { ?>

    <style>
         /*
        .bpa-table-actions {
            background: #096f95 !important;
            display:block !important;
        }

        
        .bpa-table-actions-wrap .bpa-table-actions>span button {
            display:none !important;
            padding: 6px 8px !important
        }

        .bpa-pagination.el-row .bpa-bulk-actions-card {
            display:block;
        }
        */
    </style>

<?php
    } 
    
    if ( in_array( $rol, (array) $usuario_actual->roles ) ) { ?>

    <style>
        .bpa-table-actions {
            background: #096f95 !important;
            display:block !important;
            position: relative;
            z-index: 4001;
        }

        .bpa-table-actions-wrap .bpa-table-actions>button {
           display:none !important;
        }

        .bpa-table-actions-wrap .bpa-table-actions>span button {
            display:inline-block !important;
            padding: 6px 8px !important
        }

        .bpa-pagination.el-row .bpa-bulk-actions-card {
            display:block;
        }
    </style>

<?php
    } else {}

}// end functions
add_action( 'admin_head', 'dolly_css22' );


function dolly_css33() { ?>
     <style>
        .el-select.bpa-form-control i.el-select__caret {
             color:#999 !important
        }

        .el-select.bpa-form-control.bpa-appointment-status--completed i.el-select__caret {
             color: rgb(18, 212, 136) !important
        }

        .el-select.bpa-form-control.bpa-appointment-status--approved.turno_en_espera i.el-select__caret {
             color: #fff !important
        }

        .el-select.bpa-form-control.bpa-appointment-status--warning i.el-select__caret { 
             color: rgb(245, 174, 65) !important;
        }

        .el-select.bpa-form-control.bpa-appointment-status--cancelled i.el-select__caret {
             color: #727E95 !important 
        } 

         .el-select.bpa-form-control.bpa-appointment-status--approved i.el-select__caret {
             color: #1F63E7 !important 
        } 
    </style>

<?php
}
add_action( 'admin_head', 'dolly_css33' );




/**
 * Estilos personalizados para BookingPress Admin
 *  'bookingpress_page_bookingpress_modulos',
*/

// Inyectar CSS en el panel de administración y frontend
add_action('admin_head', 'inyectar_css_medico_bookingpress_final');
add_action('wp_head', 'inyectar_css_medico_bookingpress_final');

function inyectar_css_medico_bookingpress_final() {
    $is_admin_bp = is_admin() && isset($_GET['page']) && strpos($_GET['page'], 'bookingpress') !== false;
    $is_frontend = !is_admin();
    
    if ( $is_admin_bp || $is_frontend ) {
        echo '
        <style>
        /* ==========================================================================
           BOOKINGPRESS - DISEÑO MÉDICO LIMPIO (ELEMENT UI) - COLOR #128CAA
           ========================================================================== */

        :root {
            --bp-med-primary: #128CAA;
            --bp-med-primary-hover: #0F7A91;
            --bp-med-border: #dcdfe6; /* Borde estándar */
            --bp-med-input-bg: #f5f7fa; /* Fondo gris claro para los inputs */
            --bp-med-text: #374151;
        }

        /* --- 1. BOTONES --- */
        .el-button--primary,
        .el-button.bpa-btn--primary,
        .el-button.bpa-btn--primary.el-button--default,
        .el-button.bpa-btn--primary.el-button--button {
            background-color: var(--bp-med-primary) !important;
            background: var(--bp-med-primary) !important; 
            border-color: var(--bp-med-primary) !important;
            color: #ffffff !important;
            text-shadow: none !important;
            box-shadow: 0 2px 4px rgba(18, 140, 170, 0.15) !important;
            transition: all 0.2s ease !important;
        }

        .el-button--primary:hover,
        .el-button--primary:focus,
        .el-button.bpa-btn--primary:hover,
        .el-button.bpa-btn--primary:focus {
            background-color: var(--bp-med-primary-hover) !important;
            background: var(--bp-med-primary-hover) !important;
            border-color: var(--bp-med-primary-hover) !important;
            color: #ffffff !important;
        }

        .el-button--default,
        .el-button.bpa-btn--secondary,
        .el-button.bpa-btn--secundary {
            background-color: #ffffff !important;
            border: 1px solid var(--bp-med-border) !important;
            color: var(--bp-med-text) !important;
            box-shadow: none !important;
        }

        .el-button--default:hover,
        .el-button.bpa-btn--secondary:hover,
        .el-button.bpa-btn--secundary:hover {
            background-color: #f4f4f5 !important;
            border-color: #c0c4cc !important;
            color: #409eff !important; 
        }
        
        .el-button span, .el-button .bpa-btn__label {
            color: inherit !important;
        }

        /* --- 2. CAMPOS DE FORMULARIO (Fondo gris) --- */
        .el-input__inner,
        .el-textarea__inner {
            background-color: var(--bp-med-input-bg) !important; /* AQUÍ ESTÁ EL FONDO GRIS */
            background: var(--bp-med-input-bg) !important; /* Doble seguridad */
            border: 1px solid var(--bp-med-border) !important;
            border-radius: 4px !important; 
            color: var(--bp-med-text) !important;
            font-size: 14px !important;
        }

        .el-input__inner:hover {
            border-color: #c0c4cc !important;
        }

        /* Estado Focus (Al hacer clic) */
        .el-input__inner:focus,
        .el-textarea__inner:focus,
        .el-input.is-active .el-input__inner {
            background-color: #ffffff !important; /* Se pone blanco al hacer clic para darle foco */
            border-color: var(--bp-med-primary) !important;
            box-shadow: 0 0 0 2px rgba(18, 140, 170, 0.12) !important;
        }

        /* Etiquetas (Labels) */
        .el-form-item__label,
        .bpa-form-label {
            color: var(--bp-med-text) !important;
            font-weight: 500 !important;
        }

        /* --- 3. ACORDEÓN Y TÍTULOS --- */
        .el-collapse-item__header {
            font-size: 15px !important;
            font-weight: 600 !important;
            color: #1f2937 !important;
            border-bottom: 1px solid #ebeef5 !important;
        }
        .el-collapse-item__header.is-active {
            color: var(--bp-med-primary) !important;
            border-bottom-color: var(--bp-med-primary) !important;
        }
        .sec-icon .material-icons-round,
        .sec-icon svg {
            color: var(--bp-med-primary) !important;
        }

        /* --- 4. CONTENEDORES (Cards) --- */
        .bpa-default-card,
        .el-card.is-always-shadow,
        .el-card.box-card {
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.05) !important;
            border: 1px solid #ebeef5 !important;
            border-radius: 6px !important;
        }

        /* --- 5. SELECTORES DESPLEGABLES --- */
        .el-select-dropdown__item.selected,
        .el-select-dropdown__item.hover,
        .el-select-dropdown__item:hover {
            color: var(--bp-med-primary) !important;
            background-color: #f0f9ff !important;
        }

        /* ==========================================================================
   BOOKINGPRESS - INPUTS DATE, NUMBER, TEL Y ICONOS SVG
   ========================================================================== */

/* --- 1. INPUTS DATE Y NUMBER - Fondo gris --- */
input[type="date"],
input[type="number"],
input[type="date"].el-input__inner,
input[type="number"].el-input__inner,
.bpa-form-control input[type="date"],
.bpa-form-control input[type="number"] {
    background-color: #f5f7fa !important;
    border: 1px solid #dcdfe6 !important;
    border-radius: 4px !important;
    padding: 10px 14px !important;
    font-size: 14px !important;
    color: #374151 !important;
    transition: all 0.2s ease !important;
}

input[type="date"]:hover,
input[type="number"]:hover {
    border-color: #c0c4cc !important;
}

input[type="date"]:focus,
input[type="number"]:focus {
    background-color: #ffffff !important;
    border-color: #128CAA !important;
    box-shadow: 0 0 0 2px rgba(18, 140, 170, 0.12) !important;
}

/* --- 2. INPUT TELÉFONO (vue-tel-input) - Fondo gris --- */
.vue-tel-input,
.bpa-form-control.--bpa-country-dropdown,
.bpa-form-control .vue-tel-input {
    background-color: #f5f7fa !important;
    border: 1px solid #dcdfe6 !important;
    border-radius: 4px !important;
    transition: all 0.2s ease !important;
}

.vue-tel-input:hover,
.bpa-form-control.--bpa-country-dropdown:hover {
    border-color: #c0c4cc !important;
}

.vue-tel-input:focus-within,
.bpa-form-control.--bpa-country-dropdown:focus-within {
    background-color: #ffffff !important;
    border-color: #128CAA !important;
    box-shadow: 0 0 0 2px rgba(18, 140, 170, 0.12) !important;
}

.vti__input {
    background-color: transparent !important;
    border: none !important;
    padding: 10px 14px !important;
    font-size: 14px !important;
    color: #374151 !important;
}

.vti__dropdown {
    background-color: transparent !important;
    border-right: 1px solid #dcdfe6 !important;
    padding: 0 10px !important;
}

.vti__selection {
    color: #374151 !important;
}

/* --- 3. ICONOS SVG EN INPUTS - Todas las comillas simples codificadas como %27 --- */

/* Icono usuario */
.el-form-item input[placeholder*="Nombre"],
.el-form-item input[placeholder*="nombre"],
.el-form-item input[placeholder*="Paciente"],
.el-form-item input[placeholder*="cliente"],
.el-form-item input[placeholder*="Buscar cliente"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2%27/%3E%3Ccircle cx=%2712%27 cy=%277%27 r=%274%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono email */
.el-form-item input[placeholder*="correo"],
.el-form-item input[placeholder*="email"],
.el-form-item input[type="email"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Crect x=%272%27 y=%274%27 width=%2720%27 height=%2716%27 rx=%272%27/%3E%3Cpath d=%27m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono teléfono */
.el-form-item input[placeholder*="teléfono"],
.el-form-item input[placeholder*="phone"],
.el-form-item input[placeholder*="011"],
.el-form-item input[placeholder*="3644"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono ubicación */
.el-form-item input[placeholder*="localidad"],
.el-form-item input[placeholder*="ciudad"],
.el-form-item input[placeholder*="Ciudad"],
.el-form-item input[placeholder*="Dirección"],
.el-form-item input[placeholder*="dirección"],
.el-form-item input[placeholder*="Calle"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z%27/%3E%3Ccircle cx=%2712%27 cy=%2710%27 r=%273%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono documento/DNI */
.el-form-item input[placeholder*="DNI"],
.el-form-item input[placeholder*="documento"],
.el-form-item input[placeholder*="Documento"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z%27/%3E%3Cpolyline points=%2714 2 14 8 20 8%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono calendario */
.el-form-item input[type="date"],
.el-form-item input[placeholder*="fecha"],
.el-form-item input[placeholder*="Fecha"],
.el-form-item input[placeholder*="aaaa-mm-dd"],
.el-form-item input[placeholder*="dd/mm"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Crect x=%273%27 y=%274%27 width=%2718%27 height=%2718%27 rx=%272%27 ry=%272%27/%3E%3Cline x1=%2716%27 y1=%272%27 x2=%2716%27 y2=%276%27/%3E%3Cline x1=%278%27 y1=%272%27 x2=%278%27 y2=%276%27/%3E%3Cline x1=%273%27 y1=%2710%27 x2=%2721%27 y2=%2710%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono notas/textarea */
.el-form-item textarea[placeholder*="Nota"],
.el-form-item textarea[placeholder*="nota"],
.el-form-item textarea[placeholder*="Alergias"],
.el-form-item textarea[placeholder*="Motivo"],
.el-form-item textarea[placeholder*="Describ"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z%27/%3E%3Cpolyline points=%2714 2 14 8 20 8%27/%3E%3Cline x1=%2716%27 y1=%2713%27 x2=%278%27 y2=%2713%27/%3E%3Cline x1=%2716%27 y1=%2717%27 x2=%278%27 y2=%2717%27/%3E%3Cpolyline points=%2710 9 9 9 8 9%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px 14px !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* Icono provincia */
.el-form-item input[placeholder*="Provincia"],
.el-form-item input[placeholder*="provincia"] {
    background-image: url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2716%27 height=%2716%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27%236c757d%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3E%3Cpath d=%27M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z%27/%3E%3Ccircle cx=%2712%27 cy=%2710%27 r=%273%27/%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: 12px center !important;
    background-size: 16px !important;
    padding-left: 36px !important;
}

/* --- 4. HEADER DE PÁGINA CON ICONO --- */
.ume-page-header,
.bpa-db-page-title {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    padding: 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.ume-page-header .ph-icon,
.bpa-db-page-title .ph-icon {
    width: 48px;
    height: 48px;
    background-color: #128CAA;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.ume-page-header .ph-icon svg,
.bpa-db-page-title .ph-icon svg {
    width: 24px;
    height: 24px;
    color: #ffffff;
    stroke: #ffffff;
}

.ume-page-header h1,
.bpa-db-page-title h1 {
    font-size: 24px;
    font-weight: 700;
    color: #212529;
    margin: 0 0 4px 0;
}

.ume-page-header p,
.bpa-db-page-title p {
    font-size: 14px;
    color: #6c757d;
    margin: 0;
}

/* --- 5. SECCIONES CON ICONOS --- */
.bpa-db-sec-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    padding: 16px 20px;
    background-color: #ffffff;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.bpa-db-sec-heading .sec-icon {
    width: 40px;
    height: 40px;
    background-color: #e8f6f8;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.bpa-db-sec-heading .sec-icon svg {
    width: 20px;
    height: 20px;
    color: #128CAA;
    stroke: #128CAA;
}

.bpa-db-sec-heading h2 {
    font-size: 18px;
    font-weight: 700;
    color: #212529;
    margin: 0;
}

/* ==========================================================================
   CORRECCIONES MODAL INTERNACIÓN
   ========================================================================== */

/* Eliminar borde inferior de inputs */
.internacion-edit-view .el-input__inner,
.internacion-edit-view .el-textarea__inner,
.internacion-edit-view .el-select .el-input__inner {
    border-bottom: 1px solid #dcdfe6 !important;
    box-shadow: none !important;
}

/* Arreglar select con fondo celeste roto (tag) */
.internacion-edit-view .tag-with-select.el-tag.el-tag--primary.el-tag--dark {
    background-color: transparent !important;
    border: none !important;
    padding: 0 !important;
}

.internacion-edit-view .tag-with-select .el-select {
    max-width: 140px !important;
}

.internacion-edit-view .tag-with-select .el-input__inner {
    background-color: #f5f7fa !important;
    border: 1px solid #dcdfe6 !important;
    border-radius: 8px !important;
    padding: 10px 14px !important;
    font-size: 14px !important;
    color: #374151 !important;
    height: 42px !important;
    line-height: 42px !important;
}

.internacion-edit-view .tag-with-select .el-input__inner:hover {
    border-color: #c0c4cc !important;
}

.internacion-edit-view .tag-with-select .el-input__inner:focus {
    background-color: #ffffff !important;
    border-color: #128CAA !important;
    box-shadow: 0 0 0 2px rgba(18, 140, 170, 0.12) !important;
}

/* Dropdown del select */
.internacion-edit-view .tag-with-select .el-select-dropdown__item {
    padding: 8px 16px !important;
    font-size: 14px !important;
}

.internacion-edit-view .tag-with-select .el-select-dropdown__item.selected {
    color: #128CAA !important;
    font-weight: 600 !important;
    background-color: #e8f6f8 !important;
}

.internacion-edit-view .tag-with-select .el-select-dropdown__item:hover {
    background-color: #e8f6f8 !important;
    color: #128CAA !important;
}

/* ==========================================================================
   CORRECCIONES FINALES - MODAL INTERNACIÓN
   ========================================================================== */

/* 1. SELECT "INTERNADO" - Eliminar contenedor tag y espacio raro */
.internacion-edit-view .tag-with-select,
.internacion-edit-view .tag-with-select.el-tag,
.internacion-edit-view .tag-with-select.el-tag--primary,
.internacion-edit-view .tag-with-select.el-tag--dark {
    background-color: transparent !important;
    border: none !important;
    padding: 0 !important;
    margin: 0 !important;
    display: inline-block !important;
}

.internacion-edit-view .tag-with-select .el-select {
    max-width: 140px !important;
}

.internacion-edit-view .tag-with-select .el-input,
.internacion-edit-view .tag-with-select .el-input--suffix {
    width: 100% !important;
}

.internacion-edit-view .tag-with-select .el-input__inner {
    background-color: #f5f7fa !important;
    border: 1px solid #dcdfe6 !important;
    border-radius: 8px !important;
    padding: 10px 32px 10px 14px !important;
    font-size: 14px !important;
    color: #374151 !important;
    height: 42px !important;
    line-height: 42px !important;
    text-align: left !important;
}

/* 2. ELIMINAR TODOS LOS BORDES INFERIORES EXTRAS */
.internacion-edit-view .el-input__inner,
.internacion-edit-view .el-textarea__inner,
.internacion-edit-view .el-select .el-input__inner,
.internacion-edit-view .el-date-editor .el-input__inner {
    border: 1px solid #dcdfe6 !important;
    border-bottom: 1px solid #dcdfe6 !important;
    box-shadow: none !important;
    background-color: #f5f7fa !important;
}

/* Quitar bordes punteados inline */
.internacion-edit-view .info-item .value [style*="border-bottom"],
.internacion-edit-view .el-input__inner[style*="border-bottom-style: dotted"],
.internacion-edit-view .el-textarea__inner[style*="border-bottom-style: dotted"] {
    border-bottom: 1px solid #dcdfe6 !important;
    border-bottom-style: solid !important;
}

/* 3. DATE PICKER EGRESO - Arreglar icono superpuesto */
.internacion-edit-view .el-date-editor.el-input--prefix .el-input__inner {
    padding-left: 42px !important;
    padding-right: 14px !important;
}

.internacion-edit-view .el-date-editor .el-input__prefix {
    left: 12px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    z-index: 2 !important;
}

.internacion-edit-view .el-date-editor .el-input__prefix .el-input__icon {
    color: #6c757d !important;
    font-size: 16px !important;
    width: 18px !important;
    height: 18px !important;
}

/* 4. LIMPIEZA GENERAL - Quitar cualquier estilo raro */
.internacion-edit-view .el-input,
.internacion-edit-view .el-textarea,
.internacion-edit-view .el-select {
    border: none !important;
    outline: none !important;
}

.internacion-edit-view .el-input__inner:focus,
.internacion-edit-view .el-textarea__inner:focus,
.internacion-edit-view .el-select .el-input__inner:focus {
    border-color: #128CAA !important;
    box-shadow: 0 0 0 2px rgba(18, 140, 170, 0.12) !important;
}

/* 5. SELECTS NORMALES (Habitación, Área, Médico) */
.internacion-edit-view .el-select .el-input__inner {
    padding-left: 14px !important;
    padding-right: 32px !important;
    cursor: pointer !important;
}

.internacion-edit-view .el-select .el-input__suffix {
    right: 12px !important;
}

.internacion-edit-view .el-select-dropdown__item {
    padding: 8px 16px !important;
}

.internacion-edit-view .el-select-dropdown__item.selected {
    color: #128CAA !important;
    font-weight: 600 !important;
    background-color: #e8f6f8 !important;
}
        </style>
        ';
    }
}


/*************************************************************************************************************/



