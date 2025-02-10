<?php
namespace DigitaliaForms\PostTypes;

/**
 * Registro y gestión del Custom Post Type para entradas de formulario
 */
class FormEntry {
    /**
     * Constructor
     */
    public function __construct() {
        add_action('init', [$this, 'register_post_type']);
        add_action('admin_init', [$this, 'add_capabilities']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_filter('manage_digitalia_form_entry_posts_columns', [$this, 'set_columns']);
        add_action('manage_digitalia_form_entry_posts_custom_column', [$this, 'render_column'], 10, 2);
        add_filter('manage_edit-digitalia_form_entry_sortable_columns', [$this, 'set_sortable_columns']);
    }

    /**
     * Registrar post type
     */
    public function register_post_type() {
        $labels = [
            'name' => __('Entradas de Formularios', 'digitalia-forms'),
            'singular_name' => __('Entrada de Formulario', 'digitalia-forms'),
            'menu_name' => __('Entradas', 'digitalia-forms'),
            'all_items' => __('Todas las Entradas', 'digitalia-forms'),
            'view_item' => __('Ver Entrada', 'digitalia-forms'),
            'edit_item' => __('Editar Entrada', 'digitalia-forms'),
            'update_item' => __('Actualizar Entrada', 'digitalia-forms'),
            'search_items' => __('Buscar Entradas', 'digitalia-forms'),
            'not_found' => __('No se encontraron entradas', 'digitalia-forms'),
            'not_found_in_trash' => __('No se encontraron entradas en la papelera', 'digitalia-forms')
        ];

        $capabilities = [
            'edit_post' => 'edit_digitalia_form_entry',
            'read_post' => 'read_digitalia_form_entry',
            'delete_post' => 'delete_digitalia_form_entry',
            'edit_posts' => 'edit_digitalia_form_entries',
            'edit_others_posts' => 'edit_others_digitalia_form_entries',
            'publish_posts' => 'publish_digitalia_form_entries',
            'read_private_posts' => 'read_private_digitalia_form_entries',
            'delete_posts' => 'delete_digitalia_form_entries',
            'delete_private_posts' => 'delete_private_digitalia_form_entries',
            'delete_published_posts' => 'delete_published_digitalia_form_entries',
            'delete_others_posts' => 'delete_others_digitalia_form_entries',
            'edit_private_posts' => 'edit_private_digitalia_form_entries',
            'edit_published_posts' => 'edit_published_digitalia_form_entries',
        ];

        $args = [
            'labels' => $labels,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => false,
            'rewrite' => false,
            'capability_type' => ['digitalia_form_entry', 'digitalia_form_entries'],
            'capabilities' => $capabilities,
            'map_meta_cap' => true,
            'supports' => ['title'],
            'has_archive' => false
        ];

        register_post_type('digitalia_form_entry', $args);
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
            'edit_digitalia_form_entry',
            'read_digitalia_form_entry',
            'delete_digitalia_form_entry',
            'edit_digitalia_form_entries',
            'edit_others_digitalia_form_entries',
            'publish_digitalia_form_entries',
            'read_private_digitalia_form_entries',
            'delete_digitalia_form_entries',
            'delete_private_digitalia_form_entries',
            'delete_published_digitalia_form_entries',
            'delete_others_digitalia_form_entries',
            'edit_private_digitalia_form_entries',
            'edit_published_digitalia_form_entries',
        ];

        foreach ($capabilities as $cap) {
            $role->add_cap($cap);
        }
    }

    /**
     * Añadir meta boxes
     */
    public function add_meta_boxes() {
        add_meta_box(
            'digitalia_form_entry_data',
            __('Datos del Formulario', 'digitalia-forms'),
            [$this, 'render_form_data_meta_box'],
            'digitalia_form_entry',
            'normal',
            'high'
        );
    }

    /**
     * Renderizar meta box de datos del formulario
     */
    public function render_form_data_meta_box($post) {
        $form_id = get_post_meta($post->ID, '_form_id', true);
        $submission_date = get_post_meta($post->ID, '_submission_date', true);
        $user_ip = get_post_meta($post->ID, '_user_ip', true);
        $user_agent = get_post_meta($post->ID, '_user_agent', true);

        echo '<div class="digitalia-form-entry-data">';
        
        // Información general
        echo '<h3>' . __('Información General', 'digitalia-forms') . '</h3>';
        echo '<table class="form-table">';
        echo '<tr>';
        echo '<th>' . __('ID del Formulario', 'digitalia-forms') . '</th>';
        echo '<td>' . esc_html($form_id) . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>' . __('Fecha de Envío', 'digitalia-forms') . '</th>';
        echo '<td>' . esc_html($submission_date) . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>' . __('IP del Usuario', 'digitalia-forms') . '</th>';
        echo '<td>' . esc_html($user_ip) . '</td>';
        echo '</tr>';
        echo '</table>';

        // Datos del formulario
        echo '<h3>' . __('Datos del Formulario', 'digitalia-forms') . '</h3>';
        
        // Intentar obtener datos del formulario del meta combinado
        $form_data = get_post_meta($post->ID, '_form_data', true);
        
        // Si no hay datos combinados, intentar obtener datos individuales
        if (empty($form_data) || !is_array($form_data)) {
            $form_data = [];
            $form_fields = get_post_meta($form_id, '_form_fields', true);
            
            if (is_array($form_fields)) {
                foreach ($form_fields as $field) {
                    $field_key = '_field_' . sanitize_title($field['label']);
                    $value = get_post_meta($post->ID, $field_key, true);
                    if ($value !== '') {
                        $form_data[$field['label']] = $value;
                    }
                }
            }
        }
        
        if (empty($form_data)) {
            echo '<p>' . __('No hay datos disponibles para este envío.', 'digitalia-forms') . '</p>';
        } else {
            echo '<table class="form-table">';
            foreach ($form_data as $field_label => $value) {
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }
                echo '<tr>';
                echo '<th>' . esc_html($field_label) . '</th>';
                echo '<td>' . nl2br(esc_html($value)) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        echo '</div>';
    }

    /**
     * Configurar columnas
     */
    public function set_columns($columns) {
        $columns = [
            'cb' => '<input type="checkbox" />',
            'title' => __('ID', 'digitalia-forms'),
            'form' => __('Formulario', 'digitalia-forms'),
            'submitted' => __('Enviado', 'digitalia-forms'),
            'status' => __('Estado', 'digitalia-forms')
        ];
        return $columns;
    }

    /**
     * Renderizar columna
     */
    public function render_column($column, $post_id) {
        switch ($column) {
            case 'form':
                $form_id = get_post_meta($post_id, '_form_id', true);
                $form = get_post($form_id);
                if ($form) {
                    echo esc_html($form->post_title);
                }
                break;

            case 'submitted':
                echo get_the_date('Y-m-d H:i:s', $post_id);
                break;

            case 'status':
                $status = get_post_status($post_id);
                echo esc_html(ucfirst($status));
                break;
        }
    }

    /**
     * Configurar columnas ordenables
     */
    public function set_sortable_columns($columns) {
        $columns['submitted'] = 'date';
        $columns['form'] = 'form_id';
        return $columns;
    }
}
