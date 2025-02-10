<?php
if (!defined('ABSPATH')) {
    exit;
}

$settings = wp_parse_args($settings, [
    'success_message' => __('¡Gracias! Tu formulario ha sido enviado correctamente.', 'digitalia-forms'),
    'email_notification' => false,
    'notification_email' => get_option('admin_email'),
    'confirmation_email' => false,
    'email_template' => ''
]);
?>

<div class="digitalia-forms-settings">
    <p>
        <label for="success_message"><?php _e('Mensaje de Éxito', 'digitalia-forms'); ?></label>
        <textarea id="success_message" 
                  name="settings[success_message]" 
                  class="widefat" 
                  rows="3"><?php echo esc_textarea($settings['success_message']); ?></textarea>
    </p>

    <p>
        <label>
            <input type="checkbox" 
                   name="settings[email_notification]" 
                   value="1" 
                   <?php checked($settings['email_notification']); ?>>
            <?php _e('Enviar notificación por email', 'digitalia-forms'); ?>
        </label>
    </p>

    <p>
        <label for="notification_email"><?php _e('Email para Notificaciones', 'digitalia-forms'); ?></label>
        <input type="email" 
               id="notification_email" 
               name="settings[notification_email]" 
               class="widefat" 
               value="<?php echo esc_attr($settings['notification_email']); ?>">
    </p>

    <p>
        <label>
            <input type="checkbox" 
                   name="settings[confirmation_email]" 
                   value="1" 
                   <?php checked($settings['confirmation_email']); ?>>
            <?php _e('Enviar email de confirmación al remitente', 'digitalia-forms'); ?>
        </label>
    </p>

    <p>
        <label for="email_template"><?php _e('Plantilla de Email', 'digitalia-forms'); ?></label>
        <textarea id="email_template" 
                  name="settings[email_template]" 
                  class="widefat" 
                  rows="5"><?php echo esc_textarea($settings['email_template']); ?></textarea>
        <span class="description">
            <?php _e('Puedes usar las siguientes variables:', 'digitalia-forms'); ?>
            <code>{form_title}</code>, <code>{field_name}</code>, <code>{submission_date}</code>
        </span>
    </p>
</div>
