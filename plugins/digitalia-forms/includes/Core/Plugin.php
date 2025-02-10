<?php
namespace DigitaliaForms\Core;

/**
 * Clase principal del plugin
 */
class Plugin {
    /**
     * @var Plugin Instancia única de la clase
     */
    private static $instance = null;

    /**
     * Constructor privado para el patrón Singleton
     */
    private function __construct() {
        // Inicializar clases principales
        new \DigitaliaForms\PostTypes\FormEntry();
        new \DigitaliaForms\PostTypes\Form();
        new \DigitaliaForms\Forms\Handler();

        // Registrar hooks
        $this->register_hooks();
    }

    /**
     * Obtener instancia única
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Inicializar hooks de WordPress
     */
    private function init_hooks() {
        // Inicializar Custom Post Types
        new \DigitaliaForms\PostTypes\FormEntry();

        // Admin
        if (is_admin()) {
            add_action('admin_menu', [$this, 'add_admin_menu']);
            add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
            add_action('admin_init', [$this, 'register_settings']);
            add_action('admin_notices', [$this, 'show_migration_notice']);
            add_action('admin_post_digitalia_forms_migrate', [$this, 'handle_migration']);
        }

        add_action('rest_api_init', [$this, 'register_rest_routes']);

        // Frontend
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
        add_action('init', [$this, 'register_shortcodes']);

        // AJAX actions
        add_action('wp_ajax_digitalia_forms_submit', [$this, 'handle_form_submit']);
        add_action('wp_ajax_nopriv_digitalia_forms_submit', [$this, 'handle_form_submit']);

        // Inicializar SMTP si está habilitado
        if (get_option('digitalia_forms_smtp_settings')['enabled'] ?? false) {
            new \DigitaliaForms\Email\SMTP();
        }

        // Agregar filtros para las capacidades
        add_filter('map_meta_cap', [$this, 'map_meta_cap'], 10, 4);
    }

    /**
     * Mapear capacidades meta para entradas de formulario
     */
    public function map_meta_cap($caps, $cap, $user_id, $args) {
        $primitive_caps = [
            'edit_digitalia_form_entry',
            'read_digitalia_form_entry',
            'delete_digitalia_form_entry'
        ];

        if (!in_array($cap, $primitive_caps)) {
            return $caps;
        }

        $post = get_post($args[0]);
        if (!$post || $post->post_type !== 'digitalia_form_entry') {
            return $caps;
        }

        $post_type = get_post_type_object($post->post_type);
        $caps = [];

        switch ($cap) {
            case 'edit_digitalia_form_entry':
                if ($user_id == $post->post_author) {
                    $caps[] = $post_type->cap->edit_posts;
                } else {
                    $caps[] = $post_type->cap->edit_others_posts;
                }
                break;
            case 'read_digitalia_form_entry':
                if ('private' != $post->post_status) {
                    $caps[] = 'read';
                } elseif ($user_id == $post->post_author) {
                    $caps[] = 'read';
                } else {
                    $caps[] = $post_type->cap->read_private_posts;
                }
                break;
            case 'delete_digitalia_form_entry':
                if ($user_id == $post->post_author) {
                    $caps[] = $post_type->cap->delete_posts;
                } else {
                    $caps[] = $post_type->cap->delete_others_posts;
                }
                break;
            default:
                $caps[] = $post_type->cap->edit_posts;
                break;
        }

        return $caps;
    }

    /**
     * Mostrar aviso de migración si es necesario
     */
    public function show_migration_notice() {
        global $wpdb;
        $entries_table = $wpdb->prefix . 'digitalia_forms_entries';
        
        // Verificar si existen las tablas antiguas y no se ha completado la migración
        if ($wpdb->get_var("SHOW TABLES LIKE '$entries_table'") === $entries_table &&
            !get_option('digitalia_forms_migration_complete')) {
            ?>
            <div class="notice notice-warning is-dismissible">
                <p>
                    <?php _e('Digitalia Forms necesita migrar las entradas existentes al nuevo sistema.', 'digitalia-forms'); ?>
                    <a href="<?php echo wp_nonce_url(admin_url('admin-post.php?action=digitalia_forms_migrate'), 'digitalia_forms_migrate'); ?>" class="button button-primary">
                        <?php _e('Iniciar Migración', 'digitalia-forms'); ?>
                    </a>
                </p>
            </div>
            <?php
        }
    }

    /**
     * Manejar migración de datos
     */
    public function handle_migration() {
        check_admin_referer('digitalia_forms_migrate');

        if (!current_user_can('manage_options')) {
            wp_die(__('No tienes permiso para realizar esta acción.', 'digitalia-forms'));
        }

        $migration = new Migration();
        $result = $migration->migrate_entries();

        if ($result) {
            $migration->cleanup_old_tables();
            update_option('digitalia_forms_migration_complete', true);
            wp_redirect(add_query_arg([
                'page' => 'digitalia-forms',
                'message' => 'migration_complete'
            ], admin_url('admin.php')));
        } else {
            wp_redirect(add_query_arg([
                'page' => 'digitalia-forms',
                'message' => 'migration_error'
            ], admin_url('admin.php')));
        }
        exit;
    }

    /**
     * Registrar rutas de la API REST
     */
    public function register_rest_routes() {
        $controller = new \DigitaliaForms\API\REST_Controller();
        $controller->register_routes();
    }

    /**
     * Registrar configuraciones
     */
    public function register_settings() {
        register_setting(
            'digitalia_forms_settings',
            'digitalia_forms_smtp_settings',
            [
                'type' => 'array',
                'sanitize_callback' => [$this, 'sanitize_smtp_settings']
            ]
        );
    }

    /**
     * Sanitizar configuraciones SMTP
     */
    public function sanitize_smtp_settings($settings) {
        return [
            'enabled' => !empty($settings['enabled']),
            'host' => sanitize_text_field($settings['host'] ?? ''),
            'port' => absint($settings['port'] ?? 587),
            'username' => sanitize_text_field($settings['username'] ?? ''),
            'password' => $settings['password'] ?? '',
            'encryption' => sanitize_text_field($settings['encryption'] ?? 'tls'),
            'from_email' => sanitize_email($settings['from_email'] ?? ''),
            'from_name' => sanitize_text_field($settings['from_name'] ?? '')
        ];
    }

    /**
     * Añadir menú de administración
     */
    public function add_admin_menu() {
        add_menu_page(
            __('Digitalia Forms', 'digitalia-forms'),
            __('Digitalia Forms', 'digitalia-forms'),
            'edit_digitalia_forms',
            'digitalia-forms',
            [$this, 'render_admin_page'],
            'dashicons-feedback',
            25
        );

        add_submenu_page(
            'digitalia-forms',
            __('Todos los Formularios', 'digitalia-forms'),
            __('Todos los Formularios', 'digitalia-forms'),
            'edit_digitalia_forms',
            'edit.php?post_type=digitalia_form'
        );

        add_submenu_page(
            'digitalia-forms',
            __('Añadir Nuevo', 'digitalia-forms'),
            __('Añadir Nuevo', 'digitalia-forms'),
            'publish_digitalia_forms',
            'post-new.php?post_type=digitalia_form'
        );

        add_submenu_page(
            'digitalia-forms',
            __('Entradas', 'digitalia-forms'),
            __('Entradas', 'digitalia-forms'),
            'edit_digitalia_form_entries',
            'edit.php?post_type=digitalia_form_entry'
        );

        // Remover el submenú duplicado que WordPress añade automáticamente
        remove_submenu_page('digitalia-forms', 'digitalia-forms');
    }

    /**
     * Renderizar página principal de administración
     */
    public function render_admin_page() {
        include DIGITALIA_FORMS_PATH . 'admin/views/dashboard.php';
    }

    /**
     * Encolar assets de admin
     */
    public function enqueue_admin_assets($hook) {
        // Solo cargar en páginas del plugin
        if (!in_array($hook, ['post.php', 'post-new.php']) && 
            !in_array(get_post_type(), ['digitalia_form', 'digitalia_form_entry'])) {
            return;
        }

        wp_enqueue_style(
            'digitalia-forms-admin',
            DIGITALIA_FORMS_URL . 'admin/css/admin.css',
            [],
            DIGITALIA_FORMS_VERSION
        );

        wp_enqueue_script(
            'digitalia-forms-admin',
            DIGITALIA_FORMS_URL . 'admin/js/admin.js',
            ['jquery', 'jquery-ui-sortable'],
            DIGITALIA_FORMS_VERSION,
            true
        );

        wp_localize_script('digitalia-forms-admin', 'DigitaliaFormsAdmin', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('digitalia_forms_admin'),
            'i18n' => [
                'confirm_delete' => __('¿Estás seguro de que quieres eliminar este campo?', 'digitalia-forms'),
                'error_saving' => __('Error al guardar el formulario.', 'digitalia-forms'),
                'success_saving' => __('Formulario guardado correctamente.', 'digitalia-forms')
            ]
        ]);
    }

    /**
     * Encolar assets de frontend
     */
    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'digitalia-forms',
            DIGITALIA_FORMS_URL . 'public/css/forms.css',
            [],
            DIGITALIA_FORMS_VERSION
        );

        wp_enqueue_script(
            'digitalia-forms',
            DIGITALIA_FORMS_URL . 'public/js/forms.js',
            ['jquery'],
            DIGITALIA_FORMS_VERSION,
            true
        );

        wp_localize_script('digitalia-forms', 'digitaliaForms', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('digitalia_forms_submit'),
            'i18n' => [
                'errorSubmit' => __('Error al enviar el formulario.', 'digitalia-forms'),
                'requiredField' => __('Este campo es requerido.', 'digitalia-forms'),
                'invalidEmail' => __('Email no válido.', 'digitalia-forms'),
                'invalidPhone' => __('Teléfono no válido.', 'digitalia-forms'),
                'successMessage' => __('Formulario enviado correctamente.', 'digitalia-forms')
            ]
        ]);
    }

    /**
     * Registrar shortcodes
     */
    public function register_shortcodes() {
        add_shortcode('digitalia_form', [$this, 'render_form_shortcode']);
    }

    /**
     * Renderizar shortcode de formulario
     *
     * @param array $atts Atributos del shortcode
     * @return string HTML del formulario
     */
    public function render_form_shortcode($atts) {
        $atts = shortcode_atts([
            'id' => 0
        ], $atts);

        if (empty($atts['id'])) {
            return __('Error: ID de formulario no proporcionado', 'digitalia-forms');
        }

        // Verificar que el formulario existe y está publicado
        $form = get_post($atts['id']);
        if (!$form || $form->post_type !== 'digitalia_form' || $form->post_status !== 'publish') {
            return __('Error: Formulario no disponible', 'digitalia-forms');
        }

        // Obtener campos y configuración
        $fields = get_post_meta($form->ID, '_form_fields', true) ?: [];
        $settings = get_post_meta($form->ID, '_form_settings', true) ?: [];

        error_log('Form fields from meta: ' . print_r($fields, true));

        if (empty($fields)) {
            return __('Error: El formulario no tiene campos configurados', 'digitalia-forms');
        }

        // Renderizar formulario
        ob_start();
        ?>
        <div class="digitalia-forms-container">
            <form class="digitalia-forms-form" method="post" enctype="multipart/form-data" data-form-id="<?php echo esc_attr($form->ID); ?>">
                <?php 
                foreach ($fields as $field): 
                    if (empty($field['key'])) {
                        error_log('Skipping field without key: ' . print_r($field, true));
                        continue;
                    }
                    $field_key = sanitize_key($field['key']);
                ?>
                    <div class="digitalia-forms-field" data-field-id="<?php echo esc_attr($field_key); ?>">
                        <label for="field_<?php echo esc_attr($field_key); ?>">
                            <?php echo esc_html($field['label']); ?>
                            <?php if (!empty($field['required'])): ?>
                                <span class="required">*</span>
                            <?php endif; ?>
                        </label>

                        <?php
                        switch ($field['type']):
                            case 'textarea':
                                ?>
                                <textarea id="field_<?php echo esc_attr($field_key); ?>"
                                          name="field_<?php echo esc_attr($field_key); ?>"
                                          <?php echo !empty($field['required']) ? 'required' : ''; ?>></textarea>
                                <?php
                                break;

                            case 'select':
                                $options = !empty($field['options']) ? array_map('trim', explode("\n", $field['options'])) : [];
                                ?>
                                <select id="field_<?php echo esc_attr($field_key); ?>"
                                        name="field_<?php echo esc_attr($field_key); ?>"
                                        <?php echo !empty($field['required']) ? 'required' : ''; ?>>
                                    <option value=""><?php _e('Seleccionar...', 'digitalia-forms'); ?></option>
                                    <?php foreach ($options as $option): ?>
                                        <option value="<?php echo esc_attr($option); ?>">
                                            <?php echo esc_html($option); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php
                                break;

                            case 'radio':
                                $options = !empty($field['options']) ? array_map('trim', explode("\n", $field['options'])) : [];
                                foreach ($options as $option):
                                    ?>
                                    <label class="radio-label">
                                        <input type="radio"
                                               name="field_<?php echo esc_attr($field_key); ?>"
                                               value="<?php echo esc_attr($option); ?>"
                                               <?php echo !empty($field['required']) ? 'required' : ''; ?>>
                                        <?php echo esc_html($option); ?>
                                    </label>
                                    <?php
                                endforeach;
                                break;

                            case 'checkbox':
                                ?>
                                <label class="checkbox-label">
                                    <input type="checkbox"
                                           id="field_<?php echo esc_attr($field_key); ?>"
                                           name="field_<?php echo esc_attr($field_key); ?>"
                                           value="1"
                                           <?php echo !empty($field['required']) ? 'required' : ''; ?>>
                                    <?php echo !empty($field['description']) ? esc_html($field['description']) : ''; ?>
                                </label>
                                <?php
                                break;

                            case 'file':
                                ?>
                                <input type="file"
                                       id="field_<?php echo esc_attr($field_key); ?>"
                                       name="field_<?php echo esc_attr($field_key); ?>"
                                       <?php echo !empty($field['required']) ? 'required' : ''; ?>
                                       <?php if (!empty($field['allowed_types'])): ?>
                                           accept="<?php echo esc_attr($field['allowed_types']); ?>"
                                       <?php endif; ?>>
                                <?php if (!empty($field['allowed_types'])): ?>
                                    <span class="description">
                                        <?php printf(__('Tipos permitidos: %s', 'digitalia-forms'), esc_html($field['allowed_types'])); ?>
                                    </span>
                                <?php endif; ?>
                                <?php
                                break;

                            default:
                                ?>
                                <input type="<?php echo esc_attr($field['type']); ?>"
                                       id="field_<?php echo esc_attr($field_key); ?>"
                                       name="field_<?php echo esc_attr($field_key); ?>"
                                       <?php echo !empty($field['required']) ? 'required' : ''; ?>>
                                <?php
                                break;
                        endswitch;
                        ?>
                    </div>
                <?php endforeach; ?>

                <div class="digitalia-forms-submit">
                    <button type="submit" class="button">
                        <?php echo !empty($settings['submit_text']) ? esc_html($settings['submit_text']) : __('Enviar', 'digitalia-forms'); ?>
                    </button>
                </div>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Manejar guardado de formulario
     */
    public function handle_form_save() {
        if (!current_user_can('edit_digitalia_forms')) {
            wp_die(__('No tienes permiso para realizar esta acción.', 'digitalia-forms'));
        }

        $form_id = isset($_POST['form_id']) ? intval($_POST['form_id']) : 0;

        // Preparar datos del formulario
        $form_data = [
            'post_title' => sanitize_text_field($_POST['form_title']),
            'post_excerpt' => wp_kses_post($_POST['form_description'] ?? ''),
            'post_type' => 'digitalia_form',
            'post_status' => sanitize_text_field($_POST['form_status'] ?? 'draft')
        ];

        // Guardar o actualizar formulario
        if ($form_id > 0) {
            $form_data['ID'] = $form_id;
            $form_id = wp_update_post($form_data);
        } else {
            $form_id = wp_insert_post($form_data);
        }

        if (is_wp_error($form_id)) {
            wp_redirect(add_query_arg(
                ['page' => 'digitalia-forms', 'message' => 'error'],
                admin_url('admin.php')
            ));
            exit;
        }

        // Guardar configuración del formulario
        $settings = [
            'submit_text' => sanitize_text_field($_POST['submit_text'] ?? __('Enviar', 'digitalia-forms')),
            'success_message' => wp_kses_post($_POST['success_message'] ?? __('¡Gracias! Tu formulario ha sido enviado correctamente.', 'digitalia-forms')),
            'email_notification' => isset($_POST['email_notification']),
            'notification_email' => sanitize_email($_POST['notification_email'] ?? '')
        ];
        update_post_meta($form_id, '_form_settings', $settings);

        // Guardar campos
        $fields_result = $this->save_form_fields($form_id);

        if ($fields_result === false) {
            wp_redirect(add_query_arg(
                ['page' => 'digitalia-forms', 'message' => 'error'],
                admin_url('admin.php')
            ));
            exit;
        }

        // Redireccionar
        wp_redirect(add_query_arg(
            [
                'page' => 'digitalia-forms',
                'action' => 'edit',
                'form' => $form_id,
                'message' => 'saved'
            ],
            admin_url('admin.php')
        ));
        exit;
    }

    /**
     * Guardar campos del formulario
     */
    private function save_form_fields($form_id) {
        if (empty($_POST['field_label']) || !is_array($_POST['field_label'])) {
            return true;
        }

        $fields = [];
        $existing_fields = get_post_meta($form_id, '_form_fields', true) ?: [];
        $existing_keys = wp_list_pluck($existing_fields, 'key', 'id');

        foreach ($_POST['field_label'] as $index => $label) {
            $field_id = isset($_POST['field_id'][$index]) ? $_POST['field_id'][$index] : '';
            
            // If this is an existing field, use its stored key
            if (!empty($field_id) && isset($existing_keys[$field_id])) {
                $field_key = $existing_keys[$field_id];
            } else {
                // For new fields, sanitize and use the provided key or generate one
                $field_key = isset($_POST['field_key'][$index]) ? sanitize_key($_POST['field_key'][$index]) : 'field_' . uniqid();
            }
            
            $field = [
                'id' => $field_id ?: 'field_' . uniqid(),
                'key' => $field_key,
                'label' => sanitize_text_field($label),
                'type' => sanitize_text_field($_POST['field_type'][$index]),
                'required' => isset($_POST['field_required'][$index]) ? true : false,
                'description' => isset($_POST['field_description'][$index]) ? wp_kses_post($_POST['field_description'][$index]) : '',
                'options' => isset($_POST['field_options'][$index]) ? sanitize_textarea_field($_POST['field_options'][$index]) : ''
            ];
            
            $fields[] = $field;
        }

        error_log('Saving form fields: ' . print_r($fields, true));
        return update_post_meta($form_id, '_form_fields', $fields);
    }

    /**
     * Manejar envío de formulario
     */
    public function handle_form_submit() {
        check_ajax_referer('digitalia_forms_submit', 'nonce');
        
        $form_id = isset($_POST['form_id']) ? intval($_POST['form_id']) : 0;
        if (!$form_id) {
            wp_send_json_error(['message' => __('ID de formulario no proporcionado.', 'digitalia-forms')]);
        }

        // Obtener campos del formulario
        $fields = get_post_meta($form_id, '_form_fields', true);
        error_log('Form fields from meta: ' . print_r($fields, true));
        
        if (empty($fields)) {
            wp_send_json_error(['message' => __('El formulario no tiene campos.', 'digitalia-forms')]);
        }

        // Validar y recopilar datos
        $field_values = [];
        $errors = [];
        
        error_log('Raw POST data: ' . print_r($_POST, true));
        error_log('Form submission - Fields from meta: ' . print_r($fields, true));

        foreach ($fields as $field) {
            if (empty($field['key'])) {
                error_log('Skipping field without key: ' . print_r($field, true));
                continue;
            }
            
            $field_key = sanitize_key($field['key']);
            $field_value = isset($_POST['field_' . $field_key]) ? $_POST['field_' . $field_key] : '';

            error_log("Processing field - Key: {$field_key}, Value: " . print_r($field_value, true));

            // Validar campo requerido
            if (!empty($field['required']) && empty($field_value)) {
                $errors[] = sprintf(
                    __('El campo "%s" es requerido.', 'digitalia-forms'),
                    $field['label']
                );
                continue;
            }

            // Validar tipo de campo
            switch ($field['type']) {
                case 'email':
                    if (!empty($field_value) && !is_email($field_value)) {
                        $errors[] = sprintf(
                            __('El campo "%s" debe ser un email válido.', 'digitalia-forms'),
                            $field['label']
                        );
                    }
                    break;
            }

            $field_values[$field_key] = $field_value;
        }

        if (!empty($errors)) {
            error_log('Form validation errors: ' . print_r($errors, true));
            wp_send_json_error([
                'message' => __('Por favor, corrige los errores en el formulario:', 'digitalia-forms'),
                'errors' => $errors
            ]);
        }

        // Crear entrada de formulario
        $entry_data = [
            'post_title' => sprintf(
                __('Entrada de Formulario #%s', 'digitalia-forms'),
                uniqid()
            ),
            'post_type' => 'digitalia_form_entry',
            'post_status' => 'publish'
        ];

        $entry_id = wp_insert_post($entry_data);

        if (is_wp_error($entry_id)) {
            error_log('Error creating form entry: ' . $entry_id->get_error_message());
            wp_send_json_error([
                'message' => __('Error al guardar la entrada del formulario.', 'digitalia-forms')
            ]);
        }

        error_log('Form submission - Created entry ID: ' . $entry_id);
        error_log('Form submission - Field values to save: ' . print_r($field_values, true));

        // Guardar metadatos
        update_post_meta($entry_id, '_form_id', $form_id);
        
        // Guardar datos del formulario
        foreach ($field_values as $field_key => $value) {
            error_log("Saving field - Key: {$field_key}, Value: " . print_r($value, true));
            update_post_meta($entry_id, '_field_' . $field_key, $value);
        }
        
        // Guardar todos los datos en un solo meta para facilitar la recuperación
        update_post_meta($entry_id, '_form_data', $field_values);
        
        // Guardar metadatos adicionales
        update_post_meta($entry_id, '_submission_date', current_time('mysql'));
        update_post_meta($entry_id, '_user_ip', $_SERVER['REMOTE_ADDR']);
        update_post_meta($entry_id, '_user_agent', $_SERVER['HTTP_USER_AGENT']);

        // Obtener configuración del formulario
        $settings = get_post_meta($form_id, '_form_settings', true) ?: [];
        
        // Enviar notificación por email si está configurado
        if (!empty($settings['email_notification']) && !empty($settings['notification_email'])) {
            $this->send_notification_email($form_id, $entry_id, $field_values, $settings);
        }

        wp_send_json_success([
            'message' => !empty($settings['success_message']) 
                ? $settings['success_message'] 
                : __('¡Gracias! Tu formulario ha sido enviado correctamente.', 'digitalia-forms'),
            'entry_id' => $entry_id
        ]);
    }

    /**
     * Enviar email de notificación
     */
    private function send_notification_email($form_id, $entry_id, $field_values, $settings) {
        $to = $settings['notification_email'];
        $subject = sprintf(
            __('Nueva entrada de formulario #%d', 'digitalia-forms'),
            $entry_id
        );

        $message = "<h2>" . __('Detalles de la entrada:', 'digitalia-forms') . "</h2>\n\n";
        foreach ($field_values as $field => $value) {
            $message .= "<strong>" . esc_html($field) . ":</strong> " . esc_html($value) . "<br>\n";
        }

        $headers = ['Content-Type: text/html; charset=UTF-8'];
        
        wp_mail($to, $subject, $message, $headers);
    }

    /**
     * Log debug message
     */
    private function debug_log($message) {
        $log_file = WP_CONTENT_DIR . '/digitalia-forms-debug.log';
        $timestamp = current_time('Y-m-d H:i:s');
        
        if (is_array($message) || is_object($message)) {
            $message = print_r($message, true);
        }
        
        error_log("[{$timestamp}] {$message}\n", 3, $log_file);
    }

    /**
     * Registrar hooks
     */
    private function register_hooks() {
        // Hooks de activación y desactivación
        register_activation_hook(DIGITALIA_FORMS_FILE, [$this, 'activate']);
        register_deactivation_hook(DIGITALIA_FORMS_FILE, [$this, 'deactivate']);

        // Hooks de admin
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);

        // Hooks de frontend
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_assets']);
        add_shortcode('digitalia_form', [$this, 'render_form_shortcode']);
    }

    /**
     * Activar plugin
     */
    public function activate() {
        // Crear tablas si no existen
        $this->create_tables();

        // Migrar formularios existentes a CPT
        $this->migrate_forms_to_cpt();

        // Actualizar versión
        update_option('digitalia_forms_version', DIGITALIA_FORMS_VERSION);

        // Limpiar rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Migrar formularios existentes a CPT
     */
    private function migrate_forms_to_cpt() {
        global $wpdb;

        // Obtener formularios existentes
        $forms = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}digitalia_forms");

        foreach ($forms as $form) {
            // Crear post
            $post_data = [
                'post_title' => $form->title,
                'post_content' => $form->description ?? '',
                'post_status' => $form->status === 'published' ? 'publish' : 'draft',
                'post_type' => 'digitalia_form'
            ];

            $post_id = wp_insert_post($post_data);

            if (!is_wp_error($post_id)) {
                // Obtener campos
                $fields = $wpdb->get_results($wpdb->prepare(
                    "SELECT * FROM {$wpdb->prefix}digitalia_forms_fields WHERE form_id = %d ORDER BY `order` ASC",
                    $form->id
                ));

                // Convertir campos al nuevo formato
                $new_fields = [];
                foreach ($fields as $field) {
                    $new_fields[] = [
                        'name' => sanitize_title($field->label),
                        'label' => $field->label,
                        'type' => $field->type,
                        'required' => (bool)$field->required,
                        'options' => $field->options,
                        'order' => $field->order
                    ];
                }

                // Guardar campos como meta
                update_post_meta($post_id, '_form_fields', $new_fields);

                // Guardar configuración como meta
                $settings = [
                    'success_message' => $form->success_message ?? __('¡Gracias! Tu formulario ha sido enviado correctamente.', 'digitalia-forms'),
                    'email_notification' => false,
                    'notification_email' => get_option('admin_email'),
                    'confirmation_email' => false,
                    'email_template' => ''
                ];
                update_post_meta($post_id, '_form_settings', $settings);

                // Actualizar entradas para referenciar el nuevo ID
                $wpdb->update(
                    $wpdb->prefix . 'digitalia_forms_entries',
                    ['form_id' => $post_id],
                    ['form_id' => $form->id]
                );
            }
        }
    }

    /**
     * Desactivar plugin
     */
    public function deactivate() {
        // Limpiar rewrite rules
        flush_rewrite_rules();
    }

    private function render_field_row($field = [], $index = 0) {
        $field = wp_parse_args($field, [
            'id' => '',
            'key' => '',
            'label' => '',
            'type' => 'text',
            'required' => false,
            'description' => '',
            'options' => ''
        ]);
        
        // Generate a key if this is a new field
        if (empty($field['key'])) {
            $field['key'] = 'field_' . uniqid();
        }
        ?>
        <div class="digitalia-forms-field" data-index="<?php echo $index; ?>">
            <div class="digitalia-forms-field-header">
                <span class="digitalia-forms-field-title"><?php echo esc_html($field['label'] ?: __('Nuevo Campo', 'digitalia-forms')); ?></span>
                <button type="button" class="button-link digitalia-forms-remove-field">&times;</button>
            </div>
            <div class="digitalia-forms-field-content">
                <p>
                    <label><?php _e('Etiqueta:', 'digitalia-forms'); ?></label>
                    <input type="text" name="field_label[]" value="<?php echo esc_attr($field['label']); ?>" class="widefat field-label" required>
                </p>
                
                <p>
                    <label><?php _e('Clave del campo:', 'digitalia-forms'); ?></label>
                    <input type="text" 
                           name="field_key[]" 
                           value="<?php echo esc_attr($field['key']); ?>" 
                           class="widefat field-key" 
                           <?php echo !empty($field['id']) ? 'readonly' : ''; ?> 
                           pattern="[a-z0-9_-]+" 
                           title="<?php esc_attr_e('Solo letras minúsculas, números, guiones y guiones bajos', 'digitalia-forms'); ?>"
                           required>
                    <?php if (!empty($field['id'])): ?>
                        <span class="description"><?php _e('La clave del campo no se puede modificar una vez guardado el formulario.', 'digitalia-forms'); ?></span>
                    <?php endif; ?>
                </p>

                <p>
                    <label><?php _e('Tipo:', 'digitalia-forms'); ?></label>
                    <select name="field_type[]" class="field-type">
                        <option value="text" <?php selected($field['type'], 'text'); ?>><?php _e('Texto', 'digitalia-forms'); ?></option>
                        <option value="textarea" <?php selected($field['type'], 'textarea'); ?>><?php _e('Área de texto', 'digitalia-forms'); ?></option>
                        <option value="email" <?php selected($field['type'], 'email'); ?>><?php _e('Email', 'digitalia-forms'); ?></option>
                        <option value="select" <?php selected($field['type'], 'select'); ?>><?php _e('Lista desplegable', 'digitalia-forms'); ?></option>
                        <option value="radio" <?php selected($field['type'], 'radio'); ?>><?php _e('Radio', 'digitalia-forms'); ?></option>
                        <option value="checkbox" <?php selected($field['type'], 'checkbox'); ?>><?php _e('Casilla de verificación', 'digitalia-forms'); ?></option>
                    </select>
                </p>
            </div>
        </div>
        <?php
    }
}
