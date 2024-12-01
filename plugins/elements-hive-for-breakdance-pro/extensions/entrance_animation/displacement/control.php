<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\repeaterControl;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'svg_displacement',
		'SVG Displacement',
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
                    ],
                ]
            ),
            control('duration', 'Duration', [
                'type' => 'unit',
                'unitOptions' => [
                    'types' => ['ms', 's']
                ],
                'rangeOptions' => [
                    'min' => 0,
                    'max' => 3000,
                    'step' => 50,
                ],
                'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
            ]),
            control('delay', 'Delay', [
                'type' => 'unit',
                'unitOptions' => [
                    'types' => ['ms', 's']
                ],
                'rangeOptions' => [
                    'min' => 0,
                    'max' => 3000,
                    'step' => 50,
                ],
                'condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']
            ]),
            controlSection(
                'advanced',
                'Advanced',
                [
                    control('distance', 'Distance', [
                        'type' => 'unit',
                        'rangeOptions' => [
                            'min' => 0,
                            'max' => 300,
                            'step' => 1,
                        ],
                    ]),
                    control('offset', 'Offset', [
                        'type' => 'unit',
                        'unitOptions' => [
                            'types' => ['px']
                        ],
                        'rangeOptions' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ]),
                    control('once', 'Animate only once', [
                        'type' => 'toggle'
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
                        }, EASING_TYPES),
                    ]),
                    control('enable_markers', 'Debug Markers', [
                        'type' => 'toggle',
                    ]),
                    control('disable_at', 'Disable At', [
                        'type' => 'breakpoint_dropdown',
                        'layout' => 'vertical',
                    ]),
                ],
                ['condition' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'is set']],
                'popout'
            ),
        ],
		'popout'
	);
}
