<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\Tilt3D;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\MouseEffects\Tilt3D\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "return {{settings.elements_hive_pro.mouse_effects.tilt_3d.enabled|default(false)}};";
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
			ELEMENTS_HIVE_PRO_DIR . 'extensions/mouse_effects/tilt_3d/assets/js/eh_tilt_3d.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {
				const containerEl = document.querySelector('%%SELECTOR%%');
                if (!containerEl || window.EhInstancesManager.instanceExists('EhTilt3D', '%%ID%%')) return;
                const options = {
                   container: containerEl,
                   animateOnContainer: {{settings.elements_hive_pro.mouse_effects.tilt_3d.animate_on_container|default(false)}},
                   maxRotation: {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}},
                   direction: {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}},
                   speedFactor: {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
                };

                const instance = new EhTilt3d(options);

                window.EhInstancesManager.registerInstance('EhTilt3D', '%%ID%%', instance);

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

                const settings = {{settings.elements_hive_pro.mouse_effects.tilt_3d|json_encode}} ?? {};
                if ( settings?.disable_on_touch_devices && window.ElementsHiveUtils.isTouchDevice() ) return;

                async function init() {
                    await import('{{getElementsHiveProPluginUrl()}}extensions/mouse_effects/tilt_3d/assets/js/eh_tilt_3d.min.js');
                    const options = {
                        container: containerEl,
                        animateOnContainer: settings?.animate_on_container,
                        maxRotation: {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}},
                        direction: {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}},
                        speedFactor: {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
                    };

                    const instance = new EhTilt3d(options);
                }

                init()
            }());
            ",
        ],
	];

	return $deps;
}
