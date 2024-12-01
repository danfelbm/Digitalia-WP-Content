<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail;

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
		'images_trail',
		'Images Trail',
		[
            control(
				'enabled',
				'Enabled',
				[
					'type' => 'toggle',
					'layout' => 'inline',
				],
			),
            getPresetSection(
                "ElementsHiveForBreakdancePro\\image_repeater",
                "Images",
                "images",
                    [
                        'type' => 'popout',
                        'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                    ],
            ),
            c(
                "image_size",
                "Image Size",
                [],
                [
                    'type' => 'media_size_dropdown',
                    'layout' => 'inline',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
                false,
                false,
                [],
              ),
            control(
                'effect_style',
                'Effect Style',
                [
                    'type' => 'dropdown',
                    'layout' => 'inline',
                    'items' => [
                        '0' => ['text' => 'Style 1', 'value' => 'style1'],
                        '1' => ['text' => 'Style 2', 'value' => 'style2'],
                        '2' => ['text' => 'Style 3', 'value' => 'style3'],
                        '3' => ['text' => 'Style 4', 'value' => 'style4'],
                    ],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
            ),
            control(
                'image_width',
                'Image Width', [
                    'type' => 'unit',
                    'layout' => 'inline',
                    'unitOptions' => ['types' => ['px', 'rem', '%']],
                    'rangeOptions' => [
                        'min' => 10,
                        'max' => 150,
                        'step' => 1,
                    ],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
                true,
            ),
            control(
                'image_height',
                'Image Height', [
                    'type' => 'unit',
                    'layout' => 'inline',
                    'unitOptions' => ['types' => ['px', 'rem', '%']],
                    'rangeOptions' => [
                        'min' => 10,
                        'max' => 150,
                        'step' => 1,
                    ],
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
                true
            ),
            control(
                'above_content',
                'Put Images Above Content', [
                    'type' => 'toggle',
                    'layout' => 'inline',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
                true
            ),
            getPresetSection(
                "EssentialElements\\borders",
                "Borders",
                "borders",
                    [
                    'type' => 'popout',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
            ),
            getPresetSection(
                "EssentialElements\\filter",
                "Filters",
                "filters",
                    [
                    'type' => 'popout',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
                ],
            ),
            control(
				'apply_to_page',
				'Apply to whole page',
				[
					'type' => 'toggle',
                    'condition' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'is set', 'value' => ''],
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
