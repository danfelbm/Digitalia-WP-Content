<?php
if (!defined('ABSPATH')) {
    exit;
}

// Obtener el formulario
global $wpdb;
$form = $wpdb->get_row($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}digitalia_forms WHERE id = %d AND status = 'published'",
    $atts['id']
));

if (!$form) {
    return __('Formulario no encontrado.', 'digitalia-forms');
}

// Obtener campos
$fields = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}digitalia_forms_fields WHERE form_id = %d ORDER BY `order` ASC",
    $form->id
));

if (empty($fields)) {
    return __('El formulario no tiene campos.', 'digitalia-forms');
}
?>

<div class="digitalia-forms-container">
    <form method="post" action="" class="digitalia-forms-form" id="digitalia-form-<?php echo $form->id; ?>">
        <input type="hidden" name="form_id" value="<?php echo $form->id; ?>">

        <?php if (!empty($form->description)): ?>
            <div class="digitalia-forms-description">
                <?php echo wp_kses_post($form->description); ?>
            </div>
        <?php endif; ?>

        <?php foreach ($fields as $field): ?>
            <div class="digitalia-forms-field">
                <label for="field_<?php echo $field->id; ?>">
                    <?php echo esc_html($field->label); ?>
                    <?php if ($field->required): ?>
                        <span class="required">*</span>
                    <?php endif; ?>
                </label>

                <?php
                $options = json_decode($field->options, true);
                switch ($field->type):
                    case 'text':
                    case 'email':
                    case 'tel':
                    case 'url':
                        ?>
                        <input type="<?php echo esc_attr($field->type); ?>"
                               id="field_<?php echo $field->id; ?>"
                               name="fields[field_<?php echo $field->id; ?>]"
                               <?php echo $field->required ? 'required' : ''; ?>>
                        <?php
                        break;

                    case 'textarea':
                        ?>
                        <textarea id="field_<?php echo $field->id; ?>"
                                  name="fields[field_<?php echo $field->id; ?>]"
                                  rows="5"
                                  <?php echo $field->required ? 'required' : ''; ?>></textarea>
                        <?php
                        break;

                    case 'select':
                        ?>
                        <select id="field_<?php echo $field->id; ?>"
                                name="fields[field_<?php echo $field->id; ?>]"
                                <?php echo $field->required ? 'required' : ''; ?>>
                            <?php if (!$field->required): ?>
                                <option value=""><?php _e('Selecciona una opción', 'digitalia-forms'); ?></option>
                            <?php endif; ?>
                            <?php foreach ($options['choices'] ?? [] as $choice): ?>
                                <option value="<?php echo esc_attr($choice); ?>">
                                    <?php echo esc_html($choice); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php
                        break;

                    case 'radio':
                        if (!empty($options['choices'])):
                            foreach ($options['choices'] as $choice):
                                ?>
                                <div class="digitalia-forms-radio">
                                    <input type="radio"
                                           id="field_<?php echo $field->id; ?>_<?php echo sanitize_title($choice); ?>"
                                           name="fields[field_<?php echo $field->id; ?>]"
                                           value="<?php echo esc_attr($choice); ?>"
                                           <?php echo $field->required ? 'required' : ''; ?>>
                                    <label for="field_<?php echo $field->id; ?>_<?php echo sanitize_title($choice); ?>">
                                        <?php echo esc_html($choice); ?>
                                    </label>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        break;

                    case 'checkbox':
                        if (!empty($options['choices'])):
                            foreach ($options['choices'] as $choice):
                                ?>
                                <div class="digitalia-forms-checkbox">
                                    <input type="checkbox"
                                           id="field_<?php echo $field->id; ?>_<?php echo sanitize_title($choice); ?>"
                                           name="fields[field_<?php echo $field->id; ?>][]"
                                           value="<?php echo esc_attr($choice); ?>"
                                           <?php echo $field->required ? 'required' : ''; ?>>
                                    <label for="field_<?php echo $field->id; ?>_<?php echo sanitize_title($choice); ?>">
                                        <?php echo esc_html($choice); ?>
                                    </label>
                                </div>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <div class="digitalia-forms-checkbox">
                                <input type="checkbox"
                                       id="field_<?php echo $field->id; ?>"
                                       name="fields[field_<?php echo $field->id; ?>]"
                                       value="1"
                                       <?php echo $field->required ? 'required' : ''; ?>>
                                <label for="field_<?php echo $field->id; ?>">
                                    <?php echo esc_html($field->label); ?>
                                </label>
                            </div>
                            <?php
                        endif;
                        break;

                    case 'file':
                        ?>
                        <input type="file"
                               id="field_<?php echo $field->id; ?>"
                               name="fields[field_<?php echo $field->id; ?>]"
                               <?php if (!empty($options['allowed_types'])): ?>
                                   accept="<?php echo esc_attr($options['allowed_types']); ?>"
                               <?php endif; ?>
                               <?php echo $field->required ? 'required' : ''; ?>>
                        <?php if (!empty($options['max_size'])): ?>
                            <small class="digitalia-forms-help">
                                <?php printf(
                                    __('Tamaño máximo: %s MB', 'digitalia-forms'),
                                    esc_html($options['max_size'])
                                ); ?>
                            </small>
                        <?php endif; ?>
                        <?php
                        break;
                endswitch;
                ?>
            </div>
        <?php endforeach; ?>

        <div class="digitalia-forms-submit">
            <button type="submit" class="digitalia-forms-button">
                <?php _e('Enviar', 'digitalia-forms'); ?>
            </button>
        </div>
    </form>
</div>
