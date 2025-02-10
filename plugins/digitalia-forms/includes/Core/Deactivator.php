<?php
namespace DigitaliaForms\Core;

/**
 * Desactivador del plugin
 */
class Deactivator {
    /**
     * Desactivar el plugin
     */
    public static function deactivate() {
        self::remove_capabilities();
        self::unregister_post_type();
    }

    /**
     * Eliminar capacidades
     */
    private static function remove_capabilities() {
        $admin = get_role('administrator');
        
        $capabilities = [
            'digitalia_forms_manage_forms',
            'digitalia_forms_manage_settings',
            // Remove entry-specific capabilities since we'll use WordPress post capabilities
            'create_digitalia_form_entries',
            'edit_digitalia_form_entries',
            'delete_digitalia_form_entries',
            'read_digitalia_form_entries'
        ];

        foreach ($capabilities as $cap) {
            $admin->remove_cap($cap);
        }
    }

    /**
     * Desregistrar Custom Post Type
     */
    private static function unregister_post_type() {
        unregister_post_type('digitalia_form_entry');
    }
}
