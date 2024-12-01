<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		{% set backgroundType = design.elements_hive_pro.backgrounds.background_type %}
		return {{ backgroundType == 'webgl_metaballs' ? 'true' : 'false' }};
	";
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'assets/js/eh-dependencies/eh_global_utils.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
			ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',
			ELEMENTS_HIVE_PRO_DIR . 'extensions/backgrounds/webgl_metaballs/assets/js/eh_webgl_metaballs.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			'
			 ( function() {

				if(document.querySelector(".eh-webgl-metaballs") && !document.querySelector(".eh-webgl-metaballs-%%ID%%")) {
					window.parent.Breakdance.NotificationLogger.log.message(
						`Another instance of the WebGL Metaballs extension is already enabled on this page. Consider using
						only 1 instance per page if you care about rendering performance on mobile and low-end devices`
					);
				}
				const containerEl = document.querySelector("%%SELECTOR%%");
				const settings = {{design.elements_hive_pro.backgrounds.webgl_metaballs|json_encode}} ?? {};

				if (!containerEl ) return;

  				if ( window.EhInstancesManager.instanceExists("EhWebglMetaballs", "%%ID%%") ) return;



				const options = {
					containerEl: containerEl,
					sectionContainer: containerEl.querySelector(".section-container"),
					id: %%ID%%,
					isBuilder: true,
					...settings
				};

				const instance = new EhWebglMetaballs(options);
				window.EhInstancesManager.registerInstance("EhWebglMetaballs", "%%ID%%", instance);

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
				const settings = {{design.elements_hive_pro.backgrounds.webgl_metaballs|json_encode}} ?? {};
				if ( settings?.disable_on_touch_devices && window.ElementsHiveUtils.isTouchDevice() ||
					 window.ElementsHiveUtils.browser.isRenderUpdateNone ) return;

				function init() {
					const options = {
						containerEl: containerEl,
						sectionContainer: containerEl.querySelector(".section-container"),
						id: %%ID%%,
						isBuilder: false,
						...settings
					};
					new EhWebglMetaballs(options);
				}

				const modulePath = "{{getElementsHiveProPluginUrl()}}extensions/backgrounds/webgl_metaballs/assets/js/eh_webgl_metaballs.min.js";

				import(modulePath)
					.then(module => {
						init();
					})
					.catch(err => {
						console.log("WebGL Metaballs, could not load module", err);
					})
			}());
			',
		],
	];

	return $deps;
}
