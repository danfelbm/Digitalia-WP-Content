<?php
/**
 * Custom Dashboard Pages
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include dashboard pages
require_once get_template_directory() . '/inc/admin/dashboard-en-linea.php';
require_once get_template_directory() . '/inc/admin/dashboard-total-transmedia.php';
require_once get_template_directory() . '/inc/admin/dashboard-ready.php';
require_once get_template_directory() . '/inc/admin/dashboard-colaboratorio.php';

/**
 * Add Bootstrap and custom styles to admin head
 */
function digitalia_admin_styles() {
    // Only add these styles on our custom dashboard pages
    $screen = get_current_screen();
    if (strpos($screen->id, 'dashboard') === false) {
        return;
    }
    ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .welcome-panel {
            padding: 2rem;
            margin: 1rem 0;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
            border-radius: 4px;
        }
        
        .welcome-panel h2 {
            margin: 0 0 1rem;
            font-size: 1.8rem;
            font-weight: 600;
        }
        
        .welcome-panel h3 {
            margin: 1.33em 0 1rem;
            font-size: 1.3rem;
        }
        
        .welcome-panel-content {
            min-height: 0;
        }
        
        .welcome-panel-column-container {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .welcome-panel-column {
            flex: 1;
            min-width: 200px;
            padding: 0 15px;
        }
        
        .welcome-panel-column.welcome-panel-last {
            flex: 2;
        }
        
        .welcome-panel-column h3 {
            margin-top: 0;
        }
        
        .welcome-panel-column ul {
            margin: 0;
            padding: 0;
        }
        
        .welcome-panel-column li {
            list-style: none;
            margin-bottom: 10px;
        }
        
        .welcome-panel-column a {
            text-decoration: none;
            color: #2271b1;
        }
        
        .welcome-panel-column a:hover {
            color: #135e96;
        }
        
        .welcome-panel-column .welcome-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 6px;
            vertical-align: middle;
        }
        
        .mt-4 {
            margin-top: 2rem !important;
        }
        
        /* Recent activity styles */
        .activity-list {
            margin: 0;
            padding: 0;
        }
        
        .activity-list li {
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px solid #f0f0f1;
        }
        
        .activity-list li:last-child {
            border-bottom: none;
        }
        
        .activity-list .bi {
            margin-right: 5px;
            color: #2271b1;
        }
    </style>
    <?php
}
add_action('admin_head', 'digitalia_admin_styles');

// Register custom dashboard pages
function digitalia_register_custom_dashboards() {
    $user = wp_get_current_user();
    
    if (in_array('en_linea', (array) $user->roles)) {
        add_menu_page(
            'En Linea Dashboard',
            'Dashboard',
            'read',
            'en-linea-dashboard',
            'digitalia_en_linea_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        add_menu_page(
            'Total Transmedia Dashboard',
            'Dashboard',
            'read',
            'total-transmedia-dashboard',
            'digitalia_total_transmedia_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('ready', (array) $user->roles)) {
        add_menu_page(
            'Ready Dashboard',
            'Dashboard',
            'read',
            'ready-dashboard',
            'digitalia_ready_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        add_menu_page(
            'Colaboratorio Dashboard',
            'Dashboard',
            'read',
            'colaboratorio-dashboard',
            'digitalia_colaboratorio_dashboard_page',
            'dashicons-admin-home',
            2
        );
    }
}
add_action('admin_menu', 'digitalia_register_custom_dashboards');

// Redirect users to their respective dashboards
function digitalia_redirect_to_custom_dashboard() {
    $user = wp_get_current_user();
    $screen = get_current_screen();
    
    // Only redirect on the default dashboard page
    if ($screen->id !== 'dashboard') {
        return;
    }
    
    if (in_array('en_linea', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=en-linea-dashboard'));
        exit;
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=total-transmedia-dashboard'));
        exit;
    } elseif (in_array('ready', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=ready-dashboard'));
        exit;
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=colaboratorio-dashboard'));
        exit;
    }
}
add_action('current_screen', 'digitalia_redirect_to_custom_dashboard');

// Login redirect
function digitalia_login_redirect($redirect_to, $request, $user) {
    if (!is_wp_error($user)) {
        if (in_array('en_linea', (array) $user->roles)) {
            return admin_url('admin.php?page=en-linea-dashboard');
        } elseif (in_array('total_transmedia', (array) $user->roles)) {
            return admin_url('admin.php?page=total-transmedia-dashboard');
        } elseif (in_array('ready', (array) $user->roles)) {
            return admin_url('admin.php?page=ready-dashboard');
        } elseif (in_array('colaboratorio', (array) $user->roles)) {
            return admin_url('admin.php?page=colaboratorio-dashboard');
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'digitalia_login_redirect', 10, 3);
