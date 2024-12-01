<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{design.elements_hive_pro.backgrounds.background_type}}' == 'webgl_wavy_gradients' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							const settings = {{design.elements_hive_pro.backgrounds.webgl_wavy_gradients|json_encode}} ?? {}
							let instance = null
							if ( window.EhInstancesManager.instanceExists('EhWebglWavyGradients', '%%ID%%') ) {
								instance = window.EhInstancesManager.getInstance('EhWebglWavyGradients', '%%ID%%')
								instance.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglWavyGradients', '%%ID%%')
								instance = null
							}
							const options = {
								containerEl: containerEl,
								sectionContainer: containerEl.querySelector('.section-container'),
								id: %%ID%%,
								...settings
							}
							instance = new EhWebglWavyGradients(options)
							window.EhInstancesManager.registerInstance("EhWebglWavyGradients", "%%ID%%", instance)
						} else {
							if ( window?.EhInstancesManager?.instanceExists('EhWebglWavyGradients', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhWebglWavyGradients', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglWavyGradients', '%%ID%%')
							}
							document.querySelector('.eh-webgl-wavy-gradients-%%ID%%')?.remove()
						}
					}());
				JS,
				'dependencies' => ['design.elements_hive_pro.backgrounds']
			],
		],
	];
	$actions[] = [
		'onBeforeDeletingElement' => [
			[
				'script' => <<<JS
					( function() {
						if ( window?.EhInstancesManager?.instanceExists('EhWebglWavyGradients', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhWebglWavyGradients', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglWavyGradients', '%%ID%%')
							}
							document.querySelector('.eh-webgl-wavy-gradients-%%ID%%')?.remove()
					}());
				JS,
			],
		],
	];
	return $actions;
}
