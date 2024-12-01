<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{design.elements_hive_pro.backgrounds.background_type}}' == 'webgl_liquid_distortion' ) {
							const containerEl = document.querySelector('%%SELECTOR%%')
							const settings = {{design.elements_hive_pro.backgrounds.webgl_liquid_distortion|json_encode}} ?? {}
							let instance = null
							if ( window.EhInstancesManager?.instanceExists('EhWebglLiquidDistortion', '%%ID%%') ) {
								instance = window.EhInstancesManager.getInstance('EhWebglLiquidDistortion', '%%ID%%')
								instance.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglLiquidDistortion', '%%ID%%')
								instance = null
							}
							if (!settings.hasOwnProperty('image')) {
								settings.image = {
									url: '{{getElementsHiveProAssetsUrl()}}images/placeholders/mesh-gradient.webp'
								}
							}
							const options = {
								containerEl: containerEl,
								sectionContainer: containerEl.querySelector('.section-container'),
								id: %%ID%%,
								isBuilderMode: true,
								...settings
							}
							instance = new EhWebglLiquidDistortion(options)
							window.EhInstancesManager.registerInstance("EhWebglLiquidDistortion", "%%ID%%", instance)
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhWebglLiquidDistortion', '%%ID%%') ) {
								window.EhInstancesManager.deleteInstance('EhWebglLiquidDistortion', '%%ID%%')
							}
							document.querySelector('.eh-webgl-liquid-distortion-%%ID%%')?.remove()
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
						if ( window?.EhInstancesManager?.instanceExists('EhWebglLiquidDistortion', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhWebglLiquidDistortion', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglLiquidDistortion', '%%ID%%')
							}
							document.querySelector('.eh-liquid-distortion-%%ID%%')?.remove()
					}());
				JS,
			],
		],
	];

	return $actions;
}
