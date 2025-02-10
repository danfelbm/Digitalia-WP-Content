<?php
if (!defined('ABSPATH')) {
    exit;
}

// Obtener lista de formularios
global $wpdb;
$forms = $wpdb->get_results(
    "SELECT f.* FROM {$wpdb->prefix}digitalia_forms f ORDER BY f.created_at DESC"
);

// Obtener conteo de entradas para cada formulario
foreach ($forms as $form) {
    $args = [
        'post_type' => 'digitalia_form_entry',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => '_form_id',
                'value' => $form->id,
                'compare' => '='
            ]
        ]
    ];
    $query = new WP_Query($args);
    $form->entries_count = $query->found_posts;
}
?>

<div class="wrap digitalia-forms-wrap">
    <div class="digitalia-forms-header">
        <h1 class="digitalia-forms-title"><?php _e('Formularios', 'digitalia-forms'); ?></h1>
        <a href="<?php echo admin_url('admin.php?page=digitalia-forms-new'); ?>" class="page-title-action">
            <?php _e('Añadir Nuevo', 'digitalia-forms'); ?>
        </a>
    </div>

    <?php if (!empty($_GET['message'])): ?>
        <div class="notice notice-<?php echo $_GET['message'] === 'error' ? 'error' : 'success'; ?>">
            <p>
                <?php
                switch ($_GET['message']) {
                    case 'saved':
                        _e('Formulario guardado exitosamente.', 'digitalia-forms');
                        break;
                    case 'deleted':
                        _e('Formulario eliminado exitosamente.', 'digitalia-forms');
                        break;
                    case 'error':
                        _e('Error al guardar el formulario. Por favor, intenta nuevamente.', 'digitalia-forms');
                        break;
                }
                ?>
            </p>
        </div>
    <?php endif; ?>

    <table class="digitalia-forms-table wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th scope="col"><?php _e('Título', 'digitalia-forms'); ?></th>
                <th scope="col"><?php _e('Shortcode', 'digitalia-forms'); ?></th>
                <th scope="col"><?php _e('Entradas', 'digitalia-forms'); ?></th>
                <th scope="col"><?php _e('Estado', 'digitalia-forms'); ?></th>
                <th scope="col"><?php _e('Fecha', 'digitalia-forms'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($forms)): ?>
                <?php foreach ($forms as $form): ?>
                    <tr>
                        <td>
                            <strong>
                                <a href="<?php echo admin_url('admin.php?page=digitalia-forms-new&id=' . $form->id); ?>" class="row-title">
                                    <?php echo esc_html($form->title); ?>
                                </a>
                            </strong>
                            <div class="row-actions">
                                <span class="edit">
                                    <a href="<?php echo admin_url('admin.php?page=digitalia-forms-new&id=' . $form->id); ?>">
                                        <?php _e('Editar', 'digitalia-forms'); ?>
                                    </a> |
                                </span>
                                <span class="entries">
                                    <a href="<?php echo admin_url('admin.php?page=digitalia-forms-entries&form_id=' . $form->id); ?>">
                                        <?php _e('Ver Entradas', 'digitalia-forms'); ?>
                                    </a> |
                                </span>
                                <span class="trash">
                                    <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=digitalia-forms&action=delete&id=' . $form->id), 'delete-form_' . $form->id); ?>" 
                                       class="submitdelete"
                                       onclick="return confirm('<?php _e('¿Estás seguro de que deseas eliminar este formulario?', 'digitalia-forms'); ?>');">
                                        <?php _e('Eliminar', 'digitalia-forms'); ?>
                                    </a>
                                </span>
                            </div>
                        </td>
                        <td>
                            <input type="text" 
                                   readonly="readonly" 
                                   class="widefat" 
                                   value='[digitalia_form id="<?php echo $form->id; ?>"]'
                                   onclick="this.select();">
                        </td>
                        <td>
                            <a href="<?php echo admin_url('admin.php?page=digitalia-forms-entries&form_id=' . $form->id); ?>">
                                <?php echo $form->entries_count; ?>
                            </a>
                        </td>
                        <td>
                            <?php
                            $status_labels = [
                                'draft' => __('Borrador', 'digitalia-forms'),
                                'published' => __('Publicado', 'digitalia-forms')
                            ];
                            echo $status_labels[$form->status] ?? $form->status;
                            ?>
                        </td>
                        <td>
                            <?php echo mysql2date(get_option('date_format'), $form->created_at); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">
                        <?php _e('No se encontraron formularios.', 'digitalia-forms'); ?>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
