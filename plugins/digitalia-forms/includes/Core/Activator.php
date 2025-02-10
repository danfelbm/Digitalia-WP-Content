<?php
namespace DigitaliaForms\Core;

/**
 * Activador del plugin
 */
class Activator {
    /**
     * Activar el plugin
     */
    public static function activate() {
        self::create_tables();
        self::create_capabilities();
        self::register_post_type();
        flush_rewrite_rules();
    }

    /**
     * Crear tablas de la base de datos
     */
    private static function create_tables() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        // Tabla de formularios
        $sql_forms = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}digitalia_forms` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `description` text,
            `status` varchar(20) NOT NULL DEFAULT 'draft',
            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) $charset_collate;";
        dbDelta($sql_forms);

        // Tabla de campos
        $sql_fields = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}digitalia_forms_fields` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `form_id` bigint(20) unsigned NOT NULL,
            `label` varchar(255) NOT NULL,
            `name` varchar(255) NOT NULL,
            `type` varchar(50) NOT NULL,
            `required` tinyint(1) NOT NULL DEFAULT '0',
            `options` text,
            `order` int(11) NOT NULL DEFAULT '0',
            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `form_id` (`form_id`)
        ) $charset_collate;";
        dbDelta($sql_fields);

        error_log('Digitalia Forms: Database tables creation completed');
    }

    /**
     * Crear capacidades
     */
    private static function create_capabilities() {
        $admin = get_role('administrator');
        
        // Capacidades de formularios
        $admin->add_cap('digitalia_forms_manage_forms');
        $admin->add_cap('digitalia_forms_manage_settings');

        // Capacidades para entradas de formulario
        $admin->add_cap('edit_digitalia_form_entry');
        $admin->add_cap('edit_digitalia_form_entries');
        $admin->add_cap('edit_others_digitalia_form_entries');
        $admin->add_cap('edit_published_digitalia_form_entries');
        $admin->add_cap('edit_private_digitalia_form_entries');
        $admin->add_cap('publish_digitalia_form_entries');
        $admin->add_cap('delete_digitalia_form_entry');
        $admin->add_cap('delete_digitalia_form_entries');
        $admin->add_cap('delete_others_digitalia_form_entries');
        $admin->add_cap('delete_published_digitalia_form_entries');
        $admin->add_cap('delete_private_digitalia_form_entries');
        $admin->add_cap('read_digitalia_form_entry');
        $admin->add_cap('read_private_digitalia_form_entries');
    }

    /**
     * Registrar Custom Post Type
     */
    private static function register_post_type() {
        register_post_type('digitalia_form_entry', [
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'capability_type' => ['digitalia_form_entry', 'digitalia_form_entries'],
            'map_meta_cap' => true,
            'supports' => ['title'],
            'has_archive' => false,
            'rewrite' => false
        ]);
    }
}
