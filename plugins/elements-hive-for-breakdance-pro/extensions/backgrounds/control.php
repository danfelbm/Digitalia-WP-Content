<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'backgrounds',
		'Backgrounds',
		[
			control(
				'background_type',
				'Background Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'WebGL Liquid Distortion', 'value' => 'webgl_liquid_distortion'],
						'1' => ['text' => 'WebGL Wavy Gradients', 'value' => 'webgl_wavy_gradients'],
						'2' => ['text' => 'WebGL Metaballs', 'value' => 'webgl_metaballs'],
					],
				],
			),
			\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion\controls(),
			\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients\controls(),
			\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

