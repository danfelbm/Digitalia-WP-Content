<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if settings.elements_hive_pro.entrance_animation.animation_type == "block_reveal" %}
            .eh-entrance-animation-block-reveal__wrapper {
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: 1fr;
            }

            .eh-entrance-animation-block-reveal__wrapper>* {

                grid-column-start: 1;
                grid-row-start: 1;
            }


            .breakdance .eh-entrance-animation-block-reveal__wrapper>* {
                width: 100% !important;
                height: 100% !important;
            }

        {% endif %}
    ';
}
