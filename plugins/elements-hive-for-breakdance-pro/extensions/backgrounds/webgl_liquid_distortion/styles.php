<?php

namespace ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\Backgrounds\WebglLiquidDistortion\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive_pro.backgrounds.background_type == "webgl_liquid_distortion" %}
            %%SELECTOR%% .eh-webgl-liquid-distortion-%%ID%%,
            %%SELECTOR%% .eh-webgl-liquid-distortion__canvas  {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            %%SELECTOR%% .eh-webgl-liquid-distortion__canvas {
                position: sticky;
                display: block;
                max-height: 100vh;
            }

            {% if design.elements_hive_pro.backgrounds.webgl_liquid_distortion.apply_to_page != "" %}
                {% if design.elements_hive_pro.backgrounds.webgl_liquid_distortion.apply_to_page == true %}
                    .eh-webgl-liquid-distortion-%%ID%% {
                        position: fixed;
                        inset: 0;
                        width: 100vw;
                        height: 100vh;
                        max-height: 100vh;
                        {% if not isBuilder %}
                            z-index: -1;
                        {% endif %}
                    }

                    .eh-webgl-liquid-distortion-%%ID%% .eh-webgl-liquid-distortion__canvas  {
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
