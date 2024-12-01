<?php

namespace ElementsHiveForBreakdancePro\Extensions\MouseCursors\MorphingMouseCursor;

add_filter( 'breakdance_element_css_template', 'ElementsHiveForBreakdancePro\Extensions\MouseCursors\MorphingMouseCursor\addStyles', 100, 1 );

/**
 * @param string $css_template
 * @return string
 */
function addStyles( $css_template ) {
	return $css_template . "\n\n" . '
        {% if design.elements_hive_pro.mouse_cursors.cursor_type == "morphing_cursor" %}
            body {
                cursor: none;
            }
            .eh-morphing-cursor-wrapper.eh-for-%%ID%% {
                --cursorSize: {{design.elements_hive_pro.mouse_cursors.morphing_cursor.cursor_size.number|default("60")}};
                position: fixed;
                inset: 0;
                width: 240px;
                height: 240px;
                pointer-events: none;
                z-index: {{design.elements_hive_pro.mouse_cursors.morphing_cursor.z_index|default("100")}};
            }
            .eh-morphing-cursor-inner,
            .eh-morphing-cursor-icon-wrapper,
            .eh-morphing-cursor-icon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .eh-morphing-cursor-icon svg {
                width: 100%;
                height: 100%;
            }
            .eh-morphing-cursor-wrapper.eh-for-%%ID%% .eh-morphing-cursor-inner {
                width: calc(var(--cursorSize) * 1px);
                height: calc(var(--cursorSize) * 1px);
                border-radius: 50%;
                transition: width .3s cubic-bezier(.4, .8, .74, 1) 0s, height .3s cubic-bezier(.4, .8, .74, 1) 0s, background-color .3s cubic-bezier(.4, .8, .74, 1) 0s, border .3s cubic-bezier(.4, .8, .74, 1) 0s;
                {% if design.elements_hive_pro.mouse_cursors.morphing_cursor.style|default("background") == "background" %}
                    {{ macros.backgroundColor(design.elements_hive_pro.mouse_cursors.morphing_cursor.color|default("#fd5a00")) }}
                {% elseif design.elements_hive_pro.mouse_cursors.morphing_cursor.style|default("background") == "border" %}
                    border: 1px solid {{design.elements_hive_pro.mouse_cursors.morphing_cursor.color|default("#000000")}};
                {% endif %}
            }
            .eh-morphing-cursor-wrapper.eh-for-%%ID%% .eh-morphing-cursor-icon {
                transform: translate(-50%, -50%) scale(0);
                transition: transform .3s cubic-bezier(.4, .8, .74, 1);
            }
            {% for item in design.elements_hive_pro.mouse_cursors.morphing_cursor.morph_targets %}
                .eh-morphing-cursor-wrapper.eh-for-%%ID%%[data-eh-active-style="{{item.selector}}"] {
                    --cursorSize: calc( {{design.elements_hive_pro.mouse_cursors.morphing_cursor.cursor_size.number|default("60")}} * {% if item.override_scale %} {{item.scale_factor|default(1)}} {% else %} {{design.elements_hive_pro.mouse_cursors.morphing_cursor.scale_factor|default(1)}} {% endif %});
                }
                .eh-morphing-cursor-wrapper.eh-for-%%ID%%[data-eh-active-style="{{item.selector}}"] .eh-morphing-cursor-inner {
                    {% if item.style|default("background") == "background" %}
                        {% if item.color %}
                            {{ macros.backgroundColor(item.color) }}
                        {% else %}
                            {{ macros.backgroundColor(design.elements_hive_pro.mouse_cursors.morphing_cursor.color|default("#fd5a00")) }}
                        {% endif %}
                        border: none;
                    {% elseif item.style|default("background") == "border" %}
                        border: 1px solid {{item.color|default("#000000")}};
                        background: transparent;
                    {% endif %}
                }
                .eh-morphing-cursor-wrapper[data-eh-active-style="{{item.selector}}"] .eh-morphing-cursor-icon[data-eh-for-selector="{{item.selector}}"] {
                    width: {{item.icon_size.style|default("30px")}};
                    height: {{item.icon_size.style|default("30px")}};
                    transform: translate(-50%, -50%) scale(1);
                    transition: transform .15s cubic-bezier(.4, .8, .74, 1) .15s;
                    color: {{item.icon_color}};
                }
                .eh-morphing-cursor-wrapper[data-eh-active-style="{{item.selector}}"] .eh-morphing-cursor-icon[data-eh-for-selector="{{item.selector}}"] svg {
                    fill: {{item.icon_color}};
                }
            {% endfor %}
        {% endif %}
    ';
}
