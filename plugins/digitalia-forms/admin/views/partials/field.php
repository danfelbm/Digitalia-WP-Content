<?php
if (!defined('ABSPATH')) {
    exit;
}

$field = $field ?? [];
$index = isset($index) ? $index : 0;
?>

<div class="digitalia-forms-field" data-index="<?php echo esc_attr($index); ?>">
    <div class="digitalia-forms-field-header">
        <span class="move-field dashicons dashicons-move"></span>
        <div class="digitalia-forms-field-actions">
            <button type="button" class="delete-field button button-link-delete">
                <span class="dashicons dashicons-trash"></span>
            </button>
        </div>
    </div>
    
    <div class="digitalia-forms-field-content">
        <input type="hidden" name="fields[<?php echo $index; ?>][order]" value="<?php echo isset($field['order']) ? esc_attr($field['order']) : $index; ?>">
        <input type="hidden" name="fields[<?php echo $index; ?>][id]" value="<?php echo isset($field['id']) ? esc_attr($field['id']) : ''; ?>">
        
        <p>
            <label><?php _e('Etiqueta:', 'digitalia-forms'); ?></label>
            <input type="text" 
                   name="fields[<?php echo $index; ?>][label]" 
                   class="widefat field-label" 
                   value="<?php echo isset($field['label']) ? esc_attr($field['label']) : ''; ?>" 
                   required>
        </p>

        <p>
            <label><?php _e('Clave del campo:', 'digitalia-forms'); ?></label>
            <input type="text" 
                   name="fields[<?php echo $index; ?>][key]" 
                   class="widefat field-key" 
                   value="<?php echo isset($field['key']) ? esc_attr($field['key']) : ''; ?>"
                   <?php echo isset($field['id']) ? 'readonly' : ''; ?>
                   pattern="[a-z0-9_-]+" 
                   title="<?php esc_attr_e('Solo letras minúsculas, números, guiones y guiones bajos', 'digitalia-forms'); ?>"
                   required>
            <?php if (isset($field['id'])): ?>
                <span class="description"><?php _e('La clave del campo no se puede modificar una vez guardado el formulario.', 'digitalia-forms'); ?></span>
            <?php else: ?>
                <span class="description"><?php _e('Identificador único para el campo. Se usará para almacenar los datos.', 'digitalia-forms'); ?></span>
            <?php endif; ?>
        </p>
        
        <p>
            <label><?php _e('Tipo:', 'digitalia-forms'); ?></label>
            <select name="fields[<?php echo $index; ?>][type]" class="field-type widefat">
                <?php
                $field_types = [
                    'text' => __('Texto', 'digitalia-forms'),
                    'email' => __('Email', 'digitalia-forms'),
                    'tel' => __('Teléfono', 'digitalia-forms'),
                    'textarea' => __('Área de texto', 'digitalia-forms'),
                    'select' => __('Selección', 'digitalia-forms'),
                    'radio' => __('Radio', 'digitalia-forms'),
                    'checkbox' => __('Casilla', 'digitalia-forms'),
                    'file' => __('Archivo', 'digitalia-forms')
                ];
                
                foreach ($field_types as $value => $label) {
                    printf(
                        '<option value="%s" %s>%s</option>',
                        esc_attr($value),
                        selected($field['type'] ?? 'text', $value, false),
                        esc_html($label)
                    );
                }
                ?>
            </select>
        </p>

        <p>
            <label>
                <input type="checkbox" 
                       name="fields[<?php echo $index; ?>][required]" 
                       value="1" 
                       <?php checked(isset($field['required']) && $field['required']); ?>>
                <?php _e('Obligatorio', 'digitalia-forms'); ?>
            </label>
        </p>

        <p class="field-options" style="display: <?php echo in_array($field['type'] ?? 'text', ['select', 'radio', 'checkbox']) ? 'block' : 'none'; ?>;">
            <label><?php _e('Opciones (una por línea):', 'digitalia-forms'); ?></label>
            <textarea name="fields[<?php echo $index; ?>][options]" 
                      class="widefat" 
                      rows="3"><?php echo isset($field['options']) ? esc_textarea($field['options']) : ''; ?></textarea>
        </p>
        
        <?php if (($field['type'] ?? '') === 'file'): ?>
            <div class="field-option">
                <label><?php _e('Tipos de archivo permitidos:', 'digitalia-forms'); ?></label>
                <input type="text" 
                       name="fields[<?php echo $index; ?>][allowed_types]" 
                       class="widefat" 
                       placeholder="jpg,png,pdf"
                       value="<?php echo esc_attr($field['allowed_types'] ?? ''); ?>">
                
                <label><?php _e('Tamaño máximo (MB):', 'digitalia-forms'); ?></label>
                <input type="number" 
                       name="fields[<?php echo $index; ?>][max_size]" 
                       class="widefat" 
                       value="<?php echo esc_attr($field['max_size'] ?? 2); ?>">
            </div>
        <?php endif; ?>
    </div>
</div>
