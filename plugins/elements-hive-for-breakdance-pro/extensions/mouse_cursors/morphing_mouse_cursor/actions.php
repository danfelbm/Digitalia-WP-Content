<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\MorphingMouseCursor;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseCursors\MorphingMouseCursor\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						{% if design.elements_hive_pro.mouse_cursors.cursor_type != 'morphing_cursor' %}
							document.querySelector('.eh-morphing-cursor-wrapper.eh-for-%%ID%%')?.remove()
						{% else %}
						document.querySelector('.eh-morphing-cursor-wrapper.eh-for-%%ID%%')?.remove()
						const isTouchDevice = 'ontouchstart' in window ? true : false
						if (!isTouchDevice) init()
						async function init() {
							await import('{{getElementsHiveProPluginUrl()}}extensions/mouse_cursors/morphing_mouse_cursor/assets/js/eh_morphing_cursor.min.js')
							const containerElement = document.querySelector('%%SELECTOR%%')
							const morphTargets = []
							{% for item in design.elements_hive_pro.mouse_cursors.morphing_cursor.morph_targets %}
								{% if item.selector|length > 1 %}
									morphTargets.push({
										selector: `{{item.selector}}`,
										icon: `{{item.icon.svgCode}}`,
									})
								{% endif %}
							{% endfor %}
							const options = {
								parent: containerElement,
								wrapperClass: 'eh-morphing-cursor-wrapper',
								innerClass: 'eh-morphing-cursor-inner',
								iconWrapperClass: 'eh-morphing-cursor-icon-wrapper',
								iconClass: 'eh-morphing-cursor-icon',
								instanceClass: 'eh-for-%%ID%%',
								selectorAttribute: 'data-eh-for-selector',
								styleAttribute: 'data-eh-active-style',
								cursorSize: 240,
								speedFactor: {{design.elements_hive_pro.mouse_cursors.morphing_cursor.speed_factor|default(1)}},
								disableSqueeze: {{design.elements_hive_pro.mouse_cursors.morphing_cursor.disable_squeeze|default('false')}},
								morphTargets,
								domContainer: document.body,
								eventsContainer: window
							}
							new EhMorphingCursor(options)
						}
						{% endif %}
					}());
				JS,
				'dependencies' => ['design.elements_hive_pro.mouse_cursors']
			],
		],
	];
	$actions[] = [
		'onBeforeDeletingElement' => [
			[
				'script' => <<<JS
					( function() {
						document.querySelector('.eh-morphing-cursor-wrapper.eh-for-%%ID%%')?.remove()
					}());
				JS,
			],
		],
	];
	return $actions;
}
