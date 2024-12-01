<?php

namespace ElementsHiveForBreakdance\Extensions\MouseEffects\ImagesTrail;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdance\Extensions\MouseEffects\ImagesTrail\addActions', 100, 1 );

function addActions( $actions ) {
	$actions[] = [
		'onPropertyChange' => [
			[
				'script' => <<<JS
					( function() {
						{% if settings.elements_hive_pro.mouse_effects.images_trail.enabled %}
							if(window.EhInstancesManager?.instanceExists('EhImagesTrail', '%%ID%%')){
								window.EhInstancesManager.getInstance('EhImagesTrail', '%%ID%%')?.destroy()
								window.EhInstancesManager.deleteInstance('EhImagesTrail', '%%ID%%')
							}
							const containerEl = document.querySelector('%%SELECTOR%%')
							if (!containerEl)  return
							const settings = {{settings.elements_hive_pro.mouse_effects.images_trail|json_encode}} ?? {}
							const options = {
								container: containerEl,
								classWrapper: 'eh-images-trail',
								classInstanceID: 'eh-for-%%ID%%',
								eventsContainer: settings?.apply_to_page ? window : containerEl,
								trailStyle: `{{settings.elements_hive_pro.mouse_effects.images_trail.effect_style|default('style1')}}`,
								mouseMoveThreshold: 100,
								isApplyToPage: settings?.apply_to_page
							}
							const images = []
							{% set image_size = settings.elements_hive_pro.mouse_effects.images_trail.image_size|default('full') %}
							{% for image in settings.elements_hive_pro.mouse_effects.images_trail.images.images %}
								images.push('{{image.image.sizes[image_size].url}}')
							{% endfor %}
							if (images.length === 0 ) {
								images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements1.webp')
								images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements2.webp')
								images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements3.webp')
								images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements4.webp')
								images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements5.webp')
							}
							options.images = images
							const instance = new EhMouseImagesTrail(options)
							window.EhInstancesManager.registerInstance('EhImagesTrail', '%%ID%%', instance)
						{% else %}
							document.querySelector('.eh-images-trail.eh-for-%%ID%%')?.remove()
						{% endif %}
					}());
				JS,
				'dependencies' => ['settings.elements_hive_pro.mouse_effects.images_trail']
			],
		],
	];
	return $actions;
}
