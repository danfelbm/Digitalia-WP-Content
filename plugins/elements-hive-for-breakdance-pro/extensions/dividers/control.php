<?php

namespace ElementsHiveForBreakdancePro\Extensions\Dividers;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'dividers',
		'Dividers',
		[
			\ElementsHiveForBreakdancePro\Extensions\Dividers\MorphAnimations\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

