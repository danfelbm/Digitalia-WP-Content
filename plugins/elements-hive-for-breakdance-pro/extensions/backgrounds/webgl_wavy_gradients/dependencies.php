<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive_pro.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_wavy_gradients' ? 'true' : 'false' }};
	";
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'extensions/backgrounds/webgl_wavy_gradients/assets/js/eh_webgl_wavy_gradients.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {

				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive_pro.backgrounds.webgl_wavy_gradients|json_encode}} ?? {};

				if (!containerEl ) return;

  				if ( window.EhInstancesManager.instanceExists("EhWebglWavyGradients", "%%ID%%") ) return;

				const options = {
					containerEl: containerEl,
					sectionContainer: containerEl.querySelector(".section-container"),
					id: %%ID%%,
					isBuilderMode: true,
					...settings
				};

				const instance = new EhWebglWavyGradients(options);
				window.EhInstancesManager.registerInstance("EhWebglWavyGradients", "%%ID%%", instance);

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

				const containerEl = document.querySelector("%%SELECTOR%%");
				if (!containerEl ) return
				const settings = {{design.elements_hive_pro.backgrounds.webgl_wavy_gradients|json_encode}} ?? {};
				if ( settings?.disable_on_touch_devices && "ontouchstart" in window ) return;
				function init() {
					const options = {
						containerEl: containerEl,
						sectionContainer: containerEl.querySelector(".section-container"),
						id: %%ID%%,
						...settings
					};
					new EhWebglWavyGradients(options);
				}
				const modulePath = "{{getElementsHiveProPluginUrl()}}extensions/backgrounds/webgl_wavy_gradients/assets/js/eh_webgl_wavy_gradients.min.js";

				import(modulePath)
					.then(module => {
						init();
					})
					.catch(err => {
						console.log("WebGL Liquid Distortion Background, could not load module", err);
					})
			}());
			',
		],
	];

	return $deps;
}
