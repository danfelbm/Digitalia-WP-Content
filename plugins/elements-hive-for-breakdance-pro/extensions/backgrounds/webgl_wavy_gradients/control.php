<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\repeaterControl;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'webgl_wavy_gradients',
		'WebGL Wavy Gradients',
		[
            control(
                'style',
                'Style',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Style 1', 'value' => 'style_1'],
                        '1' => ['text' => 'Style 2', 'value' => 'style_2'],
                        '2' => ['text' => 'Style 3', 'value' => 'style_3'],
                        '3' => ['text' => 'Style 4', 'value' => 'style_4'],
                        '4' => ['text' => 'Style 5', 'value' => 'style_5'],
                        '5' => ['text' => 'Style 6', 'value' => 'style_6'],
                        '6' => ['text' => 'Style 7', 'value' => 'style_7'],
                        '7' => ['text' => 'Style 8', 'value' => 'style_8'],
                    ],
                ]
            ),
            control(
                'gradient_speed',
                'Gradient Speed',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 5.0,'step' => 0.1,],
                ]
            ),
            control(
                'wave_speed',
                'Wave Speed',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 5.0,'step' => 0.1,],
                ]
            ),
            control(
                'direction',
                'Direction',
                [
                    'type' => 'button_bar',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Label', 'icon' => 'ArrowLeftIcon', 'value' => '-1.0'],
                        '1' => ['text' => 'Label', 'icon' => 'ArrowRightIcon', 'value' => '1.0'],
                    ],
                ],
            ),
            repeaterControl(
                'colors',
                'Colors',
                [
                    control(
                        'color',
                        'Color',
                        [
                            'type' => 'color',
                            'layout' => 'inline',
                            'colorOptions' => [ 'type' => 'solidOnly' ],
                        ]
                    )
                ],
            ),
            control(
				'apply_to_page',
				'Apply to whole page',
				[
					'type' => 'toggle',
				]
			),
            control(
				"disable_on_touch_devices",
        		"Disable on Touch Devices",
				[
					'type' => 'toggle',
				]
			),
			control(
				"infobox",
				"Infobox",
				[
					'type' => 'alert_box',
					'layout' => 'vertical',
					'alertBoxOptions' => [
						'style' => 'warning',
						'content' => '<p>Will not load on touch-enabled devices like tablets and mobiles.</p>'
					]
				],
			),

        ],
		[
			'condition' => ['path' => 'design.elements_hive_pro.backgrounds.background_type', 'operand' => 'equals', 'value' => 'webgl_wavy_gradients'],
			'isExternal' => true,
		],
		'popout'
	);
}
