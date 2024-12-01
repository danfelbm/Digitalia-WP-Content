<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;
use function Breakdance\Elements\c;

/**
 * @param String element slug
 * @return Control
 */
function controls($slug) {
	/** @var Control */

	$controls = [];

	/**
	 * Sections Only Extensions
	 */
	if ( 'EssentialElements\\Section' === $slug ) {
		$controls[] = \ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail\controls();
	} else {
		/**
		 * All Elements Extensions expect Sections
		 */
		$controls[] = \ElementsHiveForBreakdancePro\Extensions\MouseEffects\Tilt3D\controls();
		$controls[] = \ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack\controls();
	}

	return controlSection(
		'mouse_effects',
		'Mouse Effects',
		$controls,
		[ 'isExternal' => true ],
		'popout'
	);
}

