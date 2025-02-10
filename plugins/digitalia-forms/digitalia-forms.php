<?php
/**
 * Plugin Name: Digitalia Forms
 * Plugin URI: https://digitalia.com/plugins/digitalia-forms
 * Description: Plugin avanzado de formularios para WordPress con múltiples funcionalidades y acciones.
 * Version: 1.0.0
 * Author: Digitalia
 * Author URI: https://digitalia.com
 * Text Domain: digitalia-forms
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes del plugin
define('DIGITALIA_FORMS_VERSION', '1.0.0');
define('DIGITALIA_FORMS_FILE', __FILE__);
define('DIGITALIA_FORMS_PATH', plugin_dir_path(__FILE__));
define('DIGITALIA_FORMS_URL', plugin_dir_url(__FILE__));

// Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'DigitaliaForms\\';
    $base_dir = DIGITALIA_FORMS_PATH . 'includes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Inicialización del plugin
function digitalia_forms_init() {
    // Cargar traducciones
    load_plugin_textdomain('digitalia-forms', false, dirname(plugin_basename(__FILE__)) . '/languages');
    
    // Inicializar clases principales
    if (class_exists('DigitaliaForms\\Core\\Plugin')) {
        \DigitaliaForms\Core\Plugin::get_instance();
    }

    // Inicializar manejador de formularios
    if (class_exists('DigitaliaForms\\Forms\\Handler')) {
        new \DigitaliaForms\Forms\Handler();
    }
}
add_action('plugins_loaded', 'digitalia_forms_init');

// Activación del plugin
register_activation_hook(__FILE__, function() {
    require_once DIGITALIA_FORMS_PATH . 'includes/Core/Activator.php';
    \DigitaliaForms\Core\Activator::activate();
});

// Desactivación del plugin
register_deactivation_hook(__FILE__, function() {
    require_once DIGITALIA_FORMS_PATH . 'includes/Core/Deactivator.php';
    \DigitaliaForms\Core\Deactivator::deactivate();
});

// Registrar shortcode
function digitalia_forms_shortcode($atts) {
    $atts = shortcode_atts([
        'id' => 0
    ], $atts);

    if (empty($atts['id'])) {
        return '';
    }

    // Cargar assets del frontend
    wp_enqueue_style(
        'digitalia-forms-public',
        DIGITALIA_FORMS_URL . 'public/css/public.css',
        [],
        DIGITALIA_FORMS_VERSION
    );

    wp_enqueue_script(
        'digitalia-forms-public',
        DIGITALIA_FORMS_URL . 'public/js/public.js',
        ['jquery'],
        DIGITALIA_FORMS_VERSION,
        true
    );

    wp_localize_script('digitalia-forms-public', 'digitaliaForms', [
        'ajaxUrl' => admin_url('admin-ajax.php')
    ]);

    // Renderizar formulario
    if (class_exists('DigitaliaForms\\Forms\\Renderer')) {
        $renderer = new \DigitaliaForms\Forms\Renderer();
        return $renderer->render($atts['id']);
    }

    return '';
}
add_shortcode('digitalia_form', 'digitalia_forms_shortcode');
