<?php

namespace ElementsHiveForBreakdance\TwigFunctions;

use Breakdance\PluginsAPI;


/**
 * @return string
 */
function getElementsHiveProPluginUrl() {
	/**
	  * @var string $ELEMENTS_HIVE_DIR
	  */
	$ELEMENTS_HIVE_DIR = ELEMENTS_HIVE_PRO_DIR;

	return defined( 'ELEMENTS_HIVE_PRO_DIR' ) ? $ELEMENTS_HIVE_DIR : '';
}

\Breakdance\PluginsAPI\PluginsController::getInstance()->registerTwigFunction(
	'getElementsHiveProPluginUrl',
	'ElementsHiveForBreakdance\TwigFunctions\getElementsHiveProPluginUrl',
	'() => { return "' . getElementsHiveProPluginUrl() . '"; }',
	true
);

/**
 * @return string
 */
function getElementsHiveProAssetsUrl() {

	$ELEMENTS_HIVE_PRO_ASSETS_DIR = ELEMENTS_HIVE_PRO_ASSETS_DIR;

	return defined( 'ELEMENTS_HIVE_PRO_ASSETS_DIR' ) ? $ELEMENTS_HIVE_PRO_ASSETS_DIR : '';
}

\Breakdance\PluginsAPI\PluginsController::getInstance()->registerTwigFunction(
	'getElementsHiveProAssetsUrl',
	'ElementsHiveForBreakdance\TwigFunctions\getElementsHiveProAssetsUrl',
	'() => { return "' . getElementsHiveProAssetsUrl() . '"; }',
	true
);

/**
 * @return string
 */
function getElementsHiveFreePluginUrl() {

	$ELEMENTS_HIVE_FREE_DIR = ELEMENTS_HIVE_FREE_DIR;

	return defined( 'ELEMENTS_HIVE_FREE_DIR' ) ? $ELEMENTS_HIVE_FREE_DIR : '';
}

\Breakdance\PluginsAPI\PluginsController::getInstance()->registerTwigFunction(
	'getElementsHiveFreeUrl',
	'ElementsHiveForBreakdance\TwigFunctions\getElementsHiveFreeUrl',
	'() => { return "' . getElementsHiveFreePluginUrl() . '"; }',
	true
);

/**
 * @return string
 */
function getElementsHiveProGsapUrl() {

	$ELEMENTS_HIVE_GSAP = ELEMENTS_HIVE_GSAP;

	return defined( 'ELEMENTS_HIVE_GSAP' ) ? $ELEMENTS_HIVE_GSAP : '';
}

\Breakdance\PluginsAPI\PluginsController::getInstance()->registerTwigFunction(
	'getElementsHiveProGsapUrl',
	'ElementsHiveForBreakdance\TwigFunctions\getElementsHiveProGsapUrl',
	'() => { return "' . getElementsHiveProGsapUrl() . '"; }',
	true
);





