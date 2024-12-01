<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\MouseEffects\MouseTrack\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if settings.elements_hive_pro.mouse_effects.mouse_track.enabled %}
            %%SELECTOR%% {
                --eh-position-x: 0px;
                --eh-position-y: 0px;
                --eh-position-z: 0px;
                {% if not settings.elements_hive_pro.mouse_effects.tilt_3d.enabled %}
                    --eh-rotation-x: 0deg;
                    --eh-rotation-y: 0deg;
                {% endif %}
                transform: perspective(100vw) translate3d(var(--eh-position-x), var(--eh-position-y), var(--eh-position-z)) rotateX(var(--eh-rotation-x)) rotateY(var(--eh-rotation-y));
            }
        {% endif %}
    ';
}
