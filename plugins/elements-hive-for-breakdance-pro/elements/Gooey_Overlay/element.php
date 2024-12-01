<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\GooeyOverlay",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class GooeyOverlay extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'LayersIcon';
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
        return 'Gooey Overlay';
    }

    static function className()
    {
        return 'eh-gooey-overlay';
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
        return ['content' => ['layers' => ['layers' => ['0' => ['background_color' => '#292929FF'], '1' => ['background_color' => '#FD5A00FF']]]]];
    }

    static function defaultChildren()
    {
        return [['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Put any elements here', 'tags' => 'h2']]], 'children' => []]];
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "trigger",
        "Trigger",
        [c(
        "selector",
        "Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '#example or .example'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "effect",
        "Effect",
        [c(
        "effect_style",
        "Effect Style",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'style_1', 'text' => 'Style 1'], '1' => ['text' => 'Style 2', 'value' => 'style_2'], '2' => ['text' => 'Style 3', 'value' => 'style_3'], '3' => ['text' => 'Style 4', 'value' => 'style_4'], '4' => ['text' => 'Style 5', 'value' => 'style_5'], '5' => ['text' => 'Style 6', 'value' => 'style_6'], '6' => ['text' => 'Style 7', 'value' => 'style_7'], '7' => ['text' => 'Style 8', 'value' => 'style_8'], '8' => ['text' => 'Style 9', 'value' => 'style_9']], 'placeholder' => 'Style 1'],
        false,
        false,
        [],
      ), c(
        "direction",
        "Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'left', 'text' => 'Label', 'icon' => 'ArrowLeftIcon'], '1' => ['value' => 'right', 'text' => 'Label', 'icon' => 'ArrowRightIcon'], '2' => ['value' => 'up', 'text' => 'Label', 'icon' => 'ArrowUpIcon'], '3' => ['value' => 'down', 'text' => 'Label', 'icon' => 'ArrowDownIcon']]],
        false,
        false,
        [],
      ), c(
        "layers_distance_factor",
        "Layers Distance Factor",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 1, 'max' => 5, 'step' => 0.1]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "builder_mode_helpers",
        "Builder Mode Helpers",
        [c(
        "disable_placeholder",
        "Disable Placeholder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "toggle_overlay",
        "Toggle Overlay",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "new_control",
        "New Control",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>If you have elements below the overlay and are unable to select them in the Breakdance canvas, make sure Toggle Overlay is disabled!</p>']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "layers",
        "Layers",
        [c(
        "layers",
        "Layers",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical', 'colorOptions' => ['type' => 'solidAndGradient']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical'],
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
        return ['0' =>  ['scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets//js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/Gooey_Overlay/assets/js/eh_gooey_overlay.min.js'],'inlineScripts' => ['( function() {

	const containerEl = document.querySelector(\'%%SELECTOR%%\');
    if(!containerEl || window.EhInstancesManager.instanceExists(\'EhGooeyOverlay\', \'%%ID%%\')) return;

    let triggers = null;
    try {
    	triggers = document.querySelectorAll(\'{{ design.trigger.selector }}\');
    } catch(e) {
    	triggers = null;
    }

  const options = {};

  options.containerEl = containerEl;
  options.triggers = triggers;
  options.paths = containerEl.querySelectorAll(\'.eh-gooey-overlay__path\');
  options.style = `{{design.effect.effect_style|default(\'style_6\')}}`;
  options.duration = {{design.effect.duration.number|default(\'800\')}};
  options.direction = `{{design.effect.direction|default(\'down\')}}`;
  options.layersDistanceFactor = {{ design.effect.layers_distance_factor|default(\'3\') }};
  options.keepOverlayOpen = {{design.builder_mode_helpers.toggle_overlay|default(false)}};
  options.isPlacehoderDisabled = {{design.builder_mode_helpers.disable_placeholder|default(false)}};
  options.isBuilder = {{isBuilder}};

  const instance = new EhGooeyOverlay(options);
  window.EhInstancesManager.registerInstance(\'EhGooeyOverlay\', \'%%ID%%\', instance);
 {% if design.builder_mode_helpers.toggle_overlay %}
  	instance.overlay.toggle();
 {% endif %}

})();'],'title' => 'Builder init','frontendCondition' => 'return false;','builderCondition' => 'return true;',],'1' =>  ['scripts' => [ELEMENTS_HIVE_PRO_DIR . 'elements/Gooey_Overlay/assets/js/eh_gooey_overlay.min.js'],'inlineScripts' => ['( function() {
	const containerEl = document.querySelector(\'%%SELECTOR%%\');
    if(!containerEl ) return;

    let triggers = null;
    try {
    	triggers = document.querySelectorAll(\'{{design.trigger.selector}}\');
    } catch(e) {
    	triggers = null;
    }

  const options = {};

  options.containerEl = containerEl;
  options.triggers = triggers;
  options.paths = containerEl.querySelectorAll(\'.eh-gooey-overlay__path\');
 options.style = `{{design.effect.effect_style|default(\'style_6\')}}`;
  options.duration = {{design.effect.duration.number|default(\'800\')}};
  options.direction = `{{design.effect.direction|default(\'down\')}}`;
  options.layersDistanceFactor = {{ design.effect.layers_distance_factor|default(\'3\') }};

  const instance = new EhGooeyOverlay(options);

})();'],'title' => 'Front init','builderCondition' => 'return false;','frontendCondition' => 'return true;',],];
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
  const containerEl = document.querySelector(\'%%SELECTOR%%\')
  if(!containerEl) return

  const instance = window.EhInstancesManager.getInstance(\'EhGooeyOverlay\', \'%%ID%%\')
  if (!instance) return


  	 let triggers = null
    try {
    	triggers = document.querySelectorAll(\'{{ design.trigger.selector }}\')
    } catch(e) {
    	triggers = null
    }

    instance.triggers = triggers
    instance.paths = containerEl.querySelectorAll(\'.eh-gooey-overlay__path\')
    instance.style = `{{design.effect.effect_style|default(\'style_6\')}}`
    instance.duration = {{design.effect.duration.number|default(\'800\')}}
    instance.direction = `{{design.effect.direction|default(\'down\')}}`
    instance.layersDistanceFactor = {{ design.effect.layers_distance_factor|default(\'3\') }}
    instance.keepOverlayOpen = {{design.builder_mode_helpers.toggle_overlay|default(false)}}
    instance.isPlacehoderDisabled = {{design.builder_mode_helpers.disable_placeholder|default(false)}}
    instance.isBuilder = {{isBuilder}}
    instance.hasPropsChanged = true
	instance.update()
	{% if design.builder_mode_helpers.toggle_overlay %}
	  if (!instance.overlay.isOpened) instance.overlay.toggle()
     {% else %}
     if (instance.overlay.isOpened) instance.overlay.toggle()
    {% endif %}

}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container",   ];
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
        return 4;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'image_url', 'path' => 'content.layers.new_control.background.layers[].image'], '1' => ['accepts' => 'string', 'path' => 'design.trigger.selector'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '11' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '12' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '13' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '14' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '15' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '16' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '17' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '18' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.container.background.image', 'design.container.background.overlay.image', 'design.container.background.image_settings.unset_image_at', 'design.container.background.image_settings.size', 'design.container.background.image_settings.height', 'design.container.background.image_settings.repeat', 'design.container.background.image_settings.position', 'design.container.background.image_settings.left', 'design.container.background.image_settings.top', 'design.container.background.image_settings.attachment', 'design.container.background.image_settings.custom_position', 'design.container.background.image_settings.width', 'design.container.background.overlay.image_settings.custom_position', 'design.container.background.image_size', 'design.container.background.overlay.image_size', 'design.container.background.overlay.type', 'design.container.background.image_settings', 'design.background.image', 'design.background.overlay.image', 'design.background.image_settings.unset_image_at', 'design.background.image_settings.size', 'design.background.image_settings.height', 'design.background.image_settings.repeat', 'design.background.image_settings.position', 'design.background.image_settings.left', 'design.background.image_settings.top', 'design.background.image_settings.attachment', 'design.background.image_settings.custom_position', 'design.background.image_settings.width', 'design.background.overlay.image_settings.custom_position', 'design.background.image_size', 'design.background.overlay.image_size', 'design.background.overlay.type', 'design.background.image_settings', 'design.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
