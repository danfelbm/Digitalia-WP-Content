<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\MouseEffects\ImagesTrail\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if settings.elements_hive_pro.mouse_effects.images_trail.enabled %}
            %%SELECTOR%% {
                overflow: hidden;
            }
            .eh-images-trail.eh-for-%%ID%%>img {
                position: absolute;
                inset: 0;
                opacity: 0;
                will-change: transform;
                height: auto;
                width: {{settings.elements_hive_pro.mouse_effects.images_trail.image_width.style|default("120px")}};
                height: {{settings.elements_hive_pro.mouse_effects.images_trail.image_height.style}};
                {{ macros.borders(settings.elements_hive_pro.mouse_effects.images_trail.borders) }}
                {{ macros.filters(settings.elements_hive_pro.mouse_effects.images_trail.filters) }}
            }

            {% if not settings.elements_hive_pro.mouse_effects.images_trail.above_content %}
                %%SELECTOR%% .section-container,
                header,
                footer {
                    {% if settings.elements_hive_pro.mouse_effects.images_trail.images.images|length > 0 %}
                        z-index: calc( {{settings.elements_hive_pro.mouse_effects.images_trail.images.images|length}} + 1);
                    {% else %}
                        z-index: 6;
                    {% endif %}
                }
            {% endif %}

            {% if settings.elements_hive_pro.mouse_effects.images_trail.apply_to_page %}
               .eh-images-trail.eh-for-%%ID%%{
                    position: fixed;
                    inset: 0;
                    pointer-events: none;
                }
                .breakdance .bde-section .section-container {
                    {% if settings.elements_hive_pro.mouse_effects.images_trail.images.images|length > 0 %}
                        z-index: calc( {{settings.elements_hive_pro.mouse_effects.images_trail.images.images|length}} + 1);
                    {% else %}
                        z-index: 6;
                    {% endif %}
                }
            {% endif %}
        {% endif %}
    ';
}
