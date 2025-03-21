<?php

namespace Breakdance\Setup;

use Breakdance\Filesystem\Consts;

use Breakdance\Licensing\LicenseKeyManager;
use function Breakdance\Data\get_global_option;
use function Breakdance\Data\set_global_option;
use function Breakdance\Filesystem\clear_bucket_contents;
use function Breakdance\Filesystem\try_to_create_all_required_directories;
use function Breakdance\Framework\Database\Schema\try_to_create_or_update_table_schema;
use function Breakdance\Icons\handle_icons_logic_on_plugin_install_aka_soft_reset;
use function Breakdance\Icons\migrate_icons_from_wp_option_to_db_table;
use function Breakdance\Icons\normalize_icon_names;
use function Breakdance\Icons\set_full_text_for_icons_table;
use function Breakdance\Icons\wpdb;

/**
 * @psalm-suppress UndefinedConstant
 * @psalm-suppress MixedArgument
 */

register_activation_hook(__BREAKDANCE_PLUGIN_FILE__, '\Breakdance\Setup\pluginActivated');

add_action('init', static function () {
    if (is_multisite() && is_admin()) {
        pluginActivated();
        handleVersionChange();
    }
});

// TODO remove this line before releasing any version > 1.3.0
add_action('breakdance_loaded', "\Breakdance\Setup\handleVersionChange");

add_action('upgrader_process_complete', '\Breakdance\Setup\handleUpgraderProcessComplete', 10, 2);

// Clear the global cache if any plugin is activated/deactivated.
add_action('deactivate_plugin', '\Breakdance\Render\deleteGlobalCssAndDependenciesCacheFromWpDb');
add_action('activate_plugin', '\Breakdance\Render\deleteGlobalCssAndDependenciesCacheFromWpDb');

/**
 * @param mixed $upgrader_object
 * @param array{action: string, type: string, plugins: string[]} $options
 * @since 1.3.0
 *
 * Note that this function will only work for any releases > 1.3.0
 */
function handleUpgraderProcessComplete($upgrader_object, $options)
{
    $current_plugin_path_name = plugin_basename(__FILE__);

    if ($options['action'] == 'update' && $options['type'] == 'plugin') {
        foreach ($options['plugins'] as $plugin) {
            if ($plugin == $current_plugin_path_name) {
                handleVersionChange();
            }
        }
    }
}


/**
 * @since v1.3.0
 */
function handleVersionChange()
{
    /**
     * @psalm-suppress UndefinedConstant
     */
    if (__BREAKDANCE_VERSION === '%%VERSION%%') {
        // Dev build
        return;
    }

    /** @var string|false|mixed $last_migrated_version */
    $last_migrated_version = get_global_option('last_migrated_version');

    if (empty($last_migrated_version)) {
        if (hasPluginAlreadyBeenActivated()) {
            // Assume its 1.2.1, the last released version before this function was added
            $last_migrated_version = '1.2.1';
        } else {
            // We're duplicating the installation process
            return;
        }
    } else {
        $last_migrated_version = (string) $last_migrated_version;
    }

    /**
     * @psalm-suppress UndefinedConstant
     */
    if (__BREAKDANCE_VERSION === $last_migrated_version) {
        return;
    }

    /**
     * <Actions performed for every upgrade>
     */
    // @see https://github.com/soflyy/breakdance/pull/5168#issuecomment-1434378453
    clear_bucket_contents(Consts::BREAKDANCE_FS_BUCKET_TWIG_CACHE);

    LicenseKeyManager::getInstance()->refetchStoredLicenseKeyValidityInfo();
    /**
     * </Actions performed for every upgrade>
     */

    // In case last migrated version <= 1.2.1
    if (version_compare($last_migrated_version, '1.2.1', '<=')) {
        init_db_tables();
        migrate_icons_from_wp_option_to_db_table();
    } elseif (version_compare($last_migrated_version, '1.3.0-alpha.1', '==')) {
        // 1.3.0-alpha.1 had issues with creating icon DB tables and migrating icons from WP options, try that again
        // @see https://github.com/soflyy/breakdance/issues/5396
        init_db_tables();
        migrate_icons_from_wp_option_to_db_table();
    }

    /**
     * Add migration logic for further versions below this comment
     * according to the following template:
     *
     * if (version_compare($last_migrated_version, 'ONE VERSION BEFORE THE ONE YOU ARE WORKING ON', '<=')) {
     *   // do your stuff here
     * }
     */
    if (version_compare($last_migrated_version, '2.0.0', '<')) {
        /**
         * @psalm-suppress UndefinedFunction
         */
        prefixBreakdanceMetaKeysWithUnderscore();
    }

    if (version_compare($last_migrated_version, '2.1.0', '<')) {
        // Add fulltext index to breakdance_icons table
        set_full_text_for_icons_table();

        // Rename icons from "icon-{name-here}." to "{name here}" for better compatibility with fulltext search
        normalize_icon_names();
    }

    /**
     * @psalm-suppress UndefinedConstant
     * @psalm-suppress MixedArgument
     */
    set_global_option('last_migrated_version', __BREAKDANCE_VERSION);
}

function init_db_tables()
{
    try_to_create_or_update_table_schema(
        'breakdance_icons',
        <<<SQL
        `id` SERIAL,
        `icon_set_slug` VARCHAR(90) NOT NULL,
        `name` VARCHAR(90) NOT NULL,
        `slug` VARCHAR(90) NOT NULL,
        `svg_code` TEXT NOT NULL,
        PRIMARY KEY `pk_id` (`id`),
        UNIQUE KEY `uq_slug_in_set` (`slug`, `icon_set_slug`)
        SQL
    );

    try_to_create_or_update_table_schema(
        'breakdance_icon_sets',
        <<<SQL
        `slug` VARCHAR(90) NOT NULL,
        `name` VARCHAR(90) NOT NULL,
        PRIMARY KEY `pk_slug` (`slug`)
        SQL
    );
}

function install()
{
    handle_icons_logic_on_plugin_install_aka_soft_reset();
    \Breakdance\Themeless\Fallbacks\set_fallback_defaults_from_filesystem();
}

/**
 * @return bool
 */
function hasPluginAlreadyBeenActivated()
{
    $optionName = 'plugin_has_already_been_activated';

    $plugin_has_already_been_activated = (string) \Breakdance\Data\get_global_option($optionName);

    return $plugin_has_already_been_activated === 'yes';
}

function pluginActivated()
{

    add_action(
        'activated_plugin',
        /**
         * @param string $plugin
         */
        function ($plugin) {
            /**
             * @psalm-suppress UndefinedConstant
             * @var string $pluginFile
             */
            $pluginFile = __BREAKDANCE_PLUGIN_FILE__;
            if ($plugin == plugin_basename($pluginFile)) {
                do_action('breakdance_activated');
            }
        }
    );

    if (hasPluginAlreadyBeenActivated()) {
        return;
    }

    init_db_tables();
    install();
    try_to_create_all_required_directories();
    register_custom_post_types();
    flush_rewrite_rules();

    /**
     * @psalm-suppress UndefinedConstant
     * @psalm-suppress MixedArgument
     */
    set_global_option('last_migrated_version', __BREAKDANCE_VERSION);
    \Breakdance\Data\set_global_option('plugin_has_already_been_activated', 'yes');

    add_action(
        'activated_plugin',
        /**
         * @param string $plugin
         */
        function ($plugin) {
            /**
             * @psalm-suppress UndefinedConstant
             * @var string $pluginFile
             */
            $pluginFile = __BREAKDANCE_PLUGIN_FILE__;
            if ($plugin == plugin_basename($pluginFile)) {
                exit(wp_redirect(admin_url("admin.php?page=breakdance_setup_wizard")));
            }
        }
    );
}

function setInstallUuid()
{
    /** @var string|false $installUuid */
    $installUuid = \Breakdance\Data\get_global_option('uuid') ?? false;
    if (!wp_is_uuid($installUuid)) {
        \Breakdance\Data\set_global_option('uuid', wp_generate_uuid4());
    }
}
add_action('breakdance_loaded', '\Breakdance\Setup\setInstallUuid');
