<?php
namespace DigitaliaForms\Database;

/**
 * Gestor de base de datos
 */
class Manager {
    private $wpdb;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * Obtener formulario por ID
     */
    public function get_form($form_id) {
        return $this->wpdb->get_row($this->wpdb->prepare(
            "SELECT * FROM {$this->wpdb->prefix}digitalia_forms WHERE id = %d",
            $form_id
        ));
    }

    /**
     * Obtener todos los formularios
     */
    public function get_forms() {
        return $this->wpdb->get_results(
            "SELECT * FROM {$this->wpdb->prefix}digitalia_forms ORDER BY created_at DESC"
        );
    }

    /**
     * Guardar formulario (crear o actualizar)
     */
    public function save_form($data) {
        if (empty($data['title'])) {
            return new \WP_Error('missing_title', __('El título es requerido.', 'digitalia-forms'));
        }

        $form_data = [
            'title' => sanitize_text_field($data['title']),
            'description' => isset($data['description']) ? wp_kses_post($data['description']) : '',
            'status' => isset($data['status']) ? sanitize_text_field($data['status']) : 'draft'
        ];

        // Iniciar transacción
        $this->wpdb->query('START TRANSACTION');

        try {
            if (empty($data['form_id'])) {
                // Crear nuevo formulario
                $result = $this->wpdb->insert(
                    $this->wpdb->prefix . 'digitalia_forms',
                    $form_data,
                    ['%s', '%s', '%s']
                );

                if ($result === false) {
                    throw new \Exception(__('Error al crear el formulario.', 'digitalia-forms'));
                }

                $form_id = $this->wpdb->insert_id;
            } else {
                // Actualizar formulario existente
                $form_id = intval($data['form_id']);
                $result = $this->wpdb->update(
                    $this->wpdb->prefix . 'digitalia_forms',
                    $form_data,
                    ['id' => $form_id],
                    ['%s', '%s', '%s'],
                    ['%d']
                );

                if ($result === false) {
                    throw new \Exception(__('Error al actualizar el formulario.', 'digitalia-forms'));
                }

                // Eliminar campos existentes si hay nuevos campos
                if (isset($data['field_id'])) {
                    $this->wpdb->delete(
                        $this->wpdb->prefix . 'digitalia_forms_fields',
                        ['form_id' => $form_id],
                        ['%d']
                    );
                }
            }

            // Guardar campos si existen
            if (isset($data['field_id']) && is_array($data['field_id'])) {
                foreach ($data['field_id'] as $index => $field_id) {
                    $field_data = [
                        'form_id' => $form_id,
                        'label' => sanitize_text_field($data['field_label'][$index] ?? ''),
                        'name' => sanitize_key($data['field_name'][$index] ?? ''),
                        'type' => sanitize_key($data['field_type'][$index] ?? 'text'),
                        'required' => isset($data['field_required'][$index]) ? 1 : 0,
                        'options' => isset($data['field_options'][$index]) ? sanitize_text_field($data['field_options'][$index]) : '',
                        'order' => intval($data['field_order'][$index] ?? $index)
                    ];

                    $result = $this->wpdb->insert(
                        $this->wpdb->prefix . 'digitalia_forms_fields',
                        $field_data,
                        ['%d', '%s', '%s', '%s', '%d', '%s', '%d']
                    );

                    if ($result === false) {
                        throw new \Exception(__('Error al guardar los campos del formulario.', 'digitalia-forms'));
                    }
                }
            }

            $this->wpdb->query('COMMIT');
            return $form_id;

        } catch (\Exception $e) {
            $this->wpdb->query('ROLLBACK');
            return new \WP_Error('db_error', $e->getMessage());
        }
    }

    /**
     * Crear formulario
     */
    public function create_form($title, $description = '') {
        $result = $this->wpdb->insert(
            $this->wpdb->prefix . 'digitalia_forms',
            [
                'title' => $title,
                'description' => $description,
                'status' => 'draft'
            ],
            ['%s', '%s', '%s']
        );

        return $result ? $this->wpdb->insert_id : false;
    }

    /**
     * Actualizar formulario
     */
    public function update_form($form_id, $data) {
        return $this->wpdb->update(
            $this->wpdb->prefix . 'digitalia_forms',
            $data,
            ['id' => $form_id],
            ['%s', '%s', '%s'],
            ['%d']
        );
    }

    /**
     * Eliminar formulario
     */
    public function delete_form($form_id) {
        // Primero eliminar campos
        $this->wpdb->delete(
            $this->wpdb->prefix . 'digitalia_forms_fields',
            ['form_id' => $form_id],
            ['%d']
        );

        // Luego eliminar el formulario
        return $this->wpdb->delete(
            $this->wpdb->prefix . 'digitalia_forms',
            ['id' => $form_id],
            ['%d']
        );
    }

    /**
     * Obtener campos de un formulario
     */
    public function get_form_fields($form_id) {
        return $this->wpdb->get_results($this->wpdb->prepare(
            "SELECT * FROM {$this->wpdb->prefix}digitalia_forms_fields 
            WHERE form_id = %d 
            ORDER BY `order` ASC",
            $form_id
        ));
    }

    /**
     * Crear campo de formulario
     */
    public function create_field($form_id, $data) {
        $result = $this->wpdb->insert(
            $this->wpdb->prefix . 'digitalia_forms_fields',
            array_merge(['form_id' => $form_id], $data),
            ['%d', '%s', '%s', '%s', '%d', '%s', '%d']
        );

        return $result ? $this->wpdb->insert_id : false;
    }

    /**
     * Actualizar campo de formulario
     */
    public function update_field($field_id, $data) {
        return $this->wpdb->update(
            $this->wpdb->prefix . 'digitalia_forms_fields',
            $data,
            ['id' => $field_id],
            ['%s', '%s', '%s', '%d', '%s', '%d'],
            ['%d']
        );
    }

    /**
     * Eliminar campo de formulario
     */
    public function delete_field($field_id) {
        return $this->wpdb->delete(
            $this->wpdb->prefix . 'digitalia_forms_fields',
            ['id' => $field_id],
            ['%d']
        );
    }
}
