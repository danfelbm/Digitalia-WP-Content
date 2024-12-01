<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\SvgPathDrawer",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class SvgPathDrawer extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="currentColor">     <path d="M560 936q-12 0-21-9t-9-21q0-13 9-21.5t21-8.5q59 0 99.5-24t40.5-56q0-23-29.5-45T591 717l47-47q63 19 92.5 52.5T760 796q0 67-61 103.5T560 936ZM240 642q-64-14-92-44t-28-62q0-35 26-63t120-62q66-24 85-39t19-35q0-25-22-43t-68-18q-27 0-46 7t-34 22q-8 8-20.5 9.5T157 308q-11-8-11.5-20t7.5-21q17-22 51-36.5t76-14.5q68 0 109 32.5t41 88.5q0 41-28.5 69.5T290 466q-67 25-88.5 39.5T180 536q0 16 27 30.5t81 27.5l-48 48Zm496-154L608 360l45-45q18-18 40-18t40 18l48 48q18 18 18 40t-18 40l-45 45ZM220 876h42l345-345-42-42-345 345v42Zm-60 60V808l405-405 128 128-405 405H160Zm405-447 42 42-42-42Z"/> </svg>';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'SVG Path Drawer';
    }

    static function className()
    {
        return 'eh-svg-drawer';
    }

    static function category()
    {
        return 'elements_hive_pro';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--yellow300)', 'textColor' => 'var(--gray50)', 'label' => 'Pro'];
    }

    static function slug()
    {
        return get_class();
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return ['content' => ['content' => ['svg' => ['slug' => 'icon-ehtext6.', 'name' => 'ehtext6', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
    <path d="M 47.79 116.579 L 48.196 116.815 L 48.603 116.579 L 62.017 108.806 L 62.424 108.571 L 62.017 108.335 L 35.921 93.213 L 42.424 89.444 L 66.244 103.247 L 66.651 103.483 L 67.058 103.247 L 80.471 95.474 L 80.878 95.238 L 80.471 95.003 L 56.651 81.199 L 63.155 77.431 L 88.844 92.317 L 89.252 92.553 L 89.658 92.317 L 103.072 84.544 L 103.478 84.309 L 103.072 84.073 L 74.943 67.773 C 70.241 65.048 65.627 63.81 61.141 63.866 C 56.661 63.921 52.443 65.265 48.522 67.538 L 18.849 84.733 C 14.928 87.005 12.608 89.449 12.512 92.045 C 12.416 94.645 14.553 97.319 19.255 100.044 L 47.79 116.579 Z"/>
    <path d="M 126.647 98.209 L 127.054 97.973 L 126.647 97.738 L 111.607 89.022 L 111.201 88.787 L 110.794 89.022 L 68.52 113.52 C 64.599 115.792 62.28 118.236 62.184 120.832 C 62.088 123.432 64.225 126.106 68.927 128.831 L 95.185 144.047 L 95.592 144.283 L 95.998 144.047 L 109.819 136.038 L 110.225 135.803 L 109.819 135.567 L 85.999 121.764 L 126.647 98.209 Z"/>
    <path d="M 144.858 172.832 L 145.265 173.068 L 145.671 172.832 L 159.085 165.058 L 159.492 164.823 L 159.085 164.587 L 132.989 149.465 L 139.493 145.696 L 163.312 159.5 L 163.719 159.736 L 164.125 159.5 L 177.539 151.726 L 177.946 151.491 L 177.539 151.255 L 153.72 137.452 L 160.223 133.683 L 185.913 148.57 L 186.319 148.806 L 186.726 148.57 L 200.14 140.797 L 200.546 140.561 L 200.14 140.326 L 172.011 124.026 C 167.309 121.301 162.696 120.062 158.21 120.118 C 153.729 120.174 149.51 121.518 145.59 123.79 L 115.917 140.985 C 111.996 143.257 109.676 145.702 109.58 148.298 C 109.484 150.898 111.621 153.571 116.323 156.296 L 144.858 172.832 Z"/>
    <path d="M 168.191 186.446 L 212.253 167.037 L 188.758 190.639 C 185.344 194.031 187.132 197.706 191.604 200.296 C 196.156 202.935 202.335 203.783 208.595 201.757 L 248.999 188.425 L 214.692 213.393 L 229.894 222.203 L 269.242 191.864 C 274.932 187.435 274.12 182.819 267.697 179.097 C 261.844 175.705 254.202 174.386 246.56 177.024 L 210.302 189.461 L 231.926 168.262 C 236.479 163.833 234.122 159.64 228.431 156.342 C 221.846 152.527 213.798 151.914 206.237 155.071 L 152.907 177.59 L 168.191 186.446 Z"/>
    <path d="M 279.648 250.94 L 280.054 251.176 L 280.461 250.94 L 293.875 243.168 L 294.281 242.932 L 293.875 242.696 L 267.779 227.574 L 274.282 223.805 L 298.102 237.608 L 298.508 237.844 L 298.915 237.608 L 312.329 229.835 L 312.735 229.6 L 312.329 229.364 L 288.509 215.561 L 295.012 211.792 L 320.702 226.679 L 321.109 226.914 L 321.515 226.679 L 334.929 218.905 L 335.336 218.67 L 334.929 218.434 L 306.801 202.135 C 302.099 199.41 297.485 198.172 292.999 198.227 C 288.518 198.283 284.301 199.626 280.38 201.899 L 250.706 219.094 C 246.785 221.366 244.466 223.811 244.37 226.407 C 244.273 229.006 246.411 231.68 251.113 234.404 L 279.648 250.94 Z"/>
    <path d="M 301.964 263.92 L 302.37 264.156 L 302.776 263.92 L 335.19 245.136 L 324.328 272.986 C 323.133 276.054 325.369 278.896 329.197 281.115 C 334.183 284.003 342.516 284.704 348.628 281.162 L 395.454 254.026 L 395.861 253.791 L 395.454 253.555 L 381.227 245.311 L 380.821 245.076 L 380.414 245.311 L 348.081 264.047 L 358.944 236.199 L 358.944 236.198 C 360.139 233.131 357.986 230.335 354.074 228.069 C 349.084 225.177 340.671 224.53 334.563 228.069 L 287.736 255.204 L 287.33 255.44 L 287.736 255.675 L 301.964 263.92 Z"/>
    <path d="M 449.719 285.423 L 450.126 285.187 L 449.719 284.951 L 403.625 258.24 L 403.218 258.004 L 402.812 258.24 L 388.991 266.249 L 388.585 266.485 L 388.991 266.719 L 404.112 275.483 L 363.464 299.037 L 363.058 299.273 L 363.464 299.508 L 378.504 308.224 L 378.911 308.46 L 379.317 308.224 L 419.965 284.669 L 435.087 293.432 L 435.493 293.667 L 435.9 293.432 L 449.719 285.423 Z"/>
    <path d="M 470.424 317.867 L 470.283 318.17 L 470.797 318.27 L 489.577 321.897 L 490.105 321.999 L 490.298 321.697 C 494.782 314.67 490.855 307.33 481.141 301.7 C 468.789 294.543 451.673 293.714 441.306 299.722 C 434.607 303.604 433.513 307.822 435.002 311.753 C 436.484 315.66 440.51 319.275 444.015 322.015 C 446.148 323.679 447.838 325.004 448.616 326.143 C 449 326.705 449.142 327.195 449.029 327.638 C 448.918 328.075 448.551 328.501 447.809 328.931 C 446.704 329.571 445.245 329.694 443.508 329.361 C 441.748 329.026 439.77 328.229 437.81 327.093 C 435.286 325.63 433.683 324.26 432.918 322.93 C 432.159 321.609 432.214 320.309 433.066 318.963 L 433.269 318.641 L 432.707 318.533 L 413.928 314.905 L 413.4 314.803 L 413.207 315.106 C 408.719 322.137 412.657 329.476 423.176 335.573 C 435.506 342.718 453.44 344.04 463.824 338.023 C 470.554 334.124 471.822 330.004 470.496 326.174 C 469.179 322.371 465.312 318.87 461.848 316.154 C 459.568 314.36 457.83 312.842 457.028 311.563 C 456.63 310.927 456.479 310.373 456.583 309.888 C 456.685 309.41 457.041 308.976 457.727 308.579 C 458.725 308.001 459.861 307.823 461.169 308.008 C 462.523 308.198 464.099 308.785 465.858 309.804 C 470.839 312.691 471.506 315.537 470.424 317.867 Z"/>
    <path d="M 62.387 215.107 L 62.793 215.342 L 63.2 215.107 L 83.199 203.518 L 103.93 215.531 L 83.93 227.12 L 83.524 227.355 L 83.93 227.591 L 98.97 236.306 L 99.377 236.542 L 99.783 236.306 L 154.658 204.507 L 155.065 204.272 L 154.658 204.036 L 139.618 195.32 L 139.212 195.085 L 138.805 195.32 L 118.563 207.05 L 97.832 195.038 L 118.075 183.307 L 118.481 183.072 L 118.075 182.836 L 103.035 174.121 L 102.629 173.886 L 102.222 174.121 L 47.347 205.92 L 46.94 206.155 L 47.347 206.391 L 62.387 215.107 Z"/>
    <path d="M 162.788 208.749 L 162.381 208.514 L 161.975 208.749 L 107.1 240.548 L 106.693 240.784 L 107.1 241.019 L 122.14 249.735 L 122.546 249.971 L 122.953 249.735 L 177.828 217.936 L 178.234 217.7 L 177.828 217.464 L 162.788 208.749 Z"/>
    <path d="M 157.585 270.556 C 164.902 274.797 172.788 275.032 182.543 272.017 L 241.32 253.973 L 225.955 245.07 L 173.681 261.7 C 173.357 261.794 173.194 261.794 173.031 261.7 C 172.868 261.606 172.868 261.512 173.031 261.323 L 201.567 230.937 L 186.201 222.033 L 155.065 256.094 C 149.862 261.747 150.268 266.316 157.585 270.556 Z"/>
    <path d="M 235.061 315.169 L 235.467 315.404 L 235.874 315.169 L 249.288 307.396 L 249.694 307.161 L 249.288 306.925 L 223.192 291.803 L 229.695 288.034 L 253.515 301.837 L 253.921 302.072 L 254.328 301.837 L 267.742 294.064 L 268.148 293.828 L 267.742 293.593 L 243.922 279.79 L 250.426 276.021 L 276.115 290.907 L 276.522 291.143 L 276.928 290.907 L 290.342 283.134 L 290.749 282.899 L 290.342 282.664 L 262.214 266.363 C 257.512 263.638 252.898 262.4 248.411 262.456 C 243.932 262.511 239.713 263.855 235.792 266.128 L 206.119 283.322 C 202.198 285.595 199.878 288.039 199.782 290.635 C 199.686 293.235 201.824 295.909 206.526 298.633 L 235.061 315.169 Z"/>
</svg>']], 'animation_trigger' => ['trigger' => 'inViewport'], 'mouse_interaction' => ['redraw_on_hover' => false, 'redraw_on_click' => false], 'animation' => ['animation_type' => 'sync', 'easing' => 'Vivus.EASE_OUT_BOUNCE', 'duration_factor' => 100]], 'design' => ['svg' => ['width' => ['number' => 600, 'unit' => 'px', 'style' => '600px'], 'override_stroke_color' => null, 'stroke_color' => null, 'override_stroke_width' => null, 'stroke_width' => null], 'animation_trigger' => null, 'animation' => null]];
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "svg",
        "SVG",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'rem', '2' => '%'], 'defaultType' => 'px']],
        false,
        false,
        [],
      ), c(
        "override_stroke_color",
        "Override Stroke Color",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "stroke_color",
        "Stroke Color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.svg.override_stroke_color', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "override_stroke_width",
        "Override Stroke Width",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "stroke_width",
        "Stroke Width",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.svg.override_stroke_width', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "animation_trigger",
        "Animation Trigger",
        [c(
        "trigger",
        "Trigger",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'inViewport', 'text' => 'Entrance Animation'], '1' => ['text' => 'Scroll Animation', 'value' => 'manual']], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small']],
        false,
        false,
        [],
      ), c(
        "use_as_page_progress",
        "Use as Page Progress",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual']]]],
        false,
        false,
        [],
      ), c(
        "relative_to",
        "Relative To",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Viewport', 'value' => 'viewport'], '1' => ['text' => 'Page', 'value' => 'page'], '2' => ['text' => 'Custom', 'value' => 'custom']], 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "trigger_location",
        "Trigger Location",
        [],
        ['type' => 'slider', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1], 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "custom_selector",
        "Custom Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.relative_to', 'operand' => 'equals', 'value' => 'custom'], '2' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "draw_mode",
        "Draw Mode",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'downUp', 'text' => 'Scroll Down and Up'], '1' => ['text' => 'Scroll Down Only', 'value' => 'down'], '2' => ['text' => 'Scroll Up Only', 'value' => 'up']], 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "run_once",
        "Run Once",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.draw_mode', 'operand' => 'not equals', 'value' => 'downUp'], '2' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "show_debug_markers",
        "Show Debug Markers",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'manual'], '1' => ['path' => 'design.animation_trigger.use_as_page_progress', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "animation",
        "Animation",
        [c(
        "animation_type",
        "Animation Type",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'delayed', 'text' => 'Delayed'], '1' => ['text' => 'Synchronized', 'value' => 'sync'], '2' => ['text' => 'One by One', 'value' => 'oneByOne']]],
        false,
        false,
        [],
      ), c(
        "easing",
        "Easing",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'Vivus.LINEAR', 'text' => 'Linear'], '1' => ['value' => 'Vivus.EASE', 'text' => 'Ease'], '2' => ['text' => 'Ease In', 'value' => 'Vivus.EASE_IN'], '3' => ['text' => 'Ease Out', 'value' => 'Vivus.EASE_OUT'], '4' => ['text' => 'Ease Out Bounce', 'value' => 'Vivus.EASE_OUT_BOUNCE']], 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'inViewport']]]],
        false,
        false,
        [],
      ), c(
        "duration_factor",
        "Duration Factor",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 's'], 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'inViewport']]], 'rangeOptions' => ['min' => 1, 'max' => 10, 'step' => 0.1]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "mouse_interaction",
        "Mouse Interaction",
        [c(
        "redraw_on_hover",
        "Redraw on Hover",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "redraw_on_click",
        "Redraw on Click",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.animation_trigger.trigger', 'operand' => 'equals', 'value' => 'inViewport']]]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "content",
        "Content",
        [c(
        "svg",
        "SVG",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "supported_svg_info",
        "Supported SVG Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'info', 'content' => '<ol><li><p>SVG Fill color cannot be drawn, only stroke-based SVGs are supported</p></li><li><p>SVG &lt;text&gt; elements should be converted to a &lt;path&gt; before uploading the file.</p></li></ol>']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'Instances Manager','scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js'],'frontendCondition' => 'return false;',],'1' =>  ['title' => 'With Scroll Dependencies','scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_SCROLLTRIGGER],'builderCondition' => 'return \'{{design.animation_trigger.trigger}}\' !== \'inViewport\'  ? true : false;','frontendCondition' => 'return \'{{design.animation_trigger.trigger}}\' !== \'inViewport\'  ? true : false;',],'2' =>  ['title' => 'EhSvgDraw','scripts' => [ELEMENTS_HIVE_PRO_DIR . 'elements/SVG_Path_Drawer/assets/js/eh_svg_drawer.min.js'],],'3' =>  ['title' => 'init Builder','inlineScripts' => ['( function() {
    const svgEl = document.querySelector(\'%%SELECTOR%%>svg\');
    if(!svgEl || window.EhInstancesManager.instanceExists(\'EhSvgDrawer\', \'%%ID%%\')) return;
    const options = {};
    options.svgEl = svgEl;
    options.type = "{{design.animation.animation_type|default(\'sync\')}}";
      options.start = "{{design.animation_trigger.trigger|default(\'inViewport\')}}";
    options.animTimingFunction = {{design.animation.easing|default(\'Vivus.EASE\')}};
     options.duration = {{design.animation.duration_factor|default(2)}} * 60;
    options.triggerLocation = {{design.animation_trigger.trigger_location|json_encode}};
    options.runOnce = {{ design.animation_trigger.run_once ? true : false }};
	options.redrawOnHover = {{ design.mouse_interaction.redraw_on_hover ? true : false }};
    options.redrawOnClick = {{ design.mouse_interaction.redraw_on_click ? true : false }};
    options.drawMode = \'{{design.animation_trigger.draw_mode|default("downUp")}}\';
    options.enableMarkers = {{design.animation_trigger.show_debug_markers ? true : false }};
    options.id = \'%%ID%%\';
options.isPageIndicator = {{ design.animation_trigger.use_as_page_progress ? true : false }};

   switch("{{design.animation_trigger.relative_to}}") {
     case "page":
           options.trigger = document.documentElement;
           break;
     case "custom":
        try{
          options.trigger = document.querySelector(\'{{design.animation_trigger.custom_selector}}\');
        } catch(e) {
          options.trigger = svgEl;
          throw new Error(\'SVG Drawer #%%ID%%: invalid custom selector\');
       }
       break;
     case "viewport":
     default:
        options.trigger = svgEl;
        break;
   }
 if (options.isPageIndicator) {
      options.trigger = document.documentElement;
      options.runOnce = false;
      options.redrawOnHover = false;
      options.redrawOnClick = false;
      options.drawMode = \'downUp\';
    }
const instance = new EhSvgDrawer(options);
   window.EhInstancesManager.registerInstance(\'EhSvgDrawer\', \'%%ID%%\', instance);
}());'],'frontendCondition' => 'return false;',],'4' =>  ['title' => 'init Front','inlineScripts' => ['( function() {
    const svgEl = document.querySelector(\'%%SELECTOR%%>svg\');
    if(!svgEl) return;

  const options = {}
    options.svgEl = svgEl;
    options.type = "{{design.animation.animation_type|default(\'sync\')}}";
    options.start = "{{design.animation_trigger.trigger|default(\'inViewport\')}}";
    options.animTimingFunction = {{design.animation.easing|default(\'Vivus.EASE\')}};
    options.duration = {{design.animation.duration_factor|default(2)}} * 60;
    options.triggerLocation = {{design.animation_trigger.trigger_location|json_encode}};
   options.runOnce = {% if design.animation_trigger.run_once %} true {% else %} false {% endif %};
	options.redrawOnHover = {% if design.mouse_interaction.redraw_on_hover %} true {% else %} false {% endif %};
    options.redrawOnClick = {% if design.mouse_interaction.redraw_on_click %} true {% else %} false {% endif %};
    options.drawMode = \'{{design.animation_trigger.draw_mode|default("downUp")}}\';
    options.enableMarkers = {% if design.animation_trigger.show_debug_markers %} true {% else %} false {% endif %};
	options.isPageIndicator = {% if design.animation_trigger.use_as_page_progress %} true {% else %} false {% endif %};


	switch("{{design.animation_trigger.relative_to}}") {
     case "page":
        options.trigger = document.documentElement;
        break;
     case "custom":
        try{
          options.trigger = document.querySelector(\'{{design.animation_trigger.custom_selector}}\');
        } catch(e) {
          options.trigger = svgEl;
          throw new Error(\'SVG Drawer #%%ID%%: invalid custom selector\');
       }
       break;
     case "viewport":
     default:
         options.trigger = svgEl;
       break;
    }
    if (options.isPageIndicator) {
      options.trigger = document.documentElement;
      options.runOnce = false;
        options.redrawOnHover = false;
        options.redrawOnClick = false;
        options.drawMode = \'downUp\';
    }

    new EhSvgDrawer(options);
}());'],'builderCondition' => 'return false;','frontendCondition' => 'return true;',],];
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => '( function() {
	const svgEl = document.querySelector(\'%%SELECTOR%%>svg\')
    if(!svgEl) return
 	if ( window.EhInstancesManager.instanceExists(\'EhSvgDrawer\', \'%%ID%%\') ) {
    	let instance = window.EhInstancesManager.getInstance(\'EhSvgDrawer\', \'%%ID%%\')
        instance.destroy()
     	window.EhInstancesManager.deleteInstance(\'EhSvgDrawer\', \'%%ID%%\')
    }

  const options = {}
    options.svgEl = svgEl
    options.type = "{{design.animation.animation_type|default(\'sync\')}}"
  	options.start = "{{design.animation_trigger.trigger|default(\'inViewport\')}}"
    options.animTimingFunction = {{design.animation.easing|default(\'Vivus.EASE\')}}
 	options.duration = {{design.animation.duration_factor|default(2)}} * 60
	options.triggerLocation = {{design.animation_trigger.trigger_location|json_encode}}
	options.runOnce = {{ design.animation_trigger.run_once ? true : false }}
	options.redrawOnHover = {{ design.mouse_interaction.redraw_on_hover ? true : false }}
    options.redrawOnClick = {{ design.mouse_interaction.redraw_on_click ? true : false }}
    options.drawMode = \'{{design.animation_trigger.draw_mode|default("downUp")}}\'
    options.enableMarkers = {{design.animation_trigger.show_debug_markers ? true : false }}
    options.id = \'%%ID%%\'
options.isPageIndicator = {{ design.animation_trigger.use_as_page_progress ? true : false }}

   switch("{{design.animation_trigger.relative_to}}") {
     case "page":
       	options.trigger = document.documentElement
       break
     case "custom":
       try{
          options.trigger = document.querySelector(\'{{design.animation_trigger.custom_selector}}\')
        } catch(e) {
          options.trigger = svgEl
          throw new Error(\'SVG Drawer #%%ID%%: invalid custom selector\')
       }
       break
     case "viewport":
     default:
     	options.trigger = svgEl
       break
   }
if (options.isPageIndicator) {
      options.trigger = document.documentElement
  options.runOnce = false
        options.redrawOnHover = false
        options.redrawOnClick = false
        options.drawMode = \'downUp\';
    }

   const instance = new EhSvgDrawer(options)
   window.EhInstancesManager.registerInstance(\'EhSvgDrawer\', \'%%ID%%\', instance)
}());',
],],

'onMovedElement' => [['script' => '( function() {
	const svgEl = document.querySelector(\'%%SELECTOR%%>svg\')
    if(!svgEl) return
 	if ( window.EhInstancesManager.instanceExists(\'EhSvgDrawer\', \'%%ID%%\') ) {
    	let instance = window.EhInstancesManager.getInstance(\'EhSvgDrawer\', \'%%ID%%\')
        instance.destroy()
     	window.EhInstancesManager.deleteInstance(\'EhSvgDrawer\', \'%%ID%%\')
    }

  const options = {}
    options.svgEl = svgEl
    options.type = "{{design.animation.animation_type|default(\'sync\')}}"
  	options.start = "{{design.animation_trigger.trigger|default(\'inViewport\')}}"
    options.animTimingFunction = {{design.animation.easing|default(\'Vivus.EASE\')}}
 	options.duration = {{design.animation.duration_factor|default(2)}} * 60
	options.triggerLocation = {{design.animation_trigger.trigger_location|json_encode}}
	options.runOnce = {{ design.animation_trigger.run_once ? true : false }}
	options.redrawOnHover = {{ design.mouse_interaction.redraw_on_hover ? true : false }}
    options.redrawOnClick = {{ design.mouse_interaction.redraw_on_click ? true : false }}
    options.drawMode = \'{{design.animation_trigger.draw_mode|default("downUp")}}\'
    options.enableMarkers = {{design.animation_trigger.show_debug_markers ? true : false }}
    options.id = \'%%ID%%\'
options.isPageIndicator = {{ design.animation_trigger.use_as_page_progress ? true : false }}

   switch("{{design.animation_trigger.relative_to}}") {
     case "page":
       	options.trigger = document.documentElement
       break
     case "custom":
       try{
          options.trigger = document.querySelector(\'{{design.animation_trigger.custom_selector}}\')
        } catch(e) {
          options.trigger = svgEl
          throw new Error(\'SVG Drawer #%%ID%%: invalid custom selector\')
       }
       break
     case "viewport":
     default:
     	options.trigger = svgEl
       break
   }
if (options.isPageIndicator) {
      options.trigger = document.documentElement
  options.runOnce = false
        options.redrawOnHover = false
        options.redrawOnClick = false
        options.drawMode = \'downUp\';
    }
   const instance = new EhSvgDrawer(options)
   window.EhInstancesManager.registerInstance(\'EhSvgDrawer\', \'%%ID%%\', instance)
}());',
],],

'onAfterDeletedElement' => [['script' => '( function() {


 	if ( window.EhInstancesManager.instanceExists(\'EhSvgDrawer\', \'%%ID%%\') ) {
    	let instance = window.EhInstancesManager.getInstance(\'EhSvgDrawer\', \'%%ID%%\')
        instance.destroy()
     	window.EhInstancesManager.deleteInstance(\'EhSvgDrawer\', \'%%ID%%\')
    }


}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['cssProperty' => 'margin-bottom', 'location' => 'outside-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 7;
    }

    static function dynamicPropertyPaths()
    {
        return [];
    }

    static function additionalClasses()
    {
        return false;
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return false;
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
