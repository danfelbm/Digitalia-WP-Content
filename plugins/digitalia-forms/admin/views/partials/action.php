<?php
if (!defined('ABSPATH')) {
    exit;
}

$action = $action ?? new stdClass();
$action_id = $action->id ?? 0;
$config = json_decode($action->config ?? '{}', true) ?: [];
?>

<div class="digitalia-forms-action" data-id="<?php echo $action_id; ?>">
    <div class="digitalia-forms-action-header">
        <span class="move-action dashicons dashicons-move"></span>
        <div class="digitalia-forms-action-actions">
            <button type="button" class="delete-action button button-link-delete">
                <span class="dashicons dashicons-trash"></span>
            </button>
        </div>
    </div>
    
    <div class="digitalia-forms-action-content">
        <input type="hidden" name="action_id[]" value="<?php echo $action_id; ?>">
        <input type="hidden" name="action_order[]" value="<?php echo $action->order ?? 0; ?>">
        
        <p>
            <label><?php _e('Tipo:', 'digitalia-forms'); ?></label>
            <select name="action_type[]" class="action-type widefat">
                <?php
                $action_types = [
                    'email' => __('Enviar Email', 'digitalia-forms'),
                    'webhook' => __('Webhook', 'digitalia-forms'),
                    'notification' => __('Notificación', 'digitalia-forms')
                ];
                
                foreach ($action_types as $value => $label) {
                    printf(
                        '<option value="%s" %s>%s</option>',
                        esc_attr($value),
                        selected($action->type ?? '', $value, false),
                        esc_html($label)
                    );
                }
                ?>
            </select>
        </p>
        
        <div class="action-options">
            <?php if (($action->type ?? '') === 'email'): ?>
                <div class="action-option">
                    <label><?php _e('Destinatario:', 'digitalia-forms'); ?></label>
                    <input type="email" 
                           name="action_recipient[]" 
                           class="widefat"
                           value="<?php echo esc_attr($config['recipient'] ?? ''); ?>">
                    
                    <label><?php _e('Asunto:', 'digitalia-forms'); ?></label>
                    <input type="text" 
                           name="action_subject[]" 
                           class="widefat"
                           value="<?php echo esc_attr($config['subject'] ?? ''); ?>">
                    
                    <label><?php _e('Mensaje:', 'digitalia-forms'); ?></label>
                    <textarea name="action_message[]" rows="4" class="widefat"><?php 
                        echo esc_textarea($config['message'] ?? '');
                    ?></textarea>
                </div>
            <?php elseif (($action->type ?? '') === 'webhook'): ?>
                <div class="action-option">
                    <label><?php _e('URL del Webhook:', 'digitalia-forms'); ?></label>
                    <input type="url" 
                           name="action_webhook_url[]" 
                           class="widefat"
                           value="<?php echo esc_attr($config['url'] ?? ''); ?>">
                    
                    <label><?php _e('Método:', 'digitalia-forms'); ?></label>
                    <select name="action_webhook_method[]" class="widefat">
                        <?php
                        $methods = ['POST', 'PUT'];
                        foreach ($methods as $method) {
                            printf(
                                '<option value="%s" %s>%s</option>',
                                esc_attr($method),
                                selected($config['method'] ?? 'POST', $method, false),
                                esc_html($method)
                            );
                        }
                        ?>
                    </select>
                </div>
            <?php elseif (($action->type ?? '') === 'notification'): ?>
                <div class="action-option">
                    <label><?php _e('Mensaje de Notificación:', 'digitalia-forms'); ?></label>
                    <textarea name="action_notification_message[]" rows="4" class="widefat"><?php 
                        echo esc_textarea($config['message'] ?? '');
                    ?></textarea>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
