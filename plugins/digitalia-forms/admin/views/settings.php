<?php
if (!defined('ABSPATH')) {
    exit;
}

$smtp_settings = get_option('digitalia_forms_smtp_settings', []);
$test_email = isset($_POST['test_email']) ? sanitize_email($_POST['test_email']) : '';

if (!empty($_POST['test_smtp']) && !empty($test_email)) {
    check_admin_referer('test_smtp', 'digitalia_forms_test_nonce');
    $smtp = new \DigitaliaForms\Email\SMTP();
    $result = $smtp->test_connection($test_email);
    
    if (is_wp_error($result)) {
        echo '<div class="notice notice-error"><p>' . esc_html($result->get_error_message()) . '</p></div>';
    } else {
        echo '<div class="notice notice-success"><p>' . esc_html__('Correo de prueba enviado exitosamente.', 'digitalia-forms') . '</p></div>';
    }
}
?>

<div class="wrap">
    <h1><?php _e('Configuración de Digitalia Forms', 'digitalia-forms'); ?></h1>

    <form method="post" action="options.php">
        <?php settings_fields('digitalia_forms_settings'); ?>
        <?php do_settings_sections('digitalia_forms_settings'); ?>

        <div class="card">
            <h2><?php _e('Configuración SMTP', 'digitalia-forms'); ?></h2>
            
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="smtp_enabled"><?php _e('Habilitar SMTP', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="checkbox" 
                               id="smtp_enabled" 
                               name="digitalia_forms_smtp_settings[enabled]" 
                               value="1" 
                               <?php checked(!empty($smtp_settings['enabled'])); ?>>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_host"><?php _e('Servidor SMTP', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               id="smtp_host" 
                               name="digitalia_forms_smtp_settings[host]" 
                               class="regular-text" 
                               value="<?php echo esc_attr($smtp_settings['host'] ?? ''); ?>">
                        <p class="description"><?php _e('Ej: smtp.gmail.com', 'digitalia-forms'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_port"><?php _e('Puerto SMTP', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="number" 
                               id="smtp_port" 
                               name="digitalia_forms_smtp_settings[port]" 
                               class="small-text" 
                               value="<?php echo esc_attr($smtp_settings['port'] ?? '587'); ?>">
                        <p class="description"><?php _e('Común: 587 (TLS) o 465 (SSL)', 'digitalia-forms'); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_encryption"><?php _e('Encriptación', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <select id="smtp_encryption" name="digitalia_forms_smtp_settings[encryption]">
                            <option value="tls" <?php selected(($smtp_settings['encryption'] ?? 'tls'), 'tls'); ?>>TLS</option>
                            <option value="ssl" <?php selected(($smtp_settings['encryption'] ?? 'tls'), 'ssl'); ?>>SSL</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_username"><?php _e('Usuario SMTP', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               id="smtp_username" 
                               name="digitalia_forms_smtp_settings[username]" 
                               class="regular-text" 
                               value="<?php echo esc_attr($smtp_settings['username'] ?? ''); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_password"><?php _e('Contraseña SMTP', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="password" 
                               id="smtp_password" 
                               name="digitalia_forms_smtp_settings[password]" 
                               class="regular-text" 
                               value="<?php echo esc_attr($smtp_settings['password'] ?? ''); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_from_email"><?php _e('Email Remitente', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="email" 
                               id="smtp_from_email" 
                               name="digitalia_forms_smtp_settings[from_email]" 
                               class="regular-text" 
                               value="<?php echo esc_attr($smtp_settings['from_email'] ?? ''); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="smtp_from_name"><?php _e('Nombre Remitente', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="text" 
                               id="smtp_from_name" 
                               name="digitalia_forms_smtp_settings[from_name]" 
                               class="regular-text" 
                               value="<?php echo esc_attr($smtp_settings['from_name'] ?? ''); ?>">
                    </td>
                </tr>
            </table>
        </div>

        <?php submit_button(); ?>
    </form>

    <div class="card">
        <h2><?php _e('Probar Configuración SMTP', 'digitalia-forms'); ?></h2>
        <form method="post" action="">
            <?php wp_nonce_field('test_smtp', 'digitalia_forms_test_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="test_email"><?php _e('Email de Prueba', 'digitalia-forms'); ?></label>
                    </th>
                    <td>
                        <input type="email" 
                               id="test_email" 
                               name="test_email" 
                               class="regular-text" 
                               value="<?php echo esc_attr($test_email); ?>" 
                               required>
                        <p class="description">
                            <?php _e('Ingresa un email para recibir un correo de prueba.', 'digitalia-forms'); ?>
                        </p>
                    </td>
                </tr>
            </table>
            <?php submit_button(__('Enviar Correo de Prueba', 'digitalia-forms'), 'secondary', 'test_smtp'); ?>
        </form>
    </div>
</div>
