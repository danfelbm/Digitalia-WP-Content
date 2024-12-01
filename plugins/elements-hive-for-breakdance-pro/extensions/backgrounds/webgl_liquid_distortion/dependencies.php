<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive_pro.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_liquid_distortion' ? 'true' : 'false' }};
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
			ELEMENTS_HIVE_PRO_DIR . 'extensions/backgrounds/webgl_liquid_distortion/assets/js/eh_webgl_liquid_distortion.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {
				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive_pro.backgrounds.webgl_liquid_distortion|json_encode}} ?? {};

				if (!containerEl ) return;

  				if ( window.EhInstancesManager.instanceExists("EhWebglLiquidDistortion", "%%ID%%") ) return;
				if (!settings.hasOwnProperty("image")) {
					settings.image = {
						url: "{{getElementsHiveProAssetsUrl()}}images/placeholders/mesh-gradient.webp"
					}
				};
				const options = {
					containerEl: containerEl,
					sectionContainer: containerEl.querySelector(".section-container"),
					id: %%ID%%,
					isBuilderMode: true,
					...settings
				};

				const instance = new EhWebglLiquidDistortion(options);
				window.EhInstancesManager.registerInstance("EhWebglLiquidDistortion", "%%ID%%", instance);

				const resizeObserver = new ResizeObserver( (entries) => {
					setTimeout( () => {
						instance.onResize();
					}, 500 )
				})

				resizeObserver.observe(containerEl.parentElement);

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
				if (!containerEl ) return;
				const settings = {{design.elements_hive_pro.backgrounds.webgl_liquid_distortion|json_encode}} ?? {};
				if ( settings?.disable_on_touch_devices && "ontouchstart" in window ) return;
				function init() {
					if (!settings.hasOwnProperty("image")) {
						settings.image = {
							url: "{{getElementsHiveProAssetsUrl()}}images/placeholders/mesh-gradient.webp"
						}
					}
					const options = {
						containerEl: containerEl,
						sectionContainer: containerEl.querySelector(".section-container"),
						id: %%ID%%,
						...settings
					};
					new EhWebglLiquidDistortion(options);
				}
				const modulePath = "{{getElementsHiveProPluginUrl()}}extensions/backgrounds/webgl_liquid_distortion/assets/js/eh_webgl_liquid_distortion.min.js";

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
