<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="digitalia-forms-fields">
    <div class="digitalia-forms-fields-list">
        <?php
        if (!empty($fields)) {
            foreach ($fields as $index => $field) {
                include DIGITALIA_FORMS_PATH . 'admin/views/partials/field.php';
            }
        }
        ?>
    </div>
    <button type="button" class="button digitalia-forms-add-field">
        <?php _e('Añadir Campo', 'digitalia-forms'); ?>
    </button>
</div>

<!-- Template para nuevo campo -->
<script type="text/template" id="digitalia-forms-field-template">
    <?php
    $field = [];
    $index = '{{index}}';
    include DIGITALIA_FORMS_PATH . 'admin/views/partials/field.php';
    ?>
</script>
