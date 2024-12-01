<?php

// namespace ElementsHiveForBreakdancePro\Licensing;

// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
define( 'ELEMENTS_HIVE_PRO_STORE_URL', 'https://elementshive.com/' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the download ID for the product in Easy Digital Downloads
define( 'ELEMENTS_HIVE_PRO_ITEM_ID', 1426 ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of the product in Easy Digital Downloads
define( 'ELEMENTS_HIVE_PRO_ITEM_NAME', 'Elements Hive Pro' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of the settings page for the license input to be displayed
define( 'ELEMENTS_HIVE_PRO_PLUGIN_LICENSE_PAGE', 'elements-hive-pro' );

if ( ! class_exists( 'Elements_Hive_Pro_Plugin_Updater' ) ) {
	// load our custom updater
	include __DIR__  . '/elements_hive_pro_plugin_updater.php';
}

/**
 * Initialize the updater. Hooked into `init` to work with the
 * wp_version_check cron job, which allows auto-updates.
 */
function elements_hive_pro_plugin_updater() {

	// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
	$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
	if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
		return;
	}

	// retrieve our license key from the DB
	$license_key = trim( get_option( 'elements_hive_pro_license_key' ) );

	// setup the updater
	$edd_updater = new Elements_Hive_Pro_Plugin_Updater(
		ELEMENTS_HIVE_PRO_STORE_URL,
		ELEMENTS_HIVE_PRO_PLUGIN_FILE,
		array(
			'version' => ELEMENTS_HIVE_PRO_VERSION,                    // current version number
			'license' => $license_key,             // license key (used get_option above to retrieve from DB)
			'item_id' => ELEMENTS_HIVE_PRO_ITEM_ID,       // ID of the product
			'author'  => 'Elements Hive', // author of this plugin
			'beta'    => false,
		)
	);

}
add_action( 'init', 'elements_hive_pro_plugin_updater');
