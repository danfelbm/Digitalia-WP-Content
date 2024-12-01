<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\Displacement\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if settings.elements_hive_pro.entrance_animation.animation_type == "displacement" %}
            %%SELECTOR%% {
                opacity: 0;
                filter: url("#eh-entrance-animation-displacement-%%ID%%");
                will-change: transform;
            }

        {% endif %}
    ';
}
