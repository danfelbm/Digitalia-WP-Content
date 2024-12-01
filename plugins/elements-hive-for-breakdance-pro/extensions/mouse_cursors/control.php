<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseCursors;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'mouse_cursors',
		'Mouse Cursors',
		[
			control(
				'cursor_type',
				'Cursor Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Morphing Cursor', 'value' => 'morphing_cursor'],
					],
				],
			),
			\ElementsHiveForBreakdancePro\Extensions\MouseCursors\MorphingMouseCursor\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

