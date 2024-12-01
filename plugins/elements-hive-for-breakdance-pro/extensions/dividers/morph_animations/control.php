<?php

namespace ElementsHiveForBreakdancePro\Extensions\Dividers\MorphAnimations;

use function Breakdance\Elements\control;
use function Breakdance\Elements\c;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'morph_animations',
		'Morph Animations',
		[
			control(
				"animation_type",
				"Animation Type",
				['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'entrance', 'text' => 'Entrance Animation'], '1' => ['text' => 'Scroll Animation', 'value' => 'scroll']]],
			), control(
				"relative_to",
				"Relative To",
				['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Viewport', 'value' => 'viewport'], '1' => ['text' => 'Page', 'value' => 'page'], '2' => ['text' => 'Custom', 'value' => 'custom']], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
			), control(
				"trigger_location",
				"Trigger Location",
				['type' => 'slider', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
			), control(
				"custom_selector",
				"Custom Selector",
				['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.relative_to', 'operand' => 'equals', 'value' => 'custom']]]],
			),
			control(
				"debug_markers",
				"Debug Markers",
				['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
			),
			control('duration', 'Duration', [
				'type' => 'unit',
				'layout' => 'inline',
				'unitOptions' => ['types' => ['s']],
				'rangeOptions' => [
					'min' => 0,
					'max' => 5,
					'step' => 0.1,
				],
				'condition' =>  ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]
			],),
			control('delay', 'Delay', [
				'type' => 'unit',
				'layout' => 'inline',
				'unitOptions' => ['types' => ['s']],
				'rangeOptions' => [
					'min' => 0,
					'max' => 5,
					'step' => 0.1,
				],
				'condition' =>  ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]
			],),
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
				'condition' =>  ['0' => ['0' => ['path' => '%%CURRENTPATH%%.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]
			]),
			control(
				"infobox",
				"Infobox",
				[
					'type' => 'alert_box',
					'layout' => 'vertical',
					'alertBoxOptions' => [
						'style' => 'warning',
						'content' => '<p>Custom Dividers and the default "Shark" dividers are not supported!</p>'
					],
				],
			),
		],
		[
			'isExternal' => false,
		],
		'popout'
	);
}
