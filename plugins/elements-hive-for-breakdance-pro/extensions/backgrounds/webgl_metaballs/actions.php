<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						if ('{{design.elements_hive_pro.backgrounds.background_type}}' == 'webgl_metaballs' ) {
							if ( window.EhInstancesManager?.instanceExists('EhWebglMetaballs', '%%ID%%') ) {
								const containerEl = document.querySelector('%%SELECTOR%%')
								const settings = {{design.elements_hive_pro.backgrounds.webgl_metaballs|json_encode}} ?? {}
								const options = {
									containerEl: containerEl,
									sectionContainer: containerEl.querySelector('.section-container'),
									id: %%ID%%,
									isBuilderMode: true,
									...settings
								}
								window.EhInstancesManager.getInstance('EhWebglMetaballs', '%%ID%%').refresh(options)
							}
						} else {
							if ( window.EhInstancesManager?.instanceExists('EhWebglMetaballs', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhWebglMetaballs', '%%ID%%').destroy()
								window.EhInstancesManager.deleteInstance('EhWebglMetaballs', '%%ID%%')
							}
							document.querySelector('.eh-webgl-metaballs-%%ID%%')?.remove()
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
						if ( window?.EhInstancesManager?.instanceExists('EhWebglMetaballs', '%%ID%%') ) {
								window.EhInstancesManager.getInstance('EhWebglMetaballs', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhWebglMetaballs', '%%ID%%')
							}
							document.querySelector('.eh-webgl-metaballs-%%ID%%')?.remove()
					}());
				JS,
			],
		],
	];


	return $actions;
}
