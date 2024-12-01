<?php

namespace ElementsHiveForBreakdance\Extensions\MouseEffects\MouseTrack;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseEffects\MouseTrack\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						const containerEl = document.querySelector('%%SELECTOR%%')
						{% if settings.elements_hive_pro.mouse_effects.mouse_track.enabled %}
							if(window.EhInstancesManager?.instanceExists('EhMouseTrack', '%%ID%%')){
								// const containerEl = document.querySelector('%%SELECTOR%%')
								const settings = {{settings.elements_hive_pro.mouse_effects.mouse_track|json_encode}} ?? {}
								let instance = window.EhInstancesManager.getInstance('EhMouseTrack', '%%ID%%')
								instance.container = containerEl
								instance.maxDistance = {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}}
								instance.direction = {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}}
								instance.applyDepth = '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}'
								instance.depthAxis = '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}'
								instance.depthFactor = {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
								instance.speedFactor = {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}}
								instance.resetState()
								instance.initEvents()
							} else {
								// const containerEl = document.querySelector('%%SELECTOR%%')
								const options = {
									container: containerEl,
									animateOnContainer: {{settings.elements_hive_pro.mouse_effects.mouse_track.animate_on_container|default(false)}},
									maxDistance: {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}},
									direction: {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}},
									speedFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}},
									applyDepth: '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}',
									depthAxis: '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}',
									depthFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
								}
								const instance = new EhMouseTrack(options)
								window.EhInstancesManager.registerInstance('EhMouseTrack', '%%ID%%', instance)
							}
						{% else %}
							if(window.EhInstancesManager?.instanceExists('EhMouseTrack', '%%ID%%')) {
								let instance = window.EhInstancesManager.getInstance('EhMouseTrack', '%%ID%%')
								instance?.destroy()
								window.EhInstancesManager.deleteInstance('EhMouseTrack', '%%ID%%')
								instance = null
							}
						{% endif %}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.mouse_effects.mouse_track']
			],
		],
	];
	$actions[] = [
		'onMovedElement' => [
			[
				'script' => <<<JS
				( function() {
					{% if settings.elements_hive_pro.mouse_effects.mouse_track.enabled %}
							if(window.EhInstancesManager?.instanceExists('EhMouseTrack', '%%ID%%')){
								const containerEl = document.querySelector('%%SELECTOR%%')
								const settings = {{settings.elements_hive_pro.mouse_effects.mouse_track|json_encode}} ?? {}
								let instance = window.EhInstancesManager.getInstance('EhMouseTrack', '%%ID%%')
								instance.container = containerEl
								instance.animateOnContainer = settings?.animate_on_container || false
								instance.maxDistance = {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}}
								instance.direction = {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}}
								instance.speedFactor = {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}}
								instance.applyDepth = '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}'
								instance.depthAxis = '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}'
								instance.depthFactor = {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
								instance.speedFactor = {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}}
								instance.resetState()
								instance.initEvents()
							} else {
								const containerEl = document.querySelector('%%SELECTOR%%')
								const options = {
									container: containerEl,
									animateOnContainer: {{settings.elements_hive_pro.mouse_effects.mouse_track.animate_on_container|default(false)}},
									maxDistance: {{settings.elements_hive_pro.mouse_effects.mouse_track.max_distance.number|default(10)}},
									direction: {{settings.elements_hive_pro.mouse_effects.mouse_track.direction|default(1)}},
									speedFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.speed_factor|default(0.5)}},
									applyDepth: '{{settings.elements_hive_pro.mouse_effects.mouse_track.apply_depth|default(false)}}',
									depthAxis: '{{settings.elements_hive_pro.mouse_effects.mouse_track.depth_axis|default(x)}}',
									depthFactor: {{settings.elements_hive_pro.mouse_effects.mouse_track.depth_factor|default(1)}},
								}
								const instance = new EhMouseTrack(options)
								window.EhInstancesManager.registerInstance('EhMouseTrack', '%%ID%%', instance)
							}
						{% else %}
							if(window.EhInstancesManager?.instanceExists('EhMouseTrack', '%%ID%%')) {
								let instance = window.EhInstancesManager.getInstance('EhMouseTrack', '%%ID%%')
								instance?.destroy()
								window.EhInstancesManager.deleteInstance('EhMouseTrack', '%%ID%%')
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
