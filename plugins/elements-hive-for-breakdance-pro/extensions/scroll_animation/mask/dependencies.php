<?php

namespace ElementsHiveForBreakdancePro\Extensions\ScrollAnimation\Mask;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\ScrollAnimation\Mask\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set animationType = settings.elements_hive_pro.scroll_animation.animation_type %}
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
			ELEMENTS_HIVE_PRO_DIR . 'extensions/scroll_animation/mask/assets/js/eh_scroll_animation_mask.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {
				const containerEl = document.querySelector("%%SELECTOR%%")

				if (!containerEl || window.EhInstancesManager.instanceExists("EhScrollAnimationMask", "%%ID%%") ) return

				const settings = {
					style: "{{settings.elements_hive_pro.scroll_animation.mask_style|default("wipe")}}",
					direction: "{{settings.elements_hive_pro.scroll_animation.mask_direction|default("up")}}",
					direction_alternative: "{{settings.elements_hive_pro.scroll_animation.mask_direction_alternative|default("center")}}",
					scroll_direction: "{{settings.elements_hive_pro.scroll_animation.scroll_direction|default(downUp)}}",
					trigger_element: "{{settings.elements_hive_pro.scroll_animation.trigger_element|default("self")}}",
					trigger_selector: `{{settings.elements_hive_pro.scroll_animation.trigger_selector|default()}}`,
					trigger_location: {{settings.elements_hive_pro.scroll_animation.trigger_location|json_encode}},
					is_pinned: {{settings.elements_hive_pro.scroll_animation.is_pinned|default("false")}},
					element_to_pin: "{{settings.elements_hive_pro.scroll_animation.element_to_pin|default("self")}}",
					pin_selector: `{{settings.elements_hive_pro.scroll_animation.pin_selector}}`,
					play_once: {{settings.elements_hive_pro.scroll_animation.play_once|default("false")}},
					disable_pin_spacing: {{settings.elements_hive_pro.scroll_animation.advanced.disable_pin_spacing|default("false")}},
					scrub: {{settings.elements_hive_pro.scroll_animation.advanced.scrub.number|default("true")}},
					ease: "{{settings.elements_hive_pro.scroll_animation.advanced.ease|default("linear")}}",
					disable_at: "{{settings.elements_hive_pro.scroll_animation.advanced.disable_at}}",
					enable_markers: {{settings.elements_hive_pro.scroll_animation.advanced.enable_markers|default("false")}},
				}

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				}

				const instance = new EhScrollAnimationMask(options)
				window.EhInstancesManager.registerInstance("EhScrollAnimationMask", "%%ID%%", instance)
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
				const containerEl = document.querySelector("%%SELECTOR%%")

				if (!containerEl ) return

				const settings = {
					style: "{{settings.elements_hive_pro.scroll_animation.mask_style|default("wipe")}}",
					direction: "{{settings.elements_hive_pro.scroll_animation.mask_direction|default("up")}}",
					direction_alternative: "{{settings.elements_hive_pro.scroll_animation.mask_direction_alternative|default("center")}}",
					scroll_direction: "{{settings.elements_hive_pro.scroll_animation.scroll_direction|default(downUp)}}",
					trigger_element: "{{settings.elements_hive_pro.scroll_animation.trigger_element|default("self")}}",
					trigger_selector: `{{settings.elements_hive_pro.scroll_animation.trigger_selector|default()}}`,
					trigger_location: {{settings.elements_hive_pro.scroll_animation.trigger_location|json_encode}},
					is_pinned: {{settings.elements_hive_pro.scroll_animation.is_pinned|default("false")}},
					element_to_pin: "{{settings.elements_hive_pro.scroll_animation.element_to_pin|default("self")}}",
					pin_selector: `{{settings.elements_hive_pro.scroll_animation.pin_selector}}`,
					play_once: {{settings.elements_hive_pro.scroll_animation.play_once|default("false")}},
					disable_pin_spacing: {{settings.elements_hive_pro.scroll_animation.advanced.disable_pin_spacing|default("false")}},
					scrub: {{settings.elements_hive_pro.scroll_animation.advanced.scrub.number|default("true")}},
					ease: "{{settings.elements_hive_pro.scroll_animation.advanced.ease|default("linear")}}",
					disable_at: "{{settings.elements_hive_pro.scroll_animation.advanced.disable_at}}",
					enable_markers: {{settings.elements_hive_pro.scroll_animation.advanced.enable_markers|default("false")}},
				}

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					...settings
				}

				const instance = new EhScrollAnimationMask(options)

			}());
			',
		],
	];

	return $deps;
}
