<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set animationType = settings.elements_hive_pro.entrance_animation.animation_type %}
		return {{ animationType == 'displacement' ? 'true' : 'false' }};
	";
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_GSAP,
			ELEMENTS_HIVE_SCROLLTRIGGER,
			BREAKDANCE_PLUGIN_URL . 'plugin/global-scripts/breakdance-utils.js',
			ELEMENTS_HIVE_PRO_DIR . 'assets/js/eh-dependencies/eh_global_utils.min.js'
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'extensions/entrance_animation/displacement/assets/js/eh_entrance_animation_displacement.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {
				let containerEl = document.querySelector("%%SELECTOR%%");

				if (!containerEl || window.EhInstancesManager.instanceExists("EhEntranceAnimationDisplacement", "%%ID%%") ) return;


				const settings = {
					displacement_style: "{{settings.elements_hive_pro.entrance_animation.displacement_style|default(style_1)}}",
					direction: "{{settings.elements_hive_pro.entrance_animation.direction|default(left)}}",
					distance: {{settings.elements_hive_pro.entrance_animation.distance|json_encode()}},
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default(false)}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease|default(circ.inOut)}}",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
				};

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				};

				const instance = new EhEntranceAnimationDisplacement(options);
				window.EhInstancesManager.registerInstance("EhEntranceAnimationDisplacement", "%%ID%%", instance);

			}());
			',
		],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			'
			 ( async function() {
				let containerEl = document.querySelector("%%SELECTOR%%");

				if (!containerEl ) return;

				if ( {{settings.elements_hive_pro.entrance_animation.disable_on_webkit|default("false")}}
						&& window.ElementsHiveUtils.browser.engine === "webkit" ) {
							containerEl.style.opacity = 1;
							return;
				}

				await import("{{getElementsHiveProPluginUrl()}}extensions/entrance_animation/displacement/assets/js/eh_entrance_animation_displacement.min.js");

				const settings = {
					displacement_style: "{{settings.elements_hive_pro.entrance_animation.displacement_style|default(style_1)}}",
					direction: "{{settings.elements_hive_pro.entrance_animation.direction|default(left)}}",
					distance: {{settings.elements_hive_pro.entrance_animation.distance|json_encode()}},
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default("false")}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease|default(circ.inOut)}}",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
				};

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				};

				new EhEntranceAnimationDisplacement(options);

			}());
			',
		],
	];

	return $deps;
}
