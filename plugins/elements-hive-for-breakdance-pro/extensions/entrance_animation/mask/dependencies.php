<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Mask;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Mask\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set animationType = settings.elements_hive_pro.entrance_animation.animation_type %}
		return {{ animationType == 'mask' ? 'true' : 'false' }};
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
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'extensions/entrance_animation/mask/assets/js/eh_entrance_animation_mask.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {
				const containerEl = document.querySelector("%%SELECTOR%%");

				if (!containerEl || window.EhInstancesManager.instanceExists("EhEntranceAnimationMask", "%%ID%%") ) return;
				const settings = {
					style: "{{settings.elements_hive_pro.entrance_animation.mask_style}}" || "wipe",
					direction: "{{settings.elements_hive_pro.entrance_animation.mask_direction}}" || "right",
					direction_alternative: "{{settings.elements_hive_pro.entrance_animation.mask_direction_alternative}}" || "center",
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default("false")}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease}}" || "power2.inOut",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
				};

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				};

				const instance = new EhEntranceAnimationMask(options);
				window.EhInstancesManager.registerInstance("EhEntranceAnimationMask", "%%ID%%", instance);
			}());
			',
		],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			'
			 ( function() {
				const containerEl = document.querySelector("%%SELECTOR%%");

				if (!containerEl ) return;

				const settings = {
					style: "{{settings.elements_hive_pro.entrance_animation.mask_style}}" || "wipe",
					direction: "{{settings.elements_hive_pro.entrance_animation.mask_direction}}" || "right",
					direction_alternative: "{{settings.elements_hive_pro.entrance_animation.mask_direction_alternative}}" || "center",
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default("false")}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease}}" || "power2.inOut",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
				};

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				};

				new EhEntranceAnimationMask(options);

			}());
			',
		],
	];

	return $deps;
}
