<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'displacement' ) {
							if(window.EhInstancesManager.instanceExists("EhEntranceAnimationDisplacement", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationDisplacement", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationDisplacement", "%%ID%%")
							}
							let containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
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
							}
							const options = {
								containerEl,
								id: %%ID%%,
								...settings
							}
							const instance = new EhEntranceAnimationDisplacement(options)
							window.EhInstancesManager.registerInstance("EhEntranceAnimationDisplacement", "%%ID%%", instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhEntranceAnimationDisplacement', '%%ID%%') ) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationDisplacement", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationDisplacement', '%%ID%%')
							}
						}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.entrance_animation']
			],
		],
	];
	$actions[] = [
		'onBeforeDeletingElement' => [
			[
				'script' => <<<JS
					( function() {
						if(window?.EhInstancesManager?.instanceExists("EhEntranceAnimationDisplacement", "%%ID%%")) {
							window.EhInstancesManager.getInstance("EhEntranceAnimationDisplacement", "%%ID%%")?.destroy()
							window.EhInstancesManager.deleteInstance("EhEntranceAnimationDisplacement", "%%ID%%")
						}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.entrance_animation']
			],
		],
	];
	$actions[] = [
		'onMountedElement' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'displacement' ) {
							if(window.EhInstancesManager.instanceExists("EhEntranceAnimationDisplacement", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationDisplacement", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationDisplacement", "%%ID%%")
							}
							let containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
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
							}
							const options = {
								containerEl,
								id: %%ID%%,
								...settings
							}
							const instance = new EhEntranceAnimationDisplacement(options)
							window.EhInstancesManager.registerInstance("EhEntranceAnimationDisplacement", "%%ID%%", instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhEntranceAnimationDisplacement', '%%ID%%') ) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationDisplacement", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationDisplacement', '%%ID%%')
							}
						}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.entrance_animation']
			],
		],
	];
	return $actions;
}
