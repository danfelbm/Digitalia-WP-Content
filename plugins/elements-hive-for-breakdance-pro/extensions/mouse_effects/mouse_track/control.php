<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack;

use function Breakdance\Elements\control;
use function Breakdance\Elements\c;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\PresetSections\getPresetSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'mouse_track',
		'Mouse Track',
		[
            control(
				'enabled',
				'Enabled',
				[
					'type' => 'toggle',
					'layout' => 'inline',
				],
			),
            control(
                'direction',
                'Direction',
                [
                    'type' => 'button_bar',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Direct', 'value' => '1'],
                        '1' => ['text' => 'Opposite', 'value' => '-1'],
                    ],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
            ),
            control(
                'max_distance',
                'Maximum Distance',
                [
                    'type' => 'unit',
                    'layout' => 'inline',
                    'unitOptions' => ['types' => ['px']],
                    'rangeOptions' => [ 'min' => 10, 'max' => 100,'step' => 1,],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ]
            ),
            control(
                'speed_factor',
                'Speed Factor',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 2,'step' => 0.1,],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ]
            ),
            control(
                'apply_depth',
                'Apply Depth',
                [
                    'type' => 'toggle',
                    'layout' => 'inline',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ]
            ),
            control(
                'depth_axis',
                'Axis for Depth',
                [
                    'type' => 'button_bar',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'X', 'icon' => 'LeftAndRightArrowsIcon', 'value' => 'x'],
                        '1' => ['text' => 'Y', 'icon' => 'UpAndDownArrowsIcon', 'value' => 'y'],
                        '2' => ['text' => 'X/Y', 'icon' => 'UpRightAndDownLeftFromCenter', 'value' => 'xy'],
                    ],
                    'condition' => [
                        '0' => [
                            '0' => [
                                'path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''
                            ],
                            '1' => [
                                'path' => '%%CURRENTPATH%%.apply_depth', 'operand' => 'is set', 'value' => ''
                            ],
                        ]
                    ]
                ]
            ),
            control(
                'depth_factor',
                'Depth Factor',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 0.1, 'max' => 3,'step' => 0.1,],
                    'condition' => [
                        '0' => [
                            '0' => [
                                'path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''
                            ],
                            '1' => [
                                'path' => '%%CURRENTPATH%%.apply_depth', 'operand' => 'is set', 'value' => ''
                            ],
                        ]
                    ]
                ]
            ),
            control(
				"disable_on_touch_devices",
        		"Disable on Touch Devices",
				[
					'type' => 'toggle',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
				]
			),
		],
		[
			'isExternal' => true,
		],
		'popout'
	);
}
