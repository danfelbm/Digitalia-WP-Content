<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\MorphMasker",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class MorphMasker extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="currentColor">     <path d="M80 936v-60h80V216h640v660h80v60H80Zm140-60h168q-8-74-49-148t-119-95v243Zm0-600v244q78-21 118.5-95.5T387 276H220Zm22 300q94 29 146.5 117.5T449 876h62q8-94 60-182.5T717 576q-94-29-146-117.5T511 276h-63q-8 94-60 182.5T242 576Zm498-300H572q8 74 49 148.5T740 520V276Zm0 600V632q-78 21-119 95.5T572 876h168ZM220 276v244-244Zm520 0v244-244Zm0 600V632v244Zm-520 0V633v243Z"/> </svg>';
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
        return 'Morph Masker';
    }

    static function className()
    {
        return 'eh-morph-masker';
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
        return false;
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
        "mask",
        "Mask",
        [c(
        "mask",
        "Mask",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'curve_horizontal', 'text' => 'Curve Center Horizontal'], '1' => ['text' => 'Curve Center Vertical', 'value' => 'curve_vertical'], '2' => ['text' => 'Wave Vertical', 'value' => 'wave_vertical'], '3' => ['text' => 'Wave Horizontal', 'value' => 'wave_horizontal'], '4' => ['text' => 'Squeeze Vertical', 'value' => 'squeeze_vertical'], '5' => ['text' => 'Squeeze Horizontal', 'value' => 'squeeze_horizontal']]],
        false,
        false,
        [],
      ), c(
        "flip",
        "Flip",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
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
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'entrance', 'text' => 'Entrance'], '1' => ['text' => 'Scroll', 'value' => 'scroll']]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's']], 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]],
        false,
        false,
        [],
      ), c(
        "delay",
        "Delay",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1], 'unitOptions' => ['types' => ['0' => 's']], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]],
        false,
        false,
        [],
      ), c(
        "ease",
        "Ease",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Linear', 'value' => 'linear'], '1' => ['text' => 'Expo In', 'value' => 'expo.in'], '2' => ['text' => 'Expo Out', 'value' => 'expo.out'], '3' => ['text' => 'Expo InOut', 'value' => 'expo.inOut'], '4' => ['text' => 'Power1 In', 'value' => 'power1.in'], '5' => ['text' => 'Power1 Out', 'value' => 'power1.out'], '6' => ['text' => 'Power1 InOut', 'value' => 'power1.inOut'], '7' => ['text' => 'Power2 In', 'value' => 'power2.in'], '8' => ['text' => 'Power2 Out', 'value' => 'power2.out'], '9' => ['text' => 'Power2 InOut', 'value' => 'power2.inOut'], '10' => ['text' => 'Power3 In', 'value' => 'power3.in'], '11' => ['text' => 'Power3 Out', 'value' => 'power3.out'], '12' => ['text' => 'Power3 InOut', 'value' => 'power3.inOut'], '13' => ['text' => 'Power4 In', 'value' => 'power4.in'], '14' => ['text' => 'Power4 Out', 'value' => 'power4.out'], '15' => ['text' => 'Power4 InOut', 'value' => 'power4.inOut'], '16' => ['text' => 'Back In', 'value' => 'back.in'], '17' => ['text' => 'Back Out', 'value' => 'back.out'], '18' => ['text' => 'Back InOut', 'value' => 'back.inOut'], '19' => ['text' => 'Elastic In', 'value' => 'elastic.in'], '20' => ['text' => 'Elastic Out', 'value' => 'elastic.out'], '21' => ['text' => 'Elastic InOut', 'value' => 'elastic.inOut'], '22' => ['text' => 'Bounce In', 'value' => 'bounce.in'], '23' => ['text' => 'Bounce Out', 'value' => 'bounce.out'], '24' => ['text' => 'Bounce InOut', 'value' => 'bounce.inOut']], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'entrance']]]],
        false,
        false,
        [],
      ), c(
        "relative_to",
        "Relative To",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'viewport', 'text' => 'Viewport'], '1' => ['text' => 'Page', 'value' => 'page'], '2' => ['text' => 'Custom', 'value' => 'custom']], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
        false,
        false,
        [],
      ), c(
        "selector",
        "Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '#id or .class', 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'scroll'], '1' => ['path' => 'design.animation.relative_to', 'operand' => 'equals', 'value' => 'custom']]]],
        false,
        false,
        [],
      ), c(
        "trigger_location",
        "Trigger Location",
        [],
        ['type' => 'slider', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100, 'step' => 1], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
        false,
        false,
        [],
      ), c(
        "debug_markers",
        "Debug Markers",
        [],
        ['type' => 'toggle', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation_type', 'operand' => 'equals', 'value' => 'scroll']]]],
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
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'rem', '2' => '%', '3' => 'vw']]],
        true,
        false,
        [],
      ), c(
        "min_height",
        "Min Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => '%', '2' => 'rem', '3' => 'vh']]],
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
      "EssentialElements\\LessFancyBackground",
      "Background",
      "background",
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
     )];
    }

    static function contentControls()
    {
        return [];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_SCROLLTRIGGER,ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/Morph_Masker/assets/js/eh_morph_masker.min.js'],'inlineScripts' => ['( function() {
	const containerEl = document.querySelector(\'%%SELECTOR%%\');
    if(!containerEl || window.EhInstancesManager.instanceExists(\'EhMorphMasker\', \'%%ID%%\') ) return;

  const pathEl = containerEl.querySelector(\'.eh-morph-masker__path\');

    const options = {
       containerEl: containerEl,
       svgEl: containerEl.querySelector(\'.eh-morph-masker__svg\'),
       pathEl: pathEl,
      fromPath: pathEl.getAttribute(\'d\'),
       toPath: pathEl.getAttribute("data-path-to"),
       animationType: `{{design.animation.animation_type|default(\'entrance\')}}`,
       duration: {{design.animation.duration.number|default(\'1\')}},
       delay: {{design.animation.delay.number|default(\'0\')}},
       triggerLocation: {{design.animation.trigger_location|json_encode}},
       ease: `{{design.animation.ease|default(\'power2.inOut\')}}`,
       enableMarkers: {{design.animation.debug_markers|default(\'false\')}},
       id: \'eh-morph-masker-%%ID%%\',
       reverse: {{design.mask.flip|default(\'false\')}}
	};
    switch(\'{{design.animation.relative_to}}\') {
      case \'page\':
        options.trigger = document.documentElement;
        break;
      case \'custom\':
        if(\'{{design.animation.selector}}\' !== \'\' ) options.trigger = document.querySelector(\'{{design.animation.selector}}\');
        if (!options.trigger) options.trigger = containerEl;
        break;
      case \'viewport\':
      default:
        options.trigger = containerEl;
        break;
    }
    window.EhInstancesManager.registerInstance(\'EhMorphMasker\', \'%%ID%%\', new EhSvgPathMorpher(options));
}());'],'title' => 'Builder init','builderCondition' => 'return true;','frontendCondition' => 'return false;',],'1' =>  ['scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_SCROLLTRIGGER,ELEMENTS_HIVE_PRO_DIR . 'elements/Morph_Masker/assets/js/eh_morph_masker.min.js'],'inlineScripts' => ['( function() {
	const containerEl = document.querySelector(\'%%SELECTOR%%\');
    if(!containerEl ) return;

  const pathEl = containerEl.querySelector(\'.eh-morph-masker__path\');

    const options = {
       containerEl: containerEl,
       svgEl: containerEl.querySelector(\'.eh-morph-masker__svg\'),
       pathEl: pathEl,
      fromPath: pathEl.getAttribute(\'d\'),
       toPath: pathEl.getAttribute("data-path-to"),
       animationType: `{{design.animation.animation_type|default(\'entrance\')}}`,
       duration: {{design.animation.duration.number|default(\'1\')}},
       delay: {{design.animation.delay.number|default(\'0\')}},
       triggerLocation: {{design.animation.trigger_location|json_encode}},
       ease: `{{design.animation.ease|default(\'power2.inOut\')}}`,
       enableMarkers: {{design.animation.debug_markers|default(\'false\')}},
       id: \'eh-morph-masker-%%ID%%\',
       reverse: {{design.mask.flip|default(\'false\')}}
	};
    switch(\'{{design.animation.relative_to}}\') {
      case \'page\':
        options.trigger = document.documentElement;
        break;
      case \'custom\':
        if(\'{{design.animation.selector}}\' !== \'\' ) options.trigger = document.querySelector(\'{{design.animation.selector}}\');
        if (!options.trigger) options.trigger = containerEl;
        break;
      case \'viewport\':
      default:
        options.trigger = containerEl;
        break;
    }

    new EhSvgPathMorpher(options);
}());'],'title' => 'Frontend init','builderCondition' => 'return false;','frontendCondition' => 'return true;',],];
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
    if(!containerEl ) return

  	window.EhInstancesManager.getInstance(\'EhMorphMasker\', \'%%ID%%\')?.destroy()
    window.EhInstancesManager.deleteInstance(\'EhMorphMasker\', \'%%ID%%\')

    const svgEl = containerEl.querySelector(\'.eh-morph-masker__svg\')
    const clipPathEl = svgEl.querySelector(\'#eh-morph-masker__shape-%%ID%%\')
   containerEl.querySelector(\'.eh-morph-masker__path\')?.remove()
  	clipPathEl.innerHTML = `{{ macros.ElementsHiveForBreakdancePro_GetMaskerMorphPath(design.mask.mask|default(\'curve_horizontal\')) }}`

    const pathEl = containerEl.querySelector(\'.eh-morph-masker__path\')
    const options = {
       containerEl: containerEl,
       svgEl: containerEl.querySelector(\'.eh-morph-masker__svg\'),
       pathEl: pathEl,
       fromPath: pathEl.getAttribute(\'d\'),
       toPath: pathEl.getAttribute("data-path-to"),
       animationType: `{{design.animation.animation_type|default(\'entrance\')}}`,
       duration: {{design.animation.duration.number|default(\'1\')}},
       delay: {{design.animation.delay.number|default(\'0\')}},
       triggerLocation: {{design.animation.trigger_location|json_encode}},
       ease: `{{design.animation.ease|default(\'power2.inOut\')}}`,
       enableMarkers: {{design.animation.debug_markers|default(\'false\')}},
       id: \'eh-morph-masker-%%ID%%\',
         reverse: {{design.mask.flip|default(\'false\')}}
	}
    switch(\'{{design.animation.relative_to}}\') {
      case \'page\':
        options.trigger = document.documentElement
        break
      case \'custom\':
        if(\'{{design.animation.selector}}\' !== \'\' ) options.trigger = document.querySelector(\'{{design.animation.selector}}\')
        if (!options.trigger) options.trigger = containerEl
        break
      case \'viewport\':
      default:
        options.trigger = containerEl
        break
    }
    window.EhInstancesManager.registerInstance(\'EhMorphMasker\', \'%%ID%%\', new EhSvgPathMorpher(options))
}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['location' => 'outside-bottom', 'cssProperty' => 'margin-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
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
        return 6;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.background.image', 'design.background.overlay.image', 'design.background.image_settings.unset_image_at', 'design.background.image_settings.size', 'design.background.image_settings.height', 'design.background.image_settings.repeat', 'design.background.image_settings.position', 'design.background.image_settings.left', 'design.background.image_settings.top', 'design.background.image_settings.attachment', 'design.background.image_settings.custom_position', 'design.background.image_settings.width', 'design.background.overlay.image_settings.custom_position', 'design.background.image_size', 'design.background.overlay.image_size', 'design.background.overlay.type', 'design.background.image_settings', 'design.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
