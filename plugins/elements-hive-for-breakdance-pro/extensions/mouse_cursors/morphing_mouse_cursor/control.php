<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseCursors\MorphingMouseCursor;

use function Breakdance\Elements\control;
use function Breakdance\Elements\c;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'morphing_cursor',
		'Morphing Cursor',
		[
			control(
				'style',
				'Style',
				[
					'type' => 'button_bar',
					'layout' => 'vertical',
					'items' => [
						'0' => ['text' => 'Background Color', 'value' => 'background'],
						'1' => ['text' => 'Border Only', 'value' => 'border'],
					],
				],
			),
			control(
				'color',
				'Color',
				[
					'type' => 'color',
					'layout' => 'inline',
					'colorOptions' => [ 'type' => 'solidOnly' ]
				],
			),
			control('cursor_size', 'Cursor Size', [
				'type' => 'unit',
				'layout' => 'inline',
				'unitOptions' => ['types' => ['px']],
				'rangeOptions' => [
					'min' => 10,
					'max' => 100,
					'step' => 1,
				],
			],
			),
			control('scale_factor', 'Default Scale Factor on Morph Targets', [
				'type' => 'number',
				'layout' => 'vertical',
				'rangeOptions' => [
					'min' => 1,
					'max' => 5,
					'step' => 0.1,
				],
			],
			),
			control('speed_factor', 'Cursor Speed Factor', [
				'type' => 'number',
				'layout' => 'inline',
				'rangeOptions' => [
					'min' => 1,
					'max' => 5,
					'step' => 0.1,
				],
			],
		),
			control('z_index', 'Z Index', [
				'type' => 'number',
				'layout' => 'inline',
			],
			),
			control('disable_squeeze', 'Disable Squeeze Effect', [
				'type' => 'toggle',
				'layout' => 'inline',
			],
			),
			c(
				'morph_targets',
				'Morph Targets',
				[
					control('selector', 'CSS Selector', [ 'type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Valid CSS selector']),
					control('override_scale', 'Override Default Scale?', ['type' => 'toggle']),
					control('scale_factor', 'Custom Scale Factor', [
						'type' => 'number',
						'layout' => 'vertical',
						'rangeOptions' => [
							'min' => 1,
							'max' => 5,
							'step' => 0.1,
						],
						'condition' => ['path' => '%%CURRENTPATH%%.override_scale', 'operand' => 'is set', 'value' => ''],
					],
					),
					control(
						'style',
						'Style',
						[
							'type' => 'button_bar',
							'layout' => 'inline',
							'items' => [
								'0' => ['text' => 'Background', 'value' => 'background'],
								'1' => ['text' => 'Border', 'value' => 'border'],
							],
						],
					),
					control('color', 'Color', ['type' => 'color', 'layout' => 'vertical', 'colorOptions' => [ 'type' => 'solidOnly' ]]),
					control('enable_icon', 'Enable Icon', ['type' => 'toggle']),
					control('icon', 'Icon', [ 'type' => 'icon', 'layout' => 'vertical','condition' => ['path' => '%%CURRENTPATH%%.enable_icon', 'operand' => 'is set', 'value' => ''],]),
					control('icon_size', 'Icon Size', ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px']],'rangeOptions' => [ 'min' => 10, 'max' => 100,'step' => 1,],'condition' => ['path' => '%%CURRENTPATH%%.enable_icon', 'operand' => 'is set', 'value' => ''],]),
					control('icon_color', 'Icon Color', ['type' => 'color', 'layout' => 'vertical', 'colorOptions' => [ 'type' => 'solidOnly' ], 'condition' => ['path' => '%%CURRENTPATH%%.enable_icon', 'operand' => 'is set', 'value' => '']]),
				],
				['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{selector}', 'defaultTitle' => 'CSS Class or ID', 'buttonName' => 'Add Selector']],
				false,
            	false
			),
		],
		[
			'condition' => ['path' =>  'design.elements_hive_pro.mouse_cursors.cursor_type', 'operand' => 'equals', 'value' => 'morphing_cursor'],
			'isExternal' => true,
		],
		'popout'
	);
}
