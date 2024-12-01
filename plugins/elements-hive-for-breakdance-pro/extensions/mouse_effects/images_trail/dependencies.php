<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail;

add_filter( 'breakdance_element_dependencies', 'ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail\addDependencies', 100, 1 );

/**
 * @param ElementDependenciesAndConditions[] $deps
 * @return ElementDependenciesAndConditions[]
 */
function addDependencies( $deps ) {
	$condition = "
		return {{settings.elements_hive_pro.mouse_effects.images_trail.enabled|default(false)}};
	";
    $deps[] = [
		'frontendCondition' => $condition,
		'builderCondition' => $condition,
		'scripts' => [
            ELEMENTS_HIVE_PRO_DIR . 'assets/js/eh-dependencies/eh_global_utils.min.js',
			ELEMENTS_HIVE_GSAP,
		],
	];
    $deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'scripts' => [
            ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',
			ELEMENTS_HIVE_PRO_DIR . 'extensions/mouse_effects/images_trail/assets/js/eh_mouse_images_trail.min.js',
		],
	];
	$deps[] = [
		'frontendCondition' => 'return false;',
		'builderCondition' => $condition,
		'inlineScripts' => [
			"
			 ( function() {

				const containerEl = document.querySelector('%%SELECTOR%%');
                if (!containerEl || window.EhInstancesManager.instanceExists('EhImagesTrail', '%%ID%%') ) return;

                const settings = {{settings.elements_hive_pro.mouse_effects.images_trail|json_encode}} ?? {};

                const options = {
                    container: containerEl,
                    classWrapper: 'eh-images-trail',
                    classInstanceID: 'eh-for-%%ID%%',
                    eventsContainer: settings?.apply_to_page ? window : containerEl,
                    trailStyle: `{{settings.elements_hive_pro.mouse_effects.images_trail.effect_style|default('style1')}}`,
                    mouseMoveThreshold: 100,
                    isApplyToPage: settings?.apply_to_page || false
                }

                const images = [];

                {% set image_size = settings.elements_hive_pro.mouse_effects.images_trail.image_size|default('full') %}
                {% for image in settings.elements_hive_pro.mouse_effects.images_trail.images.images %}
                    images.push('{{image.image.sizes[image_size].url}}');
                {% endfor %}

                if (images.length === 0 ) {
                    images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements1.webp')
                    images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements2.webp')
                    images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements3.webp')
                    images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements4.webp')
                    images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements5.webp')
                }

                options.images = images;
                const instance = new EhMouseImagesTrail(options);
                window.EhInstancesManager.registerInstance('EhImagesTrail', '%%ID%%', instance);
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
                    if ( window.ElementsHiveUtils.isTouchDevice() ) return;

                    const containerEl = document.querySelector('%%SELECTOR%%');
                    if (!containerEl) return;

                    const settings = {{settings.elements_hive_pro.mouse_effects.images_trail|json_encode}} ?? {};

                    async function init() {
                        await import('{{getElementsHiveProPluginUrl()}}extensions/mouse_effects/images_trail/assets/js/eh_mouse_images_trail.min.js')
                        const options = {
                            container: containerEl,
                            classWrapper: 'eh-images-trail',
                            classInstanceID: 'eh-for-%%ID%%',
                            eventsContainer: settings?.apply_to_page ? window : containerEl,
                            trailStyle: `{{settings.elements_hive_pro.mouse_effects.images_trail.effect_style|default('style1')}}`,
                            mouseMoveThreshold: 100,
                            isApplyToPage: settings?.apply_to_page || false
                        }

                        const images = [];

                        {% set image_size = settings.elements_hive_pro.mouse_effects.images_trail.image_size|default('full')  %}
                        {% for image in settings.elements_hive_pro.mouse_effects.images_trail.images.images %}
                            images.push('{{image.image.sizes[image_size].url}}');
                        {% endfor %}

                        if (images.length === 0 ) {
                            images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements1.webp');
                            images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements2.webp');
                            images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements3.webp');
                            images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements4.webp');
                            images.push('{{getElementsHiveProPluginUrl()}}assets/images/placeholders/elements5.webp');
                        }

                        options.images = images;
                        const instance = new EhMouseImagesTrail(options);
                    }

                    init()
                }());
                ",
            ],
	];

	return $deps;
}
