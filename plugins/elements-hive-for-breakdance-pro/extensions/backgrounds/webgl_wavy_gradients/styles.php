<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglWavyGradients;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdance\Extensions\Backgrounds\WebglWavyGradients\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive_pro.backgrounds.background_type == "webgl_wavy_gradients" %}
            %%SELECTOR%% .eh-webgl-wavy-gradients-%%ID%%,
            %%SELECTOR%% .eh-webgl-wavy-gradients__canvas  {
                position: absolute;
                inset: 0;
                width: 100%;
                height: 100%;
            }

            %%SELECTOR%% .eh-webgl-wavy-gradients__canvas {
                position: sticky;
                display: block;
                max-height: 100vh;

            }

            {% if design.elements_hive_pro.backgrounds.webgl_wavy_gradients.apply_to_page != "" %}
                {% if design.elements_hive_pro.backgrounds.webgl_wavy_gradients.apply_to_page == true %}
                    .eh-webgl-wavy-gradients-%%ID%% {
                        position: fixed;
                        inset: 0;
                        width: 100vw;
                        height: 100vh;
                        max-height: 100vh;
                        z-index: -1;
                    }

                    .eh-webgl-wavy-gradients-%%ID%% .eh-webgl-wavy-gradients__canvas  {
                        position: relative;
                        width: 100%;
                        height: 100%;
                        max-height: 100vh;
                    }

                    {% if isBuilder %}
                        .eh-webgl-wavy-gradients-%%ID%% {
                            z-index: 0;
                        }

                        .breakdance .bde-section,
                        header,
                        footer {
                            z-index: 1;
                        }

                    {% endif %}


                {% endif %}
            {% endif %}

        {% endif %}
    ';
}
