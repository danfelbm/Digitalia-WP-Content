<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\Tilt3D;

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
		'tilt_3d',
		'Tilt 3D',
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
                'max_rotation',
                'Maximum Rotation',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 10, 'max' => 45,'step' => 1,],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ]
            ),
            control(
                'speed_factor',
                'Speed Factor',
                [
                    'type' => 'number',
                    'layout' => 'inline',
                    'rangeOptions' => [ 'min' => 1, 'max' => 2,'step' => 0.1,],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ]
            ),
            control(
				'animate_on_container',
				'Animate on Hover Only',
				[
					'type' => 'toggle',
					'layout' => 'inline',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
				],
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
