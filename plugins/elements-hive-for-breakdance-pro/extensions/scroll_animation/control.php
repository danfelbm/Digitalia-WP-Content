<?php

namespace ElementsHiveForBreakdancePro\Extensions\ScrollAnimation;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;


/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'scroll_animation',
		'Scrolling Animation',
		[
			control(
				'animation_type',
				'Animation Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Mask', 'value' => 'mask'],
					],
				],
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
            control(
				'scroll_direction',
				'Scroll Direction',
				[
					'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'On Scroll Down & Up', 'value' => 'downUp'],
                        '1' => ['text' => 'On Scroll Down', 'value' => 'down'],
                        '2' => ['text' => 'On Scroll Up', 'value' => 'up'],
                    ],
					'condition' => [
						'0' => [
							'0'=> [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
						]
					]
				]
			),
			control(
				'trigger_element',
				'Trigger Element',
				[
					'type' => 'button_bar',
					'layout' => 'inline',
					'items' => [
                        '0' => ['text' => 'Self', 'value' => 'self'],
                        '1' => ['text' => 'Parent', 'value' => 'parent'],
                        '2' => ['text' => 'Custom', 'value' => 'custom'],
                    ],
					'condition' => [
						'0' => [
							'0'=> [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
						]
					]
				],
			),
			control(
				'trigger_selector',
				'Trigger Selector',
				[
					'type' => 'text',
					'layout' => 'inline',
					'condition' => [
						'0' => [
							'0'=> [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
							'1'=> [
								'path' => '%%CURRENTPATH%%.trigger_element', 'operand' => 'equals', 'value' => 'custom'
							],
						]
					],
				],
			),
			control(
				"trigger_location",
				"Trigger Location",
				[
					'type' => 'slider',
					'layout' => 'vertical',
					'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1],
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
				],
			),
			control(
				'is_pinned',
				'Enable Pining',
				[
					'type' => 'toggle',
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
							'1'=> [
								'path' => '%%CURRENTPATH%%.scroll_direction', 'operand' => 'equals', 'value' => 'downUp'
							],
						]
					]
				],
			),
			control(
				'element_to_pin',
				'Element to Pin',
				[
					'type' => 'button_bar',
					'layout' => 'inline',
					'items' => [
                        '0' => ['text' => 'Self', 'value' => 'self'],
                        '1' => ['text' => 'Parent', 'value' => 'parent'],
                        '2' => ['text' => 'Custom', 'value' => 'custom'],
                    ],
					'condition' => [
						'0' => [
							'0'=> [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
							'1'=> [
								'path' => '%%CURRENTPATH%%.scroll_direction', 'operand' => 'equals', 'value' => 'downUp'
							],
							'2'=> [
								'path' => '%%CURRENTPATH%%.is_pinned', 'operand' => 'is set'
							],
						]
					]
				],
			),
			control(
				'pin_selector',
				'Pin Element Selector',
				[
					'type' => 'text',
					'layout' => 'inline',
					'condition' => [
						'0' => [
							'0'=> [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
							'1'=> [
								'path' => '%%CURRENTPATH%%.scroll_direction', 'operand' => 'equals', 'value' => 'downUp'
							],
							'2'=> [
								'path' => '%%CURRENTPATH%%.is_pinned', 'operand' => 'is set'
							],
							'3'=> [
								'path' => '%%CURRENTPATH%%.element_to_pin', 'operand' => 'equals', 'value' => 'custom'
							],
						]
					],
				],
			),
			control(
				'play_once',
				'Play Once',
				[
					'type' => 'toggle',
					'condition' => [
						'0' => [
							'0' => [
								'path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'
							],
							'1'=> [
								'path' => '%%CURRENTPATH%%.scroll_direction', 'operand' => 'is set'
							],
							'2'=> [
								'path' => '%%CURRENTPATH%%.scroll_direction', 'operand' => 'not equals', 'value' => 'downUp'
							],
						]
					]
				],
			),
			controlSection(
				'advanced',
				'Advanced',
				[
					control(
						'disable_pin_spacing',
						'Disable Pin Spacing',
						[
							'type' => 'toggle',
							'condition' => [
								'0' => [
									'0'=> [
										'path' => 'settings.elements_hive_pro.scroll_animation.animation_type', 'operand' => 'is set'
									],
									'1'=> [
										'path' => 'settings.elements_hive_pro.scroll_animation.scroll_direction', 'operand' => 'equals', 'value' => 'downUp'
									],
									'2'=> [
										'path' => 'settings.elements_hive_pro.scroll_animation.is_pinned', 'operand' => 'is set'
									],
								]
							]
						]
					),
					control(
						'scrub',
						'Scrub',
						[
							'type' => 'unit',
							'unitOptions' => ['types' => ['ms']],
							'rangeOptions' => [
								'min' => 0,
								'max' => 2000,
								'step' => 1,
							],
						]
					),
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
						//'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
					]),
					control('disable_at', 'Disable At', [
						'type' => 'breakpoint_dropdown',
						'layout' => 'vertical',
						//'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
					]),
					control('enable_markers', 'Debug Markers', [
						'type' => 'toggle',
						//'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
					]),
				],
				[
					'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set'],
					'isExternal' => true
				],
				'popout'
			)
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

