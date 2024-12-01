<?php

namespace ElementsHiveForBreakdance\Extensions\MouseEffects\Tilt3D;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseEffects\Tilt3D\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						{% if settings.elements_hive_pro.mouse_effects.tilt_3d.enabled %}
							if(window.EhInstancesManager?.instanceExists('EhTilt3D', '%%ID%%')){
								const containerEl = document.querySelector('%%SELECTOR%%')
								const settings = {{settings.elements_hive_pro.mouse_effects.tilt_3d|json_encode}} ?? {}
								let instance = window.EhInstancesManager.getInstance('EhTilt3D', '%%ID%%')
								instance.container = containerEl
								instance.animateOnContainer = settings?.animate_on_container || false
								instance.maxRotation = {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}}
								instance.direction = {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}}
								instance.speedFactor = {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
								instance.resetState()
								instance.initEvents()
							} else {
								const containerEl = document.querySelector('%%SELECTOR%%')
								const options = {
									container: containerEl,
									animateOnContainer: {{settings.elements_hive_pro.mouse_effects.tilt_3d.animate_on_container|default(false)}},
									maxRotation: {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}},
									direction: {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}},
									speedFactor: {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
								}
								const instance = new EhTilt3d(options)
								window.EhInstancesManager.registerInstance('EhTilt3D', '%%ID%%', instance)
							}
						{% else %}
							if(window.EhInstancesManager?.instanceExists('EhTilt3D', '%%ID%%')) {
								let instance = window.EhInstancesManager.getInstance('EhTilt3D', '%%ID%%')
								instance?.destroy()
								window.EhInstancesManager.deleteInstance('EhTilt3D', '%%ID%%')
								instance = null
							}
						{% endif %}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.mouse_effects.tilt_3d']
			],
		],
	];
	$actions[] = [
		'onMovedElement' => [
			[
				'script' => <<<JS
				( function() {
					{% if settings.elements_hive_pro.mouse_effects.tilt_3d.enabled %}
							if(window.EhInstancesManager?.instanceExists('EhTilt3D', '%%ID%%')){
								const containerEl = document.querySelector('%%SELECTOR%%')
								const settings = {{settings.elements_hive_pro.mouse_effects.tilt_3d|json_encode}} ?? {}
								let instance = window.EhInstancesManager.getInstance('EhTilt3D', '%%ID%%')
								instance.container = containerEl
								instance.animateOnContainer = settings?.animate_on_container || false
								instance.maxRotation = {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}}
								instance.direction = {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}}
								instance.speedFactor = {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
								instance.resetState()
								instance.initEvents()
							} else {
								const containerEl = document.querySelector('%%SELECTOR%%')
								const options = {
									container: containerEl,
									animateOnContainer: {{settings.elements_hive_pro.mouse_effects.tilt_3d.animate_on_container|default(false)}},
									maxRotation: {{settings.elements_hive_pro.mouse_effects.tilt_3d.max_rotation|default(10)}},
									direction: {{settings.elements_hive_pro.mouse_effects.tilt_3d.direction|default(1)}},
									speedFactor: {{settings.elements_hive_pro.mouse_effects.tilt_3d.speed_factor|default(1)}}
								}
								const instance = new EhTilt3d(options)
								window.EhInstancesManager.registerInstance('EhTilt3D', '%%ID%%', instance)
							}
						{% else %}
							if(window.EhInstancesManager?.instanceExists('EhTilt3D', '%%ID%%')) {
								let instance = window.EhInstancesManager.getInstance('EhTilt3D', '%%ID%%')
								instance?.destroy()
								window.EhInstancesManager.deleteInstance('EhTilt3D', '%%ID%%')
								instance = null
							}
						{% endif %}
					}());
				JS,
			],
		],
	];
	return $actions;
}
