<?php

namespace Breakdance\Data;

use function Breakdance\Admin\is_breakdance_available;
use function Breakdance\Data\GlobalRevisions\add_new_revision;
use function Breakdance\Data\GlobalRevisions\load_revisions_list;
use function Breakdance\GlobalSettings\typographyPathToPresets;

use const Breakdance\Data\GlobalRevisions\BREAKDANCE_N_OF_LAST_REVISIONS_TO_KEEP;
use const Breakdance\Data\GlobalRevisions\BREAKDANCE_REVISION_TYPE_GLOBAL_SETTINGS;
use const Breakdance\Data\GlobalRevisions\BREAKDANCE_REVISION_TYPE_SELECTORS;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'breakdance_save',
        '\Breakdance\Data\save_document',
        'edit',
        false,
        [
            'args' => [
                'tree' => FILTER_UNSAFE_RAW,
                'globalSettings' => FILTER_UNSAFE_RAW,
                'classes' => FILTER_UNSAFE_RAW,
                'presets' => FILTER_UNSAFE_RAW,
                'ai' => FILTER_UNSAFE_RAW,
                'id' => FILTER_VALIDATE_INT
            ],
        ]
    );
});

/**
 * @param string $tree
 * @param string $newGlobalSettings
 * @param string $classes
 * @param string $presets
 * @param string $ai
 * @param int $id
 * @return void|array
 */
function save_document($tree, $newGlobalSettings, $classes, $presets, $ai, $id)
{
    set_meta(
        $id,
        '_breakdance_data',
        [
            'tree_json_string' => $tree,
        ]
    );

    /**
     * the below filters are experimental and should always be noted as such in documentation
     * they may be removed in a future version
     */
    if (apply_filters('breakdance_save_global_settings', true)) {
        save_global_settings($newGlobalSettings, $classes);
    }

    if (apply_filters('breakdance_save_presets', true)) {
        save_presets($presets);
    }

    if (apply_filters('breakdance_save_selectors', true)) {
        set_global_option('breakdance_classes_json_string', $classes);
    }

    if (apply_filters('breakdance_save_ai_settings', true)) {
        if (function_exists('Breakdance\\AI\\saveSettings')) {
            \Breakdance\AI\saveSettings($ai);
        }
    }

    /* this updates the last modified date and also triggers a
    revision to save (thanks to the code in the revisions folder) */
    wp_update_post(['ID' => $id]);

    \Breakdance\Render\generateCacheForPost($id);

    do_action("breakdance_after_save_document", $id);
}

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'breakdance_save_global_settings',
        '\Breakdance\Data\save_global_settings',
        'edit',
        false,
        ['args' => ['globalSettings' => FILTER_UNSAFE_RAW]]
    );
});

/**
 * @param string $newGlobalSettings
 * @param ?string $newClasses
 * @return void|array
 */
function save_global_settings($newGlobalSettings, $newClasses = null)
{
    $regenerateCache = false;

    /** @var false|string $currentGlobalSettings */
    $currentGlobalSettings = get_global_option('global_settings_json_string');

    if ($newGlobalSettings !== $currentGlobalSettings) {

        /** @var array|null * */
        $currentGlobalSettingsTypography = $currentGlobalSettings
            ? readFromArrayByPath(
                json_decode($currentGlobalSettings, true),
                typographyPathToPresets()
            )
            ?? false
            : false;

        /** @var array|null $newGlobalSettingsTypography */
        $newGlobalSettingsTypography = readFromArrayByPath(
            json_decode($newGlobalSettings, true),
            typographyPathToPresets()
        )
            ?? false;

        /**
         * The CSS of elements can depend on Global Settings. So if it Global Settings change, all CSS must be destroyed and re-generated
         * (happens on save or frontend visit)
         *
         * Currently only Typography Presets affect elements
         *
         * TODO: do we want this check? Right now I know it's only presets, but if someone uses globalSettings in twig,
         * they wouldn't know they had to change this.
         *
         * Oh the other hand, destroying all cache for nothing is painful.
         */
        if (
            $currentGlobalSettingsTypography &&
            $newGlobalSettingsTypography &&
            $currentGlobalSettingsTypography !== $newGlobalSettingsTypography
        ) {
            \Breakdance\Render\clearAllCssCachesAndDeleteCachedFiles();
        }

        $currentRevisions = load_revisions_list(BREAKDANCE_REVISION_TYPE_GLOBAL_SETTINGS);
        if (!sizeof($currentRevisions) && $currentGlobalSettings) {
            add_new_revision($currentGlobalSettings, BREAKDANCE_REVISION_TYPE_GLOBAL_SETTINGS);
        }

        set_global_option('global_settings_json_string', $newGlobalSettings);

        add_new_revision($newGlobalSettings, BREAKDANCE_REVISION_TYPE_GLOBAL_SETTINGS);

        $regenerateCache = true;
    }

    /** @var false|string $currentCssSelectors */
    $currentCssSelectors = get_global_option('breakdance_classes_json_string');

    if ($newClasses !== null && $currentCssSelectors !== $newClasses) {
        $currentRevisions = load_revisions_list(BREAKDANCE_REVISION_TYPE_SELECTORS);
        if (!sizeof($currentRevisions) && $currentCssSelectors) {
            add_new_revision($currentCssSelectors, BREAKDANCE_REVISION_TYPE_SELECTORS);
        }

        set_global_option('breakdance_classes_json_string', $newClasses);

        add_new_revision($newClasses, BREAKDANCE_REVISION_TYPE_SELECTORS);

        $regenerateCache = true;
    }

    if ($regenerateCache) {
        \Breakdance\Render\generateCacheForGlobalSettings();
    }
}

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'breakdance_save_selectors',
        '\Breakdance\Data\save_selectors',
        'edit',
        false,
        ['args' => ['selectors' => FILTER_UNSAFE_RAW]]
    );
});

/**
 * @param string $classes
 * @return void
 */
function save_selectors($classes)
{
    /** @var false|string $currentCssSelectors */
    $currentCssSelectors = get_global_option('breakdance_classes_json_string');

    $currentRevisions = load_revisions_list(BREAKDANCE_REVISION_TYPE_SELECTORS);
    if (!sizeof($currentRevisions) && $currentCssSelectors) {
        add_new_revision($currentCssSelectors, BREAKDANCE_REVISION_TYPE_SELECTORS);
    }

    set_global_option('breakdance_classes_json_string', $classes);

    add_new_revision($classes, BREAKDANCE_REVISION_TYPE_SELECTORS);

    \Breakdance\Render\generateCacheForGlobalSettings();
}

/**
 * @param int $numberOfRevisionsToRetain
 * @param \WP_Post $post
 * @return int
 */
function remove_extra_revisions($numberOfRevisionsToRetain, $post)
{
    $postHasBreakdanceContent = !empty(get_post_meta($post->ID, '_breakdance_data'));
    $limitRevisions = (bool) \Breakdance\Data\get_global_option('breakdance_settings_enable_revision_limit');
    if ($postHasBreakdanceContent && $limitRevisions) {
        return (int) \Breakdance\Data\get_global_option('breakdance_settings_revision_limit') ?: BREAKDANCE_N_OF_LAST_REVISIONS_TO_KEEP;
    }

    return $numberOfRevisionsToRetain;
}
add_filter('wp_revisions_to_keep', '\Breakdance\Data\remove_extra_revisions', 10, 2);

add_action(
    'breakdance_after_save_document',
    /**
     * @param int $id
     */
    function ($id) {
        clean_post_cache($id);
    }
);
