<?php

namespace ElementsHiveForBreakdancePro\Extensions\Dividers\MorphAnimations;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\Dividers\MorphAnimations\addDependencies', 100, 1 );


/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "return !!'{{design.elements_hive_pro.dividers.morph_animations.animation_type}}';";
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'inlineStyles' => [
			'
				%%SELECTOR%% .section-shape-divider path {
					opacity: 0;
				}
		'],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [ELEMENTS_HIVE_GSAP],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [ELEMENTS_HIVE_SCROLLTRIGGER],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [ELEMENTS_HIVE_PRO_DIR . 'extensions/dividers/morph_animations/assets/js/eh_divider_morph_animation.js'],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js'],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {
				const containerEl = document.querySelector('%%SELECTOR%%');
				if (!containerEl || containerEl.getAttribute('eh-divider-is-scrollable') ) return;
				const dividersElements = containerEl.querySelectorAll('.section-shape-divider>svg');
				if ( dividersElements.length == 0) return;
				containerEl.setAttribute('eh-divider-is-scrollable', true);
				const options = {
					containerEl: containerEl
				}
				function getPath(svgCode, dividerEl) {
					const gEl = dividerEl.querySelector('g');
					if(gEl) return gEl.id;
					return svgCode;
				}
				{% for divider in design.dividers.shape_dividers_section.dividers %}
					if( dividersElements[{{loop.index0}}].querySelector('path') != null) {
						options.path = getPath(`{{divider.shape|raw}}`, dividersElements[{{loop.index0}}]);
						options.svgEl = dividersElements[{{loop.index0}}];
						options.pathEl = dividersElements[{{loop.index0}}].querySelector('path');
						options.animationType = '{{design.elements_hive_pro.dividers.morph_animations.animation_type}}';
						options.triggerLocation = {{design.elements_hive_pro.dividers.morph_animations.trigger_location|json_encode}};
						options.enableMarkers = {{design.elements_hive_pro.dividers.morph_animations.debug_markers|default(false)}};
						options.duration = {{design.elements_hive_pro.dividers.morph_animations.duration.number|default('.5')}};
						options.delay = {{design.elements_hive_pro.dividers.morph_animations.delay.number|default('0')}};
						options.ease = `{{design.elements_hive_pro.dividers.morph_animations.ease|default('none')}}`;
						options.id = 'eh-morph-divider-%%ID%%';
						switch('{{design.elements_hive_pro.dividers.morph_animations.relative_to}}') {
							case 'page':
								options.trigger = document.documentElement;
								break;
							case 'custom':
								if('{{design.elements_hive_pro.dividers.morph_animations.custom_selector}}' !== ''){
									options.trigger = document.querySelector('{{design.elements_hive_pro.dividers.morph_animations.custom_selector}}');
									if (!options.trigger) {
										options.trigger = options.svgEl;
									}
								}
								break;
							case 'viewport':
							default:
								options.trigger = options.svgEl;
								break;
						}
						window.EhInstancesManager.registerInstance('EhDividerMorph', '%%ID%%-{{loop.index0}}', new EhDividerMorphAnimation(options));
					}
				{% endfor %}
			}());
			",
		],
	];
	$deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => 'return false;',
		'inlineScripts' => [
			"
			 ( function() {
				const containerEl = document.querySelector('%%SELECTOR%%');
				if (!containerEl || containerEl.getAttribute('eh-divider-is-scrollable') ) return;
				const dividersElements = containerEl.querySelectorAll('.section-shape-divider>svg');
				if ( dividersElements.length == 0) return;
				containerEl.setAttribute('eh-divider-is-scrollable', true);
				const options = {
					containerEl: containerEl
				}
				function getPath(svgCode, dividerEl) {
					const gEl = dividerEl.querySelector('g');
					if(gEl) return gEl.id;
					return svgCode;
				}
				{% for divider in design.dividers.shape_dividers_section.dividers %}
					if( dividersElements[{{loop.index0}}].querySelector('path') != null) {
						options.path = getPath(`{{divider.shape|raw}}`, dividersElements[{{loop.index0}}]);
						options.svgEl = dividersElements[{{loop.index0}}];
						options.pathEl = dividersElements[{{loop.index0}}].querySelector('path');
						options.animationType = '{{design.elements_hive_pro.dividers.morph_animations.animation_type}}';
						options.triggerLocation = {{design.elements_hive_pro.dividers.morph_animations.trigger_location|json_encode}};
						options.enableMarkers = {{design.elements_hive_pro.dividers.morph_animations.debug_markers|default('false')}};
						options.duration = {{design.elements_hive_pro.dividers.morph_animations.duration.number|default('.5')}};
						options.delay = {{design.elements_hive_pro.dividers.morph_animations.delay.number|default('0')}};
						options.ease = `{{design.elements_hive_pro.dividers.morph_animations.ease|default('none')}}`;
						options.id = 'eh-morph-divider-%%ID%%';
						switch('{{design.elements_hive_pro.dividers.morph_animations.relative_to}}') {
							case 'page':
								options.trigger = document.documentElement;
								break;
							case 'custom':
								if('{{design.elements_hive_pro.dividers.morph_animations.custom_selector}}' !== ''){
									options.trigger = document.querySelector('{{design.elements_hive_pro.dividers.morph_animations.custom_selector}}');
									if (!options.trigger) {
										options.trigger = options.svgEl;
									}
								}
								break;
							case 'viewport':
							default:
								options.trigger = options.svgEl;
								break;
						}
						new EhDividerMorphAnimation(options);
					}
				{% endfor %}
			}());
			",
		],
	];

	return $deps;
}
