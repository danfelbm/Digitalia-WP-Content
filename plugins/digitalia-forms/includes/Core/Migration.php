<?php
namespace DigitaliaForms\Core;

/**
 * Migración de datos del plugin
 */
class Migration {
    private $wpdb;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * Migrar entradas existentes a Custom Post Type
     */
    public function migrate_entries() {
        // Verificar si existen las tablas antiguas
        $entries_table = $this->wpdb->prefix . 'digitalia_forms_entries';
        $meta_table = $this->wpdb->prefix . 'digitalia_forms_entry_meta';

        if ($this->wpdb->get_var("SHOW TABLES LIKE '$entries_table'") != $entries_table) {
            return false;
        }

        // Obtener todas las entradas
        $entries = $this->wpdb->get_results("
            SELECT e.*, GROUP_CONCAT(CONCAT(em.field_id, ':', em.value) SEPARATOR '||') as field_values
            FROM $entries_table e
            LEFT JOIN $meta_table em ON e.id = em.entry_id
            GROUP BY e.id
        ");

        if (!$entries) {
            return false;
        }

        // Migrar cada entrada
        foreach ($entries as $entry) {
            // Crear post
            $post_data = [
                'post_type' => 'digitalia_form_entry',
                'post_title' => sprintf(__('Entrada #%d', 'digitalia-forms'), $entry->id),
                'post_status' => 'publish',
                'post_date' => $entry->created_at,
            ];

            $post_id = wp_insert_post($post_data);

            if (!is_wp_error($post_id)) {
                // Guardar form_id
                update_post_meta($post_id, '_form_id', $entry->form_id);
                update_post_meta($post_id, '_original_entry_id', $entry->id);

                // Guardar campos
                if (!empty($entry->field_values)) {
                    $field_values = explode('||', $entry->field_values);
                    foreach ($field_values as $field_value) {
                        list($field_id, $value) = explode(':', $field_value, 2);
                        update_post_meta($post_id, '_field_' . $field_id, $value);
                    }
                }
            }
        }

        return true;
    }

    /**
     * Eliminar tablas antiguas después de la migración
     */
    public function cleanup_old_tables() {
        $tables = [
            $this->wpdb->prefix . 'digitalia_forms_entries',
            $this->wpdb->prefix . 'digitalia_forms_entry_meta',
            $this->wpdb->prefix . 'digitalia_forms_actions'
        ];

        foreach ($tables as $table) {
            $this->wpdb->query("DROP TABLE IF EXISTS $table");
        }
    }
}
