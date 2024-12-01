<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Mask;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Mask\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'mask' ) {
							if(window.EhInstancesManager.instanceExists("EhEntranceAnimationMask", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationMask", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationMask", "%%ID%%")
							}
							const containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
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
							}
							const options = {
								containerEl,
								id: %%ID%%,
								...settings
							}
							const instance = new EhEntranceAnimationMask(options)
							window.EhInstancesManager.registerInstance("EhEntranceAnimationMask", "%%ID%%", instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhEntranceAnimationMask', '%%ID%%') ) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationMask", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationMask', '%%ID%%')
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
						if(window?.EhInstancesManager?.instanceExists("EhEntranceAnimationMask", "%%ID%%")) {
							window.EhInstancesManager.getInstance("EhEntranceAnimationMask", "%%ID%%")?.destroy()
							window.EhInstancesManager.deleteInstance("EhEntranceAnimationMask", "%%ID%%")
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
						if ('{{settings.elements_hive_pro.entrance_animation.animation_type}}' == 'mask' ) {
							if(window.EhInstancesManager.instanceExists("EhEntranceAnimationMask", "%%ID%%")) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationMask", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance("EhEntranceAnimationMask", "%%ID%%")
							}
							const containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl ) return
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
							}
							const options = {
								containerEl,
								id: %%ID%%,
								...settings
							}
							const instance = new EhEntranceAnimationMask(options)
							window.EhInstancesManager.registerInstance("EhEntranceAnimationMask", "%%ID%%", instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhEntranceAnimationMask', '%%ID%%') ) {
								window.EhInstancesManager.getInstance("EhEntranceAnimationMask", "%%ID%%")?.destroy()
								window.EhInstancesManager.deleteInstance('EhEntranceAnimationMask', '%%ID%%')
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
