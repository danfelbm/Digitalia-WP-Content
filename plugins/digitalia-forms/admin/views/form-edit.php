<?php
if (!defined('ABSPATH')) {
    exit;
}

$form_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$form = null;
$fields = [];
$actions = [];

if ($form_id) {
    global $wpdb;
    
    // Obtener datos del formulario
    $form = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}digitalia_forms WHERE id = %d",
        $form_id
    ));

    if ($form) {
        // Obtener campos
        $fields = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}digitalia_forms_fields WHERE form_id = %d ORDER BY `order` ASC",
            $form_id
        ));

        // Obtener acciones
        $actions = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}digitalia_forms_actions WHERE form_id = %d ORDER BY `order` ASC",
            $form_id
        ));
    }
}
?>

<div class="wrap digitalia-forms-wrap">
    <div class="digitalia-forms-header">
        <h1 class="digitalia-forms-title">
            <?php echo $form_id ? __('Editar Formulario', 'digitalia-forms') : __('Nuevo Formulario', 'digitalia-forms'); ?>
        </h1>
    </div>

    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" id="digitalia-forms-edit" class="digitalia-forms-edit">
        <?php 
        // Debug output
        if (WP_DEBUG) {
            error_log('Form submission data: ' . print_r($_POST, true));
        }
        ?>
        <?php wp_nonce_field('save_form', 'digitalia_forms_nonce'); ?>
        <input type="hidden" name="action" value="digitalia_forms_save">
        <input type="hidden" name="form_id" value="<?php echo esc_attr($form_id); ?>">

        <div class="digitalia-forms-edit-header">
            <p>
                <label for="title"><?php _e('Título del Formulario', 'digitalia-forms'); ?></label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       class="widefat" 
                       value="<?php echo esc_attr($form ? $form->title : ''); ?>" 
                       required>
            </p>
            <p>
                <label for="description"><?php _e('Descripción', 'digitalia-forms'); ?></label>
                <textarea id="description" 
                          name="description" 
                          class="widefat" 
                          rows="3"><?php echo esc_textarea($form ? $form->description : ''); ?></textarea>
            </p>
            <p>
                <label for="status"><?php _e('Estado', 'digitalia-forms'); ?></label>
                <select id="status" name="status" class="widefat">
                    <option value="draft" <?php selected($form ? $form->status : 'draft', 'draft'); ?>>
                        <?php _e('Borrador', 'digitalia-forms'); ?>
                    </option>
                    <option value="published" <?php selected($form ? $form->status : '', 'published'); ?>>
                        <?php _e('Publicado', 'digitalia-forms'); ?>
                    </option>
                </select>
            </p>
        </div>

        <div class="digitalia-forms-fields">
            <h2><?php _e('Campos del Formulario', 'digitalia-forms'); ?></h2>
            <div class="digitalia-forms-fields-list">
                <?php
                if (!empty($fields)) {
                    foreach ($fields as $field) {
                        require DIGITALIA_FORMS_PATH . 'admin/views/partials/field.php';
                    }
                }
                ?>
            </div>
            <button type="button" class="button digitalia-forms-add-field">
                <?php _e('Añadir Campo', 'digitalia-forms'); ?>
            </button>
        </div>

        <div class="digitalia-forms-actions">
            <h2><?php _e('Acciones del Formulario', 'digitalia-forms'); ?></h2>
            <div class="digitalia-forms-actions-list">
                <?php
                if (!empty($actions)) {
                    foreach ($actions as $action) {
                        require DIGITALIA_FORMS_PATH . 'admin/views/partials/action.php';
                    }
                }
                ?>
            </div>
            <button type="button" class="button digitalia-forms-add-action">
                <?php _e('Añadir Acción', 'digitalia-forms'); ?>
            </button>
        </div>

        <div class="digitalia-forms-controls">
            <button type="submit" class="button button-primary" id="digitalia-forms-save">
                <?php _e('Guardar Formulario', 'digitalia-forms'); ?>
            </button>
            <a href="<?php echo admin_url('admin.php?page=digitalia-forms'); ?>" class="button">
                <?php _e('Cancelar', 'digitalia-forms'); ?>
            </a>
        </div>
    </form>
</div>

<!-- Template para nuevo campo -->
<script type="text/template" id="digitalia-forms-field-template">
    <?php
    $field = (object)[
        'id' => '{{id}}',
        'label' => '',
        'name' => '',
        'type' => 'text',
        'required' => 0,
        'options' => ''
    ];
    require DIGITALIA_FORMS_PATH . 'admin/views/partials/field.php';
    ?>
</script>

<!-- Template para nueva acción -->
<script type="text/template" id="digitalia-forms-action-template">
    <?php
    $action = (object)[
        'id' => '{{id}}',
        'type' => 'email',
        'config' => ''
    ];
    require DIGITALIA_FORMS_PATH . 'admin/views/partials/action.php';
    ?>
</script>
