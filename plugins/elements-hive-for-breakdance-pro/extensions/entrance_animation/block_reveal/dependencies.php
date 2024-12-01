<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set animationType = settings.elements_hive_pro.entrance_animation.animation_type %}
		return {{ animationType == 'block_reveal' ? 'true' : 'false' }};
	";
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_GSAP,
			ELEMENTS_HIVE_SCROLLTRIGGER,
			BREAKDANCE_PLUGIN_URL . 'plugin/global-scripts/breakdance-utils.js'
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
			ELEMENTS_HIVE_PRO_DIR . 'extensions/entrance_animation/block_reveal/assets/js/eh_entrance_animation_block_reveal.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {

				const containerEl = document.querySelector("%%SELECTOR%%");

				if( containerEl.closest(".bde-advanced-tabs") ||
					containerEl.closest(".bde-accordion")
				) return;

				if (!containerEl || window.EhInstancesManager.instanceExists("EhEntranceAnimationBlockReveal", "%%ID%%") ) return;
				const settings = {
					animation_type: "{{settings.elements_hive_pro.entrance_animation.animation_type}}",
					direction: "{{settings.elements_hive_pro.entrance_animation.direction|default("left")}}",
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default(false)}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					layers_delay: {{settings.elements_hive_pro.entrance_animation.layers_delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease|default("linear")}}",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
					block_reveal_style: "{{settings.elements_hive_pro.entrance_animation.block_reveal_style|default("style_1")}}",
					block_layers: []
				};
				{% for layer in settings.elements_hive_pro.entrance_animation.block_layers %}
					{% if layer.color.value is empty %}
						settings.block_layers.push({type: "solid", color: "{{layer.color}}"});
					{% else %}
						settings.block_layers.push({type: "gradient", color: "{{layer.color.value}}"});
					{% endif %}
				{% endfor %}

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					isBuilder: true,
					...settings
				};

				const instance = new EhEntranceAnimationBlockReveal(options);
				window.EhInstancesManager.registerInstance("EhEntranceAnimationBlockReveal", "%%ID%%", instance);

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
				let containerEl = document.querySelector("%%SELECTOR%%");
				if (!containerEl ) return;

				if(containerEl.classList.contains(".bde-accordion__content-wrapper")) {
					const panel = containerEl.querySelector(".bde-accordion__panel");
					containerEl = panel;
				}

				const settings = {
					direction: "{{settings.elements_hive_pro.entrance_animation.direction|default("left")}}",
					trigger_location: {{settings.elements_hive_pro.entrance_animation.trigger_location|default(0)}},
					enable_markers: {{settings.elements_hive_pro.entrance_animation.enable_markers|default("false")}},
					duration: {{settings.elements_hive_pro.entrance_animation.duration|json_encode()}},
					delay: {{settings.elements_hive_pro.entrance_animation.delay|json_encode()}},
					layers_delay: {{settings.elements_hive_pro.entrance_animation.layers_delay|json_encode()}},
					ease: "{{settings.elements_hive_pro.entrance_animation.ease|default("linear")}}",
					play_once: {{settings.elements_hive_pro.entrance_animation.once|default("false")}},
					block_reveal_style: "{{settings.elements_hive_pro.entrance_animation.block_reveal_style|default("style_1")}}",
					block_layers: []
				};
				{% for layer in settings.elements_hive_pro.entrance_animation.block_layers %}
					{% if layer.color.value is empty %}
						settings.block_layers.push({type: "solid", color: "{{layer.color}}"});
					{% else %}
						settings.block_layers.push({type: "gradient", color: "{{layer.color.value}}"});
					{% endif %}
				{% endfor %}

				const options = {
					containerEl: containerEl,
					id: %%ID%%,
					isBuilder: false,
					...settings
				};

				new EhEntranceAnimationBlockReveal(options);

			}());
			',
		],
	];

	return $deps;
}
