<?php
namespace DigitaliaForms\Forms;

use DigitaliaForms\Database\Manager;

class Handler {
    private $db;
    
    public function __construct() {
        $this->db = new Manager();
        
        // Hooks para manejo de formularios
        add_action('wp_ajax_digitalia_forms_submit', [$this, 'handle_form_submit']);
        add_action('wp_ajax_nopriv_digitalia_forms_submit', [$this, 'handle_form_submit']);
    }

    /**
     * Manejar envío de formulario en frontend
     */
    public function handle_form_submit() {
        check_ajax_referer('digitalia_forms_submit', 'nonce');

        $form_id = intval($_POST['form_id']);
        $form = get_post($form_id);

        if (!$form || $form->post_type !== 'digitalia_form' || $form->post_status !== 'publish') {
            wp_send_json_error(__('Formulario no válido.', 'digitalia-forms'));
        }

        // Obtener campos y configuración
        $fields = get_post_meta($form_id, '_form_fields', true) ?: [];
        $settings = get_post_meta($form_id, '_form_settings', true) ?: [];

        // Validar campos
        $errors = [];
        $data = [];

        foreach ($fields as $field) {
            $field_name = 'field_' . $field['name'];
            $value = $_POST[$field_name] ?? null;

            // Validar campo requerido
            if (!empty($field['required']) && empty($value)) {
                $errors[$field_name] = sprintf(
                    __('El campo %s es requerido.', 'digitalia-forms'),
                    $field['label']
                );
                continue;
            }

            // Validar tipo de campo
            switch ($field['type']) {
                case 'email':
                    if (!empty($value) && !is_email($value)) {
                        $errors[$field_name] = __('Email no válido.', 'digitalia-forms');
                    }
                    break;

                case 'tel':
                    if (!empty($value) && !preg_match('/^[0-9+\-\s()]*$/', $value)) {
                        $errors[$field_name] = __('Teléfono no válido.', 'digitalia-forms');
                    }
                    break;

                case 'file':
                    if (!empty($_FILES[$field_name])) {
                        $file_error = $this->validate_file(
                            $_FILES[$field_name],
                            json_decode($field['options'], true)
                        );
                        if ($file_error) {
                            $errors[$field_name] = $file_error;
                        } else {
                            $value = $this->handle_file_upload($_FILES[$field_name]);
                        }
                    }
                    break;
            }

            if (empty($errors[$field_name])) {
                $data[$field['name']] = $value;
            }
        }

        if (!empty($errors)) {
            wp_send_json_error(['errors' => $errors]);
        }

        // Crear entrada como post
        $post_data = [
            'post_type' => 'digitalia_form_entry',
            'post_title' => sprintf(
                __('Entrada de %s #%s', 'digitalia-forms'),
                $form->post_title,
                uniqid()
            ),
            'post_status' => 'publish',
        ];

        $post_id = wp_insert_post($post_data);

        if (is_wp_error($post_id)) {
            wp_send_json_error(__('Error al guardar la entrada.', 'digitalia-forms'));
        }

        // Guardar metadatos
        update_post_meta($post_id, '_form_id', $form_id);
        foreach ($data as $field_name => $value) {
            update_post_meta($post_id, '_field_' . $field_name, $value);
        }

        // Enviar notificaciones por email si están configuradas
        if (!empty($settings['email_notification'])) {
            $this->send_notification_email($form, $data, $settings);
        }

        if (!empty($settings['confirmation_email']) && !empty($data['email'])) {
            $this->send_confirmation_email($form, $data, $settings);
        }

        wp_send_json_success([
            'message' => $settings['success_message'] ?? __('Formulario enviado correctamente.', 'digitalia-forms'),
            'entry_id' => $post_id
        ]);
    }

    /**
     * Validar archivo
     */
    private function validate_file($file, $options) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return __('Error al subir el archivo.', 'digitalia-forms');
        }

        $allowed_types = $options['allowed_types'] ?? ['jpg', 'jpeg', 'png', 'pdf'];
        $max_size = ($options['max_size'] ?? 2) * 1024 * 1024; // Convertir MB a bytes

        // Validar tipo de archivo
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($file_ext, $allowed_types)) {
            return sprintf(
                __('Tipo de archivo no permitido. Tipos permitidos: %s', 'digitalia-forms'),
                implode(', ', $allowed_types)
            );
        }

        // Validar tamaño
        if ($file['size'] > $max_size) {
            return sprintf(
                __('El archivo excede el tamaño máximo permitido de %s MB.', 'digitalia-forms'),
                $options['max_size']
            );
        }

        return null;
    }

    /**
     * Manejar subida de archivo
     */
    private function handle_file_upload($file) {
        $uploads = wp_upload_dir();
        $filename = wp_unique_filename($uploads['path'], $file['name']);
        $filepath = $uploads['path'] . '/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            return $uploads['url'] . '/' . $filename;
        }

        return '';
    }

    /**
     * Enviar email de notificación
     */
    private function send_notification_email($form, $data, $settings) {
        $to = $settings['notification_email'];
        $subject = sprintf(
            __('Nueva entrada en el formulario: %s', 'digitalia-forms'),
            $form->post_title
        );

        $message = $this->prepare_email_content($form, $data, $settings['email_template']);

        $headers = ['Content-Type: text/html; charset=UTF-8'];
        wp_mail($to, $subject, $message, $headers);
    }

    /**
     * Enviar email de confirmación
     */
    private function send_confirmation_email($form, $data, $settings) {
        $to = $data['email'];
        $subject = sprintf(
            __('Confirmación de envío: %s', 'digitalia-forms'),
            $form->post_title
        );

        $message = $this->prepare_email_content($form, $data, $settings['email_template']);

        $headers = ['Content-Type: text/html; charset=UTF-8'];
        wp_mail($to, $subject, $message, $headers);
    }

    /**
     * Preparar contenido del email
     */
    private function prepare_email_content($form, $data, $template) {
        if (empty($template)) {
            $template = $this->get_default_email_template();
        }

        $replacements = [
            '{form_title}' => $form->post_title,
            '{submission_date}' => current_time('mysql')
        ];

        foreach ($data as $field_name => $value) {
            $replacements['{field_' . $field_name . '}'] = $value;
        }

        return strtr($template, $replacements);
    }

    /**
     * Obtener plantilla de email por defecto
     */
    private function get_default_email_template() {
        return '
        <h2>Nuevo envío de formulario</h2>
        <p><strong>Formulario:</strong> {form_title}</p>
        <p><strong>Fecha:</strong> {submission_date}</p>
        <hr>
        <h3>Datos enviados:</h3>
        <table>
            <tbody>
                <!-- Los campos se insertarán aquí -->
            </tbody>
        </table>';
    }
}
