<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "return {{settings.elements_hive_pro.mouse_effects.mouse_track.enabled|default(false)}};";
    $deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
            ELEMENTS_HIVE_PRO_DIR . 'assets/js/eh-dependencies/eh_global_utils.min.js',
		],
	];
    $deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
            ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',
			ELEMENTS_HIVE_PRO_DIR . 'extensions/mouse_effects/mouse_track/assets/js/eh_mouse_track.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {
				const containerEl = document.querySelector('%%SELECTOR%%');
                if (!containerEl || window.EhInstancesManager.instanceExists('EhMouseTrack', '%%ID%%')) return;
                const options = {
                   container: containerEl,
                   maxDistance: {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}},
                   direction: {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}},
                   speedFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}},
                   applyDepth: '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}',
                   depthAxis: '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}',
                   depthFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
                };

                const instance = new EhMouseTrack(options);

                window.EhInstancesManager.registerInstance('EhMouseTrack', '%%ID%%', instance);

			}());
			",
		],
    ];
    $deps[] = [
        'frontendCondition' => $condition,
        'builderCondition' => 'return false;',
        'inlineScripts' => [
            "
                ( function() {
                const containerEl = document.querySelector('%%SELECTOR%%');
                if (!containerEl) return;

                const settings = {{settings.elements_hive_pro.mouse_effects.mouse_track|json_encode}} ?? {};
                if ( settings?.disable_on_touch_devices && window.ElementsHiveUtils.isTouchDevice() ) return;

                async function init() {
                    await import('{{getElementsHiveProPluginUrl()}}extensions/mouse_effects/mouse_track/assets/js/eh_mouse_track.min.js');
                    const options = {
                        container: containerEl,
                        animateOnContainer: settings?.animate_on_container,
                        maxDistance: {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}},
                        direction: {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}},
                        speedFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}},
                        applyDepth: '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}',
						depthAxis: '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}',
                        depthFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
                    };
                    new EhMouseTrack(options);
                }
                init();
            }());
            ",
        ],
	];

	return $deps;
}
