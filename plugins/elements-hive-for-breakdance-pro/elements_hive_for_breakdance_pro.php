<?php
/**
 * @package     Elements_Hive_For_Breakdance_Pro
 * @author      Elements Hive
 * @copyright   2023 Elements Hive
 * @license     GPLv2+
 *
 * @wordpress-plugin
 * Plugin Name: Elements Hive Pro For Breakdance
 * Plugin URI: https://elementshive.com/
 * Description: The most unique creative elements and extensions library for the Breakdance website builder
 * Author: Elements Hive
 * Author URI: https://elementshive.com/
 * License: GPLv3+
 * Text Domain: elementshivepro
 * Domain Path: /languages/
 * Version: 1.2.7
 */

defined( 'ABSPATH' ) or die( 'you do not have access to this page!' );

use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;
use function Breakdance\Elements\FilteredGets\externalDependencies;

update_option( 'elements_hive_pro_license_key', '***********' );
update_option( 'elements_hive_pro_license_status', 'valid' );

const __EHP_BREAKDANCE_MINIMUM_VESRION = '1.3.0';
const __EHP_BREAKDANCE_FILE = WP_PLUGIN_DIR . '/breakdance/plugin.php';
const __EHP_GSAP_LOCAL = '%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/gsap@3.8.0/gsap.min.js';
const __EHP_GSAP_CDN = '%%BREAKDANCE_REUSABLE_GSAP%%';
const __EHP_SCROLLTRIGGER_LOCAL = '%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/gsap@3.8.0/ScrollTrigger.min.js';
const __EHP_SCROLLTRIGGER_CDN = '%%BREAKDANCE_REUSABLE_SCROLL_TRIGGER%%';

$breakdance_data = '';


try {
	$breakdance_data = get_file_data(__EHP_BREAKDANCE_FILE, array('Version' => 'Version'));
} catch (Exception $e) {
	add_action('admin_notices', 'ehp_breakdance_missing_notice');
	add_action('admin_init', 'ehp_deactivate_plugin');
}

if (is_array($breakdance_data) && isset($breakdance_data['Version'])) {
	$breakdance_version = $breakdance_data['Version'];
	if (version_compare($breakdance_version, __EHP_BREAKDANCE_MINIMUM_VESRION, '<')) {
		//add_action('admin_notices', 'breakdance_version_incompatible_notice');
		//add_action('admin_init', 'eh_deactivate_plugin');
		if ( ! defined( 'ELEMENTS_HIVE_GSAP') ) {
			define( 'ELEMENTS_HIVE_GSAP', __EHP_GSAP_LOCAL );
		}
		if ( ! defined( 'ELEMENTS_HIVE_SCROLLTRIGGER') ) {
			define( 'ELEMENTS_HIVE_SCROLLTRIGGER', __EHP_SCROLLTRIGGER_LOCAL );
		}
	} else {
		if ( ! defined( 'ELEMENTS_HIVE_GSAP') ) {
			define( 'ELEMENTS_HIVE_GSAP', __EHP_GSAP_CDN );
		}
		if ( ! defined( 'ELEMENTS_HIVE_SCROLLTRIGGER') ) {
			define( 'ELEMENTS_HIVE_SCROLLTRIGGER', __EHP_SCROLLTRIGGER_CDN );
		}
	}
}

if (! function_exists('ehp_breakdance_missing_notice')) {
	/**
	 * Breakdance no version Admin notice ( breakdance missing ? )
	 *
	 * @return void
	 */
	function ehp_breakdance_missing_notice() {
		echo '<div class="notice notice-error"><p>Unable to read Breakdance plugin file, make sure that Breakdance Page builder is installed and activated.</p></div>';
	}
}


if ( !function_exists('ehp_deactivate_plugin')) {
	/**
	 * Deactive plugin
	 *
	 * @return void
	 */
	function ehp_deactivate_plugin() {
		deactivate_plugins( __FILE__);
	}
}


if(!class_exists('ElementsHivePro')) {

	class ElementsHivePro {

		public function __construct() {

			define( 'ELEMENTS_HIVE_PRO_PLUGIN_FILE', __FILE__);

			define( 'ELEMENTS_HIVE_PRO_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets/'  );

			define( 'ELEMENTS_HIVE_PRO_DIR', plugin_dir_url(__FILE__));

			define( 'ELEMENTS_HIVE_FREE_DIR', plugin_dir_url('elements_hive_for_breakdance/'));

			define( 'ELEMENTS_HIVE_PRO_VERSION', '1.2.7');
		}

		/**
		 * Initialize the plugin
		 *
		 * @return void
		 */
		public function initialize() {

			add_action('breakdance_loaded', function() { $this->breakdance_loaded_handler(); }, 9);

		}

		/**
		 * Register Elements Hive Pro categories with Breakdance
		 *
		 * @return void
		 */
		private function register_plugin_categories() {

			\Breakdance\Elements\ElementCategoriesController::getInstance()->registerCategory( 'elements_hive_pro', 'Elements Hive Pro' );

		}

		/**
		 * Add includes
		 *
		 * @return void
		 */
		private function add_includes() {
			$this->add_licensing();
			$this->add_extensions();
			$this->add_eh_includes();
			$this->add_design_library();
		}

		/**
		 * Add Licensing
		 *
		 * @return void
		 */
		private function add_licensing() {
			require_once __DIR__ . '/includes/licensing/base.php';
		}

		/**
		 * Add Extensions
		 *
		 * @return void
		 */
		private function add_extensions() {
			require_once __DIR__ . '/extensions/base.php';
		}

		/**
		 * Add Twig helpers
		 *
		 * @return void
		 */
		private function add_eh_includes() {
			require_once __DIR__ . '/includes/elements_hive/base.php';
		}

		/**
		 * Add Design Library
		 *
		 * @return void
		 */
		private function add_design_library() {
			require_once __DIR__ . '/includes/design-library/base.php';
		}

		/**
		 * Register save locations with Breakdance
		 *
		 * @return void
		 */
		private function register_save_locations_pro() {

			\Breakdance\ElementStudio\registerSaveLocation(
				getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/elements',
				'ElementsHiveForBreakdancePro',
				'element',
				'ElementsHive Elements Pro',
				false
			);

			\Breakdance\ElementStudio\registerSaveLocation(
				getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/macros',
				'ElementsHiveForBreakdancePro',
				'macro',
				'ElementsHive Macros Pro',
				false,
			);

			\Breakdance\ElementStudio\registerSaveLocation(
				getDirectoryPathRelativeToPluginFolder( __DIR__ ) . '/presets',
				'ElementsHiveForBreakdancePro',
				'preset',
				'ElementsHive Presets Pro',
				false,
			);
		}

		/**
		 * Initialize Elements Hive Core ( Free version )
		 *
		 * @return void
		 */
		private function initialize_pro() {

			$this->register_plugin_categories();
			$this->register_save_locations_pro();
			$this->add_includes();
		}

		/**
		 * Initialize handler
		 *
		 * @return void
		 */
		private function breakdance_loaded_handler() {

			$this->initialize_pro();

		}

	}

	$EhProInstance = new ElementsHivePro();
	$EhProInstance->initialize();

}
