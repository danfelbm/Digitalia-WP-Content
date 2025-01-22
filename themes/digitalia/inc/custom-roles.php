<?php
/**
 * Custom User Roles for Digitalia
 * 
 * This file handles the creation and management of custom user roles
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

function digitalia_create_custom_roles() {
    // Remove roles if they already exist (to reset capabilities)
    remove_role('en_linea');
    remove_role('total_transmedia');

    // Create "En Linea" role with basic capabilities
    $en_linea = add_role(
        'en_linea',
        'En Linea',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'delete_posts' => true,
            'delete_published_posts' => true,
            'upload_files' => true,
        )
    );

    // Create "Total Transmedia" role with basic capabilities
    $total_transmedia = add_role(
        'total_transmedia',
        'Total Transmedia',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'upload_files' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'delete_posts' => true,
            'moderate_comments' => true,
            'edit_comments' => true,
        )
    );

    // Add specific capabilities for En Linea role
    if ($en_linea) {
        $allowed_types = array(
            'personajes' => 'personaje',
            'actores' => 'actor',
            'episodio' => 'episodio',
            'series' => 'serie'
        );
        
        foreach ($allowed_types as $plural => $singular) {
            // Add capabilities for both singular and plural forms
            $caps = array(
                "edit_{$plural}",
                "edit_others_{$plural}",
                "publish_{$plural}",
                "read_private_{$plural}",
                "delete_{$plural}",
                "delete_private_{$plural}",
                "delete_published_{$plural}",
                "delete_others_{$plural}",
                "edit_private_{$plural}",
                "edit_published_{$plural}",
                // Singular form capabilities
                "edit_{$singular}",
                "read_{$singular}",
                "delete_{$singular}",
                "edit_others_{$singular}",
                "publish_{$singular}",
                "read_private_{$singular}",
                "delete_private_{$singular}",
                "edit_private_{$singular}",
                "edit_published_{$singular}",
                "delete_published_{$singular}"
            );

            foreach ($caps as $cap) {
                $en_linea->add_cap($cap);
            }
        }

        // Add list capabilities
        $en_linea->add_cap('edit_others_posts');
        $en_linea->add_cap('list_users');
    }

    // Add specific capabilities for Total Transmedia role
    if ($total_transmedia) {
        // Media capabilities
        $total_transmedia->add_cap('upload_files');
        $total_transmedia->add_cap('edit_files');
        $total_transmedia->add_cap('manage_media_library');
        
        // Comments capabilities
        $total_transmedia->add_cap('moderate_comments');
        $total_transmedia->add_cap('edit_comments');
        $total_transmedia->add_cap('manage_comments');
        
        // Posts capabilities
        $caps = array(
            'edit_posts',
            'edit_others_posts',
            'edit_private_posts',
            'edit_published_posts',
            'publish_posts',
            'read_private_posts',
            'delete_posts',
            'delete_private_posts',
            'delete_published_posts',
            'delete_others_posts'
        );
        
        foreach ($caps as $cap) {
            $total_transmedia->add_cap($cap);
        }
        
        // Descarga capabilities
        $descarga_caps = array(
            'edit_descargas',
            'edit_others_descargas',
            'edit_private_descargas',
            'edit_published_descargas',
            'publish_descargas',
            'read_private_descargas',
            'delete_descargas',
            'delete_private_descargas',
            'delete_published_descargas',
            'delete_others_descargas'
        );
        
        foreach ($descarga_caps as $cap) {
            $total_transmedia->add_cap($cap);
        }
    }
}

// Hook into WordPress
add_action('init', 'digitalia_create_custom_roles');

// Remove menu items based on role
function digitalia_remove_menu_items() {
    $user = wp_get_current_user();
    
    if (in_array('en_linea', (array) $user->roles)) {
        // Remove default menus
        remove_menu_page('edit.php'); // Posts
        remove_menu_page('upload.php'); // Media
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('edit-comments.php'); // Comments
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Remove all custom post types first
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if (!in_array($post_type->name, array('personajes', 'actores', 'episodio', 'series'))) {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }

        // Remove parametros page
        remove_menu_page('parametros');
        
        // Reorder menu to put Escritorio first
        global $menu;
        $dashboard_menu = array();
        foreach ($menu as $key => $item) {
            if ($item[2] === 'index.php') {
                $dashboard_menu = $item;
                unset($menu[$key]);
                break;
            }
        }
        if ($dashboard_menu) {
            $dashboard_menu[0] = 'Escritorio'; // Rename Dashboard to Escritorio
            array_unshift($menu, $dashboard_menu);
        }
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        // Remove unnecessary menus
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Remove all custom post types except descargas
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if ($post_type->name !== 'descargas') {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }

        // Remove parametros page
        remove_menu_page('parametros');
        
        // Rename Dashboard to Escritorio
        global $menu;
        foreach ($menu as $key => $item) {
            if ($item[2] === 'index.php') {
                $menu[$key][0] = 'Escritorio';
                break;
            }
        }
    }
}
add_action('admin_menu', 'digitalia_remove_menu_items', 999);

// Modify admin bar for specific roles
function digitalia_modify_admin_bar($wp_admin_bar) {
    if (!current_user_can('administrator')) {
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('customize');
        $wp_admin_bar->remove_node('edit');
        $wp_admin_bar->remove_node('themes');
        $wp_admin_bar->remove_node('view-site');
        
        // Keep profile menu but remove other user-related items
        $wp_admin_bar->remove_node('user-info');
        $wp_admin_bar->remove_node('user-actions');
        $wp_admin_bar->remove_node('users');
        
        // Add back just the profile link
        $user_id = get_current_user_id();
        $profile_url = get_admin_url(null, 'profile.php');
        $wp_admin_bar->add_node(array(
            'id' => 'edit-profile',
            'title' => __('Profile'),
            'href' => $profile_url
        ));
    }
}
add_action('admin_bar_menu', 'digitalia_modify_admin_bar', 999);

// Add necessary filters to map meta capabilities
function digitalia_map_meta_cap($caps, $cap, $user_id, $args) {
    $user = get_userdata($user_id);
    
    if (in_array('en_linea', (array) $user->roles)) {
        // Map capabilities for en_linea role
        $post_types = array('personajes', 'actores', 'episodio', 'series');
        foreach ($post_types as $type) {
            if (strpos($cap, $type) !== false) {
                return array('read');
            }
        }
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        // Map capabilities for total_transmedia role
        if (strpos($cap, 'post') !== false || strpos($cap, 'descarga') !== false) {
            return array('read');
        }
    }
    
    return $caps;
}
add_filter('map_meta_cap', 'digitalia_map_meta_cap', 10, 4);
