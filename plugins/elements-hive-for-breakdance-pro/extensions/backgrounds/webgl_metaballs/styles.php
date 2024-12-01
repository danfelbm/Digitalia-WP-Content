<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglMetaballs\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive_pro.backgrounds.background_type == "webgl_metaballs" %}
            %%SELECTOR%% .eh-webgl-metaballs-%%ID%%,
            %%SELECTOR%% .eh-webgl-metaballs__canvas  {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            %%SELECTOR%% .eh-webgl-metaballs__canvas {
                position: sticky;
                display: block;
                max-height: 100vh;
            }

            {% if design.elements_hive_pro.backgrounds.webgl_metaballs.apply_to_page != "" %}
                {% if design.elements_hive_pro.backgrounds.webgl_metaballs.apply_to_page == true %}
                    .eh-webgl-metaballs-%%ID%% {
                        position: fixed;
                        inset: 0;
                        width: 100vw;
                        height: 100vh;
                        max-height: 100vh;
                    }

                    .eh-webgl-metaballs-%%ID%% .eh-webgl-metaballs__canvas  {
                        position: relative;
                        width: 100%;
                        height: 100%;
                    }

                    .breakdance .bde-section .section-container,
                    header,
                    footer {
                        z-index: 2;
                    }
                {% endif %}
            {% endif %}

        {% endif %}
    ';
}
