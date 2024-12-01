<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\repeaterControl;
use function Breakdance\Elements\inlineRepeaterControl;



/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'entrance_animation',
		'Entrance Animation',
		[
			control(
				'animation_type',
				'Animation Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Block Reveal', 'value' => 'block_reveal'],
						'1' => ['text' => 'Displacement', 'value' => 'displacement'],
						'2' => ['text' => 'Mask', 'value' => 'mask'],
					],
				],
			),
			control(
                'displacement_style',
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
                        '8' => ['text' => 'Style 9', 'value' => 'style_9'],
                        '9' => ['text' => 'Style 10', 'value' => 'style_10'],
                        '10' => ['text' => 'Style 11', 'value' => 'style_11'],
                        '11' => ['text' => 'Style 12', 'value' => 'style_12'],
                        '12' => ['text' => 'Style 13', 'value' => 'style_13'],
                        '13' => ['text' => 'Style 14', 'value' => 'style_14'],
                        '14' => ['text' => 'Style 15', 'value' => 'style_15'],
                        '15' => ['text' => 'Style 16', 'value' => 'style_16'],
                        '16' => ['text' => 'Style 17', 'value' => 'style_17'],

                    ],
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'displacement']
                ]
            ),
			control(
                'block_reveal_style',
                'Style',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Style 1', 'value' => 'style_1'],
                        '1' => ['text' => 'Style 2', 'value' => 'style_2'],
                    ],
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'block_reveal']
                ]
            ),
			repeaterControl(
                'block_layers',
                'Layers',
                [
                    control(
                        'color',
                        'Background Color',
                        [
                            'type' => 'color',
                            'layout' => 'inline',
                            'colorOptions' => [ 'type' => 'solidAndGradient' ],
						],
					),
                ],
				[
					'repeaterOptions' => [
						'titleTemplate' => '{name}',
						'defaultTitle' => 'Layer',
						'buttonName' => 'Add layer'
					],
					'condition' => [
						'path' => '%%CURRENTPATH%%.animation_type',
						'operand' => 'equals',
						'value' => 'block_reveal'
					]
				]
            ),
			control(
                'mask_style',
                'Style',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Wipe', 'value' => 'wipe'],
                        '1' => ['text' => 'Circle', 'value' => 'circle'],
                        '2' => ['text' => 'Square', 'value' => 'square'],
                    ],
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'mask']
                ]
            ),
			control(
                'mask_direction',
                'Direction',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Left', 'value' => 'left'],
                        '1' => ['text' => 'Right', 'value' => 'right'],
                        '2' => ['text' => 'Up', 'value' => 'up'],
                        '3' => ['text' => 'Down', 'value' => 'down'],
                        '4' => ['text' => 'Top Left', 'value' => 'top_left'],
                        '5' => ['text' => 'Top Right', 'value' => 'top_right'],
                        '6' => ['text' => 'Bottom Left', 'value' => 'bottom_left'],
                        '7' => ['text' => 'Bottom Right', 'value' => 'bottom_right'],
                    ],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type',
								'operand' => 'equals',
								'value' => 'mask'
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.mask_style',
								'operand' => 'equals',
								'value' => 'wipe'
							]
						],
					]
                ],
            ),
			control(
                'mask_direction_alternative',
                'Direction',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Center', 'value' => 'center'],
                        '1' => ['text' => 'Left', 'value' => 'left'],
                        '2' => ['text' => 'Right', 'value' => 'right'],
                        '3' => ['text' => 'Up', 'value' => 'up'],
                        '4' => ['text' => 'Down', 'value' => 'down'],
                        '5' => ['text' => 'Top Left', 'value' => 'top_left'],
                        '6' => ['text' => 'Top Right', 'value' => 'top_right'],
                        '7' => ['text' => 'Bottom Left', 'value' => 'bottom_left'],
                        '8' => ['text' => 'Bottom Right', 'value' => 'bottom_right'],
                    ],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type',
								'operand' => 'equals',
								'value' => 'mask'
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.mask_style',
								'operand' => 'equals',
								'value' => 'circle'
							]
						],
						'1' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type',
								'operand' => 'equals',
								'value' => 'mask'
							],
							'1' => [
								'path' => '%%CURRENTPATH%%.mask_style',
								'operand' => 'equals',
								'value' => 'square'
							]
						]
					]
                ],
            ),
			control('duration', 'Duration', [
                'type' => 'unit',
                'unitOptions' => [
                    'types' => ['s']
                ],
                'rangeOptions' => [
                    'min' => 0,
                    'max' => 2,
                    'step' => 0.1,
                ],
                'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
            ]),
            control('delay', 'Delay', [
                'type' => 'unit',
                'unitOptions' => [
                    'types' => ['s']
                ],
                'rangeOptions' => [
                    'min' => 0,
                    'max' => 2,
                    'step' => 0.1,
                ],
                'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
            ]),
			control('trigger_location', 'Trigger Location', [
                'type' => 'number',
                'rangeOptions' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
            ]),
			control(
                'direction',
                'Direction',
                [
                    'type' => 'button_bar',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Label', 'icon' => 'ArrowLeftIcon', 'value' => 'left'],
                        '1' => ['text' => 'Label', 'icon' => 'ArrowRightIcon', 'value' => 'right'],
                        '2' => ['text' => 'Label', 'icon' => 'ArrowUpIcon', 'value' => 'up'],
                        '3' => ['text' => 'Label', 'icon' => 'ArrowDownIcon', 'value' => 'down'],
                    ],
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type',
								'operand' => 'equals',
								'value' => 'block_reveal'
							],
						],
						'1' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type',
								'operand' => 'equals',
								'value' => 'displacement'
							],
						]
					]
                ],
            ),
			control('distance', 'Distance', [
				'type' => 'unit',
				'unitOptions' => [
					'types' => ['px']
				],
				'rangeOptions' => [
					'min' => 0,
					'max' => 300,
					'step' => 1,
				],
				'condition' => [
					'0' => [
						'0' => [
							'path' => '%%CURRENTPATH%%.animation_type',
							'operand' => 'equals',
							'value' => 'displacement'
						],
						'1' => [
							'path' => '%%CURRENTPATH%%.direction',
							'operand' => 'is set',
						]
					]
				]
			]),
            control('once', 'Animate only once', [
				'type' => 'toggle',
				'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
			]),
			control('ease', 'Ease', [
				'type' => 'dropdown',
				'layout' => 'vertical',
				'items' => array_map(function ($easing) {
					return [
						'text' => ucwords(str_replace(
							'.',
							' ',
							$easing
						)),
						'value' => $easing,
					];
				}, EH_EASING_TYPES),
				'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
			]),
			control('enable_markers', 'Debug Markers', [
				'type' => 'toggle',
				'condition' => [
					'path' => '%%CURRENTPATH%%.animation_type',
					'operand' => 'is set',
				]
			]),
			control('disable_at', 'Disable At', [
				'type' => 'breakpoint_dropdown',
				'layout' => 'vertical',
				'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
			]),
			control('disable_on_webkit', 'Disable on WebKit Browsers', [
				'type' => 'toggle',
				'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'displacement']
			]),
			control(
				"infobox",
				"Infobox",
				[
					'type' => 'alert_box',
					'layout' => 'vertical',
					'alertBoxOptions' => [
						'style' => 'warning',
						'content' => '<p>Disable the animation on WebKit Browsers ( Safari ). See <a href="https://elementshive.com/docs/entrance-animations">documentation</a></p>'
					],
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'displacement']
				],
			),
			// \ElementsHiveForBreakdancePro\Extensions\EntranceAnimations\Displacement\controls(),
			// \ElementsHiveForBreakdancePro\Extensions\EntranceAnimations\BlockReveal\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

