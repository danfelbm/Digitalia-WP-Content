<?php
namespace DigitaliaForms\Forms;

use DigitaliaForms\Database\Manager;

class Renderer {
    private $db;
    
    public function __construct() {
        $this->db = new Manager();
    }

    /**
     * Renderizar formulario
     */
    public function render($form_id) {
        $form = $this->db->get_form($form_id);
        
        if (!$form || $form->status !== 'published') {
            return sprintf(
                '<p class="digitalia-forms-error">%s</p>',
                __('Formulario no disponible.', 'digitalia-forms')
            );
        }

        $fields = $this->db->get_form_fields($form_id);
        
        ob_start();
        ?>
        <div class="digitalia-forms-container" id="digitalia-form-<?php echo $form_id; ?>">
            <form class="digitalia-forms-form" method="post" enctype="multipart/form-data">
                <?php wp_nonce_field('digitalia_forms_submit', 'digitalia_forms_nonce'); ?>
                <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">
                
                <?php if (!empty($form->description)): ?>
                    <div class="digitalia-forms-description">
                        <?php echo wp_kses_post($form->description); ?>
                    </div>
                <?php endif; ?>

                <div class="digitalia-forms-fields">
                    <?php foreach ($fields as $field): ?>
                        <div class="digitalia-forms-field field-type-<?php echo esc_attr($field->type); ?>">
                            <label for="field_<?php echo $field->id; ?>">
                                <?php echo esc_html($field->label); ?>
                                <?php if ($field->required): ?>
                                    <span class="required">*</span>
                                <?php endif; ?>
                            </label>

                            <?php echo $this->render_field($field); ?>
                            
                            <div class="digitalia-forms-error-message" 
                                 id="error_field_<?php echo $field->id; ?>"></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="digitalia-forms-submit">
                    <button type="submit" class="digitalia-forms-button">
                        <?php _e('Enviar', 'digitalia-forms'); ?>
                    </button>
                </div>

                <div class="digitalia-forms-message"></div>
            </form>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Renderizar campo individual
     */
    private function render_field($field) {
        $options = json_decode($field->options, true) ?: [];
        $required = $field->required ? 'required' : '';
        $field_id = 'field_' . $field->id;

        switch ($field->type) {
            case 'text':
            case 'email':
            case 'tel':
                return sprintf(
                    '<input type="%s" id="%s" name="%s" class="digitalia-forms-input" %s>',
                    esc_attr($field->type),
                    esc_attr($field_id),
                    esc_attr($field_id),
                    $required
                );

            case 'textarea':
                return sprintf(
                    '<textarea id="%s" name="%s" class="digitalia-forms-textarea" rows="5" %s></textarea>',
                    esc_attr($field_id),
                    esc_attr($field_id),
                    $required
                );

            case 'select':
                $output = sprintf(
                    '<select id="%s" name="%s" class="digitalia-forms-select" %s>',
                    esc_attr($field_id),
                    esc_attr($field_id),
                    $required
                );
                
                $output .= '<option value="">' . __('Seleccionar...', 'digitalia-forms') . '</option>';
                
                if (!empty($options['values'])) {
                    foreach ($options['values'] as $value) {
                        $output .= sprintf(
                            '<option value="%s">%s</option>',
                            esc_attr($value),
                            esc_html($value)
                        );
                    }
                }
                
                $output .= '</select>';
                return $output;

            case 'radio':
                $output = '<div class="digitalia-forms-radio-group">';
                
                if (!empty($options['values'])) {
                    foreach ($options['values'] as $value) {
                        $output .= sprintf(
                            '<label class="digitalia-forms-radio">
                                <input type="radio" name="%s" value="%s" %s>
                                <span>%s</span>
                            </label>',
                            esc_attr($field_id),
                            esc_attr($value),
                            $required,
                            esc_html($value)
                        );
                    }
                }
                
                $output .= '</div>';
                return $output;

            case 'checkbox':
                $output = '<div class="digitalia-forms-checkbox-group">';
                
                if (!empty($options['values'])) {
                    foreach ($options['values'] as $value) {
                        $output .= sprintf(
                            '<label class="digitalia-forms-checkbox">
                                <input type="checkbox" name="%s[]" value="%s" %s>
                                <span>%s</span>
                            </label>',
                            esc_attr($field_id),
                            esc_attr($value),
                            $required,
                            esc_html($value)
                        );
                    }
                }
                
                $output .= '</div>';
                return $output;

            case 'file':
                $allowed_types = !empty($options['allowed_types']) 
                    ? '.' . implode(',.', $options['allowed_types'])
                    : '.jpg,.jpeg,.png,.pdf';
                
                return sprintf(
                    '<input type="file" id="%s" name="%s" class="digitalia-forms-file" 
                           accept="%s" %s>
                     <small class="digitalia-forms-file-info">%s</small>',
                    esc_attr($field_id),
                    esc_attr($field_id),
                    esc_attr($allowed_types),
                    $required,
                    sprintf(
                        __('Tipos permitidos: %s. Tamaño máximo: %sMB', 'digitalia-forms'),
                        implode(', ', $options['allowed_types'] ?? ['jpg', 'jpeg', 'png', 'pdf']),
                        $options['max_size'] ?? 2
                    )
                );
        }

        return '';
    }
}
