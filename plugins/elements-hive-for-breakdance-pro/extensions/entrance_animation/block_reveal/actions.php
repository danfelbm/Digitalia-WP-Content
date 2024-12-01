<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'block_reveal' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
							if( containerEl.closest(".bde-advanced-tabs") ||
								containerEl.closest(".bde-accordion")
							) return
							if(window.EhInstancesManager.instanceExists("EhEntranceAnimationBlockReveal", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationBlockReveal", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationBlockReveal", "%%ID%%")
							}
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
							}
							{% for layer in settings.elements_hive_pro.entrance_animation.block_layers %}
								{% if layer.color.value is empty %}
									settings.block_layers.push({type: "solid", color: "{{layer.color}}"})
								{% else %}
									settings.block_layers.push({type: "gradient", color: "{{layer.color.value}}"})
								{% endif %}
							{% endfor %}
							const options = {
								containerEl,
								id: %%ID%%,
								isBuilder: true,
								...settings
							}
							const instance = new EhEntranceAnimationBlockReveal(options)
							window.EhInstancesManager.registerInstance('EhEntranceAnimationBlockReveal', '%%ID%%', instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhEntranceAnimationBlockReveal', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhEntranceAnimationBlockReveal', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationBlockReveal', '%%ID%%')
							}
						}
					}());
				JS,
				'dependencies' => [
					'settings.elements_hive_pro.entrance_animation',
					'settings.advanced.wrapper.size',
					'design.size',
					'design.container',
					'design.icon.size',
					'design.custom.size',
					'design.wrapper',
					'design.image',
					'design.slider',
					'design.layout',
					'design.svg',
					'design.media',

				]
			],
		],
	];
	// $actions[] = [
	// 	'onPropertyChange' => [
	// 		[
	// 			'script' => <<<JS
	// 				( function() {
	// 					window?.EhInstancesManager?.getInstance("EhEntranceAnimationBlockReveal", "%%ID%%")?.updateWrapperStyles()
	// 				}());
	// 			JS,
	// 		],
	// 	],
	// ];
	$actions[] = [
		'onBeforeDeletingElement' => [
			[
				'script' => <<<JS
					( function() {
						if(window?.EhInstancesManager?.instanceExists("EhEntranceAnimationBlockReveal", "%%ID%%")) {
							window.EhInstancesManager.getInstance("EhEntranceAnimationBlockReveal", "%%ID%%")?.destroy()
							window.EhInstancesManager.deleteInstance("EhEntranceAnimationBlockReveal", "%%ID%%")
						}
					}());
				JS,
			],
		],
	];
	$actions[] = [
		'onMountedElement' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'block_reveal' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
							if( containerEl.closest(".bde-advanced-tabs") ||
								containerEl.closest(".bde-accordion")
							) return
							if(window?.EhInstancesManager?.instanceExists("EhEntranceAnimationBlockReveal", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationBlockReveal", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationBlockReveal", "%%ID%%")
							}
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
							}
							{% for layer in settings.elements_hive_pro.entrance_animation.block_layers %}
								{% if layer.color.value is empty %}
									settings.block_layers.push({type: "solid", color: "{{layer.color}}"})
								{% else %}
									settings.block_layers.push({type: "gradient", color: "{{layer.color.value}}"})
								{% endif %}
							{% endfor %}
							const options = {
								containerEl,
								id: %%ID%%,
								isBuilder: true,
								...settings
							}
							const instance = new EhEntranceAnimationBlockReveal(options)
							window.EhInstancesManager.registerInstance("EhEntranceAnimationBlockReveal", "%%ID%%", instance)
							// not the cleanest
							document.querySelectorAll('%%SELECTOR%%').forEach(element => {
								if(element.parentElement.classList.contains('eh-entrance-animation-block-reveal__wrapper')) return
								element.remove()
							});
						} else {
							if ( window?.EhInstancesManager?.instanceExists('EhEntranceAnimationBlockReveal', '%%ID%%') ) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationBlockReveal", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationBlockReveal', '%%ID%%')
							}
						}
					}());
				JS,
			],
		],
	];
	return $actions;
}
