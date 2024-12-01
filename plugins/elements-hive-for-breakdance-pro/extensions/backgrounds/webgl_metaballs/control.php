<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\repeaterControl;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'webgl_metaballs',
		'WebGL Metaballs',
		[

            control(
                'shape_style',
                'Shape Style',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Style 1', 'value' => '0'],
                        '1' => ['text' => 'Style 2', 'value' => '1'],
                        '2' => ['text' => 'Style 3', 'value' => '2'],
                        '3' => ['text' => 'Style 4', 'value' => '3'],
                        '4' => ['text' => 'Style 5', 'value' => '4'],
                        '5' => ['text' => 'Style 6', 'value' => '5'],
                        '6' => ['text' => 'Style 7', 'value' => '6'],
                        '7' => ['text' => 'Style 8', 'value' => '7'],
                        '8' => ['text' => 'Style 9', 'value' => '8'],
                    ],
                ]
            ),
			control(
				'speed',
				'Speed Factor',
				[
					'type' => 'number',
					'layout' => 'inline',
					'rangeOptions' => [ 'min' => 0.1, 'max' => 3.0,'step' => 0.1,],
				]
			),
            control(
                'shading_mode',
                'Color Mode',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Shaded', 'value' => 'shaded'],
                        '1' => ['text' => 'Shaded 2', 'value' => 'shaded2'],
                        '2' => ['text' => 'Aura', 'value' => 'aura'],
                        '3' => ['text' => 'Sci-fi', 'value' => 'scifi'],
                    ],
                ]
            ),
			control(
				'base_color',
				'Color',
				[
					'type' => 'color',
					'layout' => 'inline',
					'colorOptions' => [ 'type' => 'solidOnly' ],
				]
			),
			control(
				'light2_color',
				'Color 2',
				[
					'type' => 'color',
					'layout' => 'inline',
					'colorOptions' => [ 'type' => 'solidOnly' ],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'is set',
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'equals',
								'value' => 'scifi'
							]
						],
					]
				]
			),
			control(
				'aura_color',
				'Aura Color',
				[
					'type' => 'color',
					'layout' => 'inline',
					'colorOptions' => [ 'type' => 'solidOnly' ],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'is set',
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'equals',
								'value' => 'aura'
							]

						]
					]
				]
			),
			control(
				'aura_spread',
				'Aura Spread',
				[
					'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 1.0,'step' => 0.1],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'is set',
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'equals',
								'value' => 'aura'
							]

						]
					]
				]
			),
			control(
                'ambient_intensity',
                'Brightness',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 3.0,'step' => 0.1],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'not equals',
								'value' => 'aura'
							]
						],
					]
				],
            ),
			control(
                'shininess',
                'Shininess',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => .1, 'max' => 10,'step' => .1,],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.shading_mode',
								'operand' => 'not equals',
								'value' => 'aura'
							]
						],
					]
				],
            ),
			controlSection(
				'transforms',
				'Transforms',
				[
					control(
						'apply_rotation',
						'Auto Rotate',
						[
							'type' => 'toggle',
							'layout' => 'inline'
						]
					),
					control(
						'look_at',
						'Position',
						[
							'type' => 'focus_point',
							'layout' => 'inline'
						]
					),
					control(
						'camera_zoom',
						'Zoom Level',
						[
							'type' => 'number',
							'layout' => 'inline',
							'rangeOptions' => [ 'min' => 1, 'max' => 5,'step' => .1,],
						],
						true
					),
				],
				[],
				'popout'
			),
			controlSection(
				'interactions',
				'Interactions',
				[
					control(
						'enable_mouse',
						'Enable Mouse',
						[
							'type' => 'toggle',
							'layout' => 'inline'
						]
					),
					control(
						'mouse_type',
						'Type',
						[
							'type' => 'dropdown',
							'layout' => 'inline',
							'items' => [
								'0' => ['text' => 'Sphere', 'value' => '1'],
								'1' => ['text' => 'Metaball', 'value' => '2'],
							],
						]
					),
					control(
						'mouse_radius',
						'Mouse Radius',
						[
							'type' => 'number',
							'layout' => 'inline',
							'rangeOptions' => [ 'min' => 0, 'max' => 1,'step' => .1,],
						]
					),
				],
				[],
				'popout'
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
        ],
		[
			'condition' => ['path' => 'design.elements_hive_pro.backgrounds.background_type', 'operand' => 'equals', 'value' => 'webgl_metaballs'],
			'isExternal' => true,
		],
		'popout'
	);
}
