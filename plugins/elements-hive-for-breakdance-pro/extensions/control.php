<?php

namespace ElementsHiveForBreakdancePro\Extensions;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

add_filter( 'breakdance_element_controls', 'ElementsHiveForBreakdancePro\Extensions\addControls', 69, 2 );


/**
 * @param Control[] $controls
 * @param Element   $element
 * @return Control[]
 */
function addControls( $controls, $element ) {
	$slug = $element->slug();

	/**
	 * Sections Extensions
	 */
	if ( 'EssentialElements\\Section' === $slug ) {

		/**
		* Design Tab Extensions
		*/
		$controls['designSections'][] = controlSection(
			'elements_hive_pro',
			'Elements Hive Pro',
			[
				\ElementsHiveForBreakdancePro\Extensions\Backgrounds\controls(),
				\ElementsHiveForBreakdancePro\Extensions\MouseCursors\controls(),
				\ElementsHiveForBreakdancePro\Extensions\Dividers\controls(),
			],
			[ 'isExternal' => true ]
		);

		// /**
		// * Settings Tab Extensions
		// */
		// $controls['settingsSections'][] = controlSection(
		// 	'elements_hive_pro',
		// 	'Elements Hive Pro',
		// 	[
		// 		\ElementsHiveForBreakdancePro\Extensions\MouseEffects\controls(),

		// 	],
		// 	[ 'isExternal' => true ]
		// );

		// $design = $controls['designSections'];

		// $elementsHiveIdx = array_search('elements_hive', array_column($design, 'slug'));

		// if($elementsHiveIdx != null) {

		// 	/**
		// 	 * Shapes Dividers
		// 	 */
		// 	array_push($controls['designSections'][$elementsHiveIdx]['children'],
		// 		\ElementsHiveForBreakdancePro\Extensions\Dividers\controls()
		// 	);

		// 	/**
		// 	 * Backgrounds
		// 	 */
		// 	$backgroundsIdx = array_search('backgrounds', array_column($controls['designSections'][$elementsHiveIdx]['children'], 'slug'));

		// 	if(isset($backgroundsIdx)) {

		// 		/**
		// 		 * WebGL Wavy Gradients
		// 		 */
		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$backgroundsIdx]['children'][0]['options']['items'],
		// 			['text' => 'WebGL Wavy Gradients', 'value' => 'webgl_wavy_gradients']
		// 		);

		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$backgroundsIdx]['children'],
		// 			\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglWavyGradients\controls()
		// 		);

		// 		/**
		// 		 * WebGL Liquid Distortion
		// 		 */
		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$backgroundsIdx]['children'][0]['options']['items'],
		// 			['text' => 'WebGL Liquid Distortion', 'value' => 'webgl_liquid_distortion']
		// 		);

		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$backgroundsIdx]['children'],
		// 			\ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion\controls()
		// 		);
		// 	}

		// 	/**
		// 	 * Mouse Cursors
		// 	 */
		// 	$cursorsIdx = array_search('mouse_cursors', array_column($controls['designSections'][$elementsHiveIdx]['children'], 'slug'));

		// 	if(isset($cursorsIdx)) {

		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$cursorsIdx]['children'][0]['options']['items'],
		// 			['text' => 'Morphing Cursor', 'value' => 'morphing_cursor']
		// 		);

		// 		array_push($controls['designSections'][$elementsHiveIdx]['children'][$cursorsIdx]['children'],
		// 			\ElementsHiveForBreakdancePro\Extensions\MouseCursors\MorphingMouseCursor\controls()
		// 		);
		// 	}


		// }

	}

	/**
	* Settings Tab Extensions
	*/
	$controls['settingsSections'][] = controlSection(
		'elements_hive_pro',
		'Elements Hive Pro',
		[
			\ElementsHiveForBreakdancePro\Extensions\MouseEffects\controls($slug),
			\ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\controls(),
			\ElementsHiveForBreakdancePro\Extensions\ScrollAnimation\controls(),
		],
		[ 'isExternal' => false ],
		'accordion'
	);



	/** @var Control[] $controls */
	return $controls;
}


