<?php
namespace DigitaliaForms\PostTypes;

class Form {
    public function __construct() {
        add_action('init', [$this, 'register_post_type']);
        add_action('admin_init', [$this, 'add_capabilities']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post_digitalia_form', [$this, 'save_meta_boxes'], 10, 2);
        add_filter('template_include', [$this, 'load_single_template']);
    }

    /**
     * Registrar post type
     */
    public function register_post_type() {
        $labels = [
            'name' => __('Formularios', 'digitalia-forms'),
            'singular_name' => __('Formulario', 'digitalia-forms'),
            'menu_name' => __('Formularios', 'digitalia-forms'),
            'add_new' => __('Añadir Nuevo', 'digitalia-forms'),
            'add_new_item' => __('Añadir Nuevo Formulario', 'digitalia-forms'),
            'edit_item' => __('Editar Formulario', 'digitalia-forms'),
            'new_item' => __('Nuevo Formulario', 'digitalia-forms'),
            'view_item' => __('Ver Formulario', 'digitalia-forms'),
            'search_items' => __('Buscar Formularios', 'digitalia-forms'),
            'not_found' => __('No se encontraron formularios', 'digitalia-forms'),
            'not_found_in_trash' => __('No se encontraron formularios en la papelera', 'digitalia-forms')
        ];

        $capabilities = [
            'edit_post' => 'edit_digitalia_form',
            'read_post' => 'read_digitalia_form',
            'delete_post' => 'delete_digitalia_form',
            'edit_posts' => 'edit_digitalia_forms',
            'edit_others_posts' => 'edit_others_digitalia_forms',
            'publish_posts' => 'publish_digitalia_forms',
            'read_private_posts' => 'read_private_digitalia_forms',
            'delete_posts' => 'delete_digitalia_forms',
            'delete_private_posts' => 'delete_private_digitalia_forms',
            'delete_published_posts' => 'delete_published_digitalia_forms',
            'delete_others_posts' => 'delete_others_digitalia_forms',
            'edit_private_posts' => 'edit_private_digitalia_forms',
            'edit_published_posts' => 'edit_published_digitalia_forms',
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'rewrite' => ['slug' => 'formulario'],
            'capability_type' => ['digitalia_form', 'digitalia_forms'],
            'capabilities' => $capabilities,
            'map_meta_cap' => true,
            'supports' => ['title', 'editor', 'excerpt'],
            'has_archive' => true
        ];

        register_post_type('digitalia_form', $args);
    }

    /**
     * Añadir capacidades al rol de administrador
     */
    public function add_capabilities() {
        $role = get_role('administrator');
        
        if (!$role) {
            return;
        }

        $capabilities = [
            'edit_digitalia_form',
            'read_digitalia_form',
            'delete_digitalia_form',
            'edit_digitalia_forms',
            'edit_others_digitalia_forms',
            'publish_digitalia_forms',
            'read_private_digitalia_forms',
            'delete_digitalia_forms',
            'delete_private_digitalia_forms',
            'delete_published_digitalia_forms',
            'delete_others_digitalia_forms',
            'edit_private_digitalia_forms',
            'edit_published_digitalia_forms',
        ];

        foreach ($capabilities as $cap) {
            $role->add_cap($cap);
        }
    }

    /**
     * Añadir meta boxes
     */
    public function add_meta_boxes() {
        global $post;
        
        // Solo mostrar el meta box de campos si el formulario ya está creado
        if (!empty($post->ID) && get_post_status($post->ID) !== 'auto-draft') {
            add_meta_box(
                'digitalia_form_fields',
                __('Campos del Formulario', 'digitalia-forms'),
                [$this, 'render_fields_meta_box'],
                'digitalia_form',
                'normal',
                'high'
            );
        }

        add_meta_box(
            'digitalia_form_settings',
            __('Configuración del Formulario', 'digitalia-forms'),
            [$this, 'render_settings_meta_box'],
            'digitalia_form',
            'side',
            'default'
        );

        add_meta_box(
            'digitalia_form_shortcode',
            __('Shortcode', 'digitalia-forms'),
            [$this, 'render_shortcode_meta_box'],
            'digitalia_form',
            'side',
            'default'
        );
    }

    /**
     * Renderizar meta box de campos
     */
    public function render_fields_meta_box($post) {
        wp_nonce_field('save_form_fields', 'digitalia_forms_nonce');
        
        $fields = get_post_meta($post->ID, '_form_fields', true) ?: [];
        include DIGITALIA_FORMS_PATH . 'admin/views/partials/fields-meta-box.php';
    }

    /**
     * Renderizar meta box de configuración
     */
    public function render_settings_meta_box($post) {
        $settings = get_post_meta($post->ID, '_form_settings', true) ?: [];
        include DIGITALIA_FORMS_PATH . 'admin/views/partials/settings-meta-box.php';
    }

    /**
     * Renderizar meta box de shortcode
     */
    public function render_shortcode_meta_box($post) {
        echo '<p>';
        echo __('Usa este shortcode para mostrar el formulario en cualquier página o entrada:', 'digitalia-forms');
        echo '</p>';
        echo '<code>[digitalia_form id="' . $post->ID . '"]</code>';
        echo '<button type="button" class="button copy-shortcode" data-shortcode="[digitalia_form id=&quot;' . $post->ID . '&quot;]">';
        echo __('Copiar', 'digitalia-forms');
        echo '</button>';
    }

    /**
     * Guardar meta boxes
     */
    public function save_meta_boxes($post_id, $post) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['digitalia_forms_nonce']) || 
            !wp_verify_nonce($_POST['digitalia_forms_nonce'], 'save_form_fields')) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Guardar campos
        if (isset($_POST['fields'])) {
            $fields = [];
            foreach ($_POST['fields'] as $field) {
                if (empty($field['label'])) {
                    continue;
                }

                // Generate key if not present
                $key = !empty($field['key']) ? sanitize_key($field['key']) : sanitize_key($field['label']);
                
                // Ensure key is unique within this form
                $key = $this->ensure_unique_key($key, $fields);
                
                $fields[] = [
                    'key' => $key,
                    'label' => sanitize_text_field($field['label']),
                    'type' => sanitize_text_field($field['type']),
                    'required' => !empty($field['required']),
                    'options' => isset($field['options']) ? sanitize_textarea_field($field['options']) : '',
                    'order' => intval($field['order']),
                    'id' => isset($field['id']) ? intval($field['id']) : ''
                ];
            }
            
            error_log('Saving form fields: ' . print_r($fields, true));
            update_post_meta($post_id, '_form_fields', $fields);
        }

        // Guardar configuración
        if (isset($_POST['settings'])) {
            $settings = [
                'success_message' => wp_kses_post($_POST['settings']['success_message']),
                'email_notification' => !empty($_POST['settings']['email_notification']),
                'notification_email' => sanitize_email($_POST['settings']['notification_email']),
                'confirmation_email' => !empty($_POST['settings']['confirmation_email']),
                'confirmation_email_subject' => sanitize_text_field($_POST['settings']['confirmation_email_subject']),
                'confirmation_email_message' => wp_kses_post($_POST['settings']['confirmation_email_message'])
            ];
            update_post_meta($post_id, '_form_settings', $settings);
        }
    }

    /**
     * Ensure key is unique within form fields
     */
    private function ensure_unique_key($key, $fields) {
        $original_key = $key;
        $counter = 1;
        
        while ($this->key_exists($key, $fields)) {
            $key = $original_key . '_' . $counter;
            $counter++;
        }
        
        return $key;
    }
    
    /**
     * Check if key exists in fields array
     */
    private function key_exists($key, $fields) {
        foreach ($fields as $field) {
            if ($field['key'] === $key) {
                return true;
            }
        }
        return false;
    }

    /**
     * Cargar plantilla para vista individual
     */
    public function load_single_template($template) {
        if (is_singular('digitalia_form')) {
            $custom_template = DIGITALIA_FORMS_PATH . 'public/views/single-form.php';
            if (file_exists($custom_template)) {
                return $custom_template;
            }
        }
        return $template;
    }
}
