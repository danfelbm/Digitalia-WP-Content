<?php
namespace DigitaliaForms\Email;

class SMTP {
    private $settings;

    public function __construct() {
        $this->settings = get_option('digitalia_forms_smtp_settings', []);
        add_action('phpmailer_init', [$this, 'configure_smtp']);
    }

    /**
     * Configurar PHPMailer para usar SMTP
     */
    public function configure_smtp($phpmailer) {
        if (empty($this->settings['enabled'])) {
            return;
        }

        $phpmailer->isSMTP();
        $phpmailer->Host = $this->settings['host'] ?? '';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = $this->settings['port'] ?? 587;
        $phpmailer->Username = $this->settings['username'] ?? '';
        $phpmailer->Password = $this->settings['password'] ?? '';
        $phpmailer->SMTPSecure = $this->settings['encryption'] ?? 'tls';
        $phpmailer->From = $this->settings['from_email'] ?? '';
        $phpmailer->FromName = $this->settings['from_name'] ?? '';
    }

    /**
     * Guardar configuración SMTP
     */
    public function save_settings($data) {
        $settings = [
            'enabled' => !empty($data['smtp_enabled']),
            'host' => sanitize_text_field($data['smtp_host'] ?? ''),
            'port' => absint($data['smtp_port'] ?? 587),
            'username' => sanitize_text_field($data['smtp_username'] ?? ''),
            'password' => $data['smtp_password'] ?? '',
            'encryption' => sanitize_text_field($data['smtp_encryption'] ?? 'tls'),
            'from_email' => sanitize_email($data['smtp_from_email'] ?? ''),
            'from_name' => sanitize_text_field($data['smtp_from_name'] ?? '')
        ];

        return update_option('digitalia_forms_smtp_settings', $settings);
    }

    /**
     * Probar configuración SMTP
     */
    public function test_connection($to_email) {
        $subject = __('Prueba de Configuración SMTP - Digitalia Forms', 'digitalia-forms');
        $message = __('Si recibes este correo, la configuración SMTP está funcionando correctamente.', 'digitalia-forms');
        
        add_action('wp_mail_failed', function($error) {
            throw new \Exception($error->get_error_message());
        });

        try {
            $result = wp_mail($to_email, $subject, $message);
            if (!$result) {
                throw new \Exception(__('Error al enviar el correo de prueba.', 'digitalia-forms'));
            }
            return true;
        } catch (\Exception $e) {
            return new \WP_Error('smtp_test_failed', $e->getMessage());
        }
    }
}
