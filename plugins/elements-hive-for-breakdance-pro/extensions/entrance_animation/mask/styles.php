<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\mask;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\mask\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if settings.elements_hive_pro.entrance_animation.animation_type == "mask" %}
            {% set settings = settings.elements_hive_pro.entrance_animation %}

            %%SELECTOR%% {
                {% if settings.mask_style == "wipe" %}
                    {% if settings.mask_direction|default("right") == "left" %}
                        clip-path: inset(0% 0% 0% 100%);
                    {% elseif settings.mask_direction|default("right") == "right" %}
                        clip-path: inset(0% 100% 0% 0%);
                    {% elseif settings.mask_direction|default("right") == "up" %}
                        clip-path: inset(100% 0% 0% 0%);
                    {% elseif settings.mask_direction|default("right") == "down" %}
                        clip-path: inset(0% 0% 100% 0%);
                    {% elseif settings.mask_direction|default("right") == "top_left" %}
                        clip-path: polygon(150% 50%, 150% 50%, 50% 150%, 50% 150%);
                    {% elseif settings.mask_direction|default("right") == "top_right" %}
                        clip-path: polygon(-50% 50%, 50% 150%, 50% 150%, -50% 50%);
                    {% elseif settings.mask_direction|default("right") == "bottom_left" %}
                        clip-path: polygon(50% -50%, 150% 50%, 150% 50%, 50% -50%);
                    {% elseif settings.mask_direction|default("right") == "bottom_right" %}
                        clip-path: polygon(0 0, 0 0, 0 0, 0 50%);
                    {% endif %}
                {% elseif settings.mask_style == "circle" %}
                    {% if settings.mask_direction_alternative|default("center") == "center" %}
                        clip-path: circle(0%);
                    {% elseif settings.mask_direction_alternative|default("center") == "left" %}
                        clip-path: circle(0% at 100% 50%);
                    {% elseif settings.mask_direction_alternative|default("center") == "right" %}
                        clip-path: circle(0% at 0% 50%);
                    {% elseif settings.mask_direction_alternative|default("center") == "up" %}
                        clip-path: circle(0% at 50% 100%);
                    {% elseif settings.mask_direction_alternative|default("center") == "down" %}
                        clip-path: circle(0% at 50% 0%);
                    {% elseif settings.mask_direction_alternative|default("center") == "top_left" %}
                        clip-path: circle(0% at bottom right);
                    {% elseif settings.mask_direction_alternative|default("center") == "top_right" %}
                        clip-path: circle(0% at bottom left);
                    {% elseif settings.mask_direction_alternative|default("center") == "bottom_left" %}
                        clip-path: circle(0% at top right);
                    {% elseif settings.mask_direction_alternative|default("center") == "bottom_right" %}
                        clip-path: circle(0% at top left);
                    {% endif %}
                    {% elseif settings.mask_style == "square" %}
                    {% if settings.mask_direction_alternative|default("center") == "center" %}
                        clip-path: inset(100% 100% 100% 100%);
                    {% elseif settings.mask_direction_alternative|default("center") == "left" %}
                        clip-path: inset(25% 0% 25% 100%);
                    {% elseif settings.mask_direction_alternative|default("center") == "right" %}
                        clip-path: inset(25% 100% 25% 0%);
                    {% elseif settings.mask_direction_alternative|default("center") == "up" %}
                        clip-path: inset(100% 25% 0% 25%);
                    {% elseif settings.mask_direction_alternative|default("center") == "down" %}
                        clip-path: inset(0% 25% 100% 25%);
                    {% elseif settings.mask_direction_alternative|default("center") == "top_left" %}
                        clip-path: inset(100% 0 0 100%);
                    {% elseif settings.mask_direction_alternative|default("center") == "top_right" %}
                        clip-path: inset(100% 100% 0 0);
                    {% elseif settings.mask_direction_alternative|default("center") == "bottom_left" %}
                        clip-path: inset(0 0 100% 100%);
                    {% elseif settings.mask_direction_alternative|default("center") == "bottom_right" %}
                        // clip-path: inset(0 100% 100% 0);
                        clip-path: inset(25% 100% 25% 0%);
                    {% endif %}
                {% endif %}

            }

        {% endif %}
    ';
}
