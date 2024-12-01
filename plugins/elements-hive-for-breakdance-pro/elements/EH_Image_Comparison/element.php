<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\EhImageComparison",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class EhImageComparison extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="currentColor"><path d="M21 7.6v12.8a.6.6 0 01-.6.6H7.6a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6h12.8a.6.6 0 01.6.6z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 4H4.6a.6.6 0 00-.6.6V18M7 16.8l5.444-1.8L21 18M16.5 13a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>';
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
        return 'EH Image Comparison';
    }

    static function className()
    {
        return 'eh-image-comparison';
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
        return ['content' => ['images' => ['before' => ['id' => 1123, 'filename' => 'block1.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/blocks1.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/blocks1.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]], 'after' => ['id' => 1122, 'filename' => 'blocks2.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/blocks2.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/blocks2.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]]], 'design' => ['size' => ['width' => ['number' => 50, 'unit' => '%', 'style' => '50%']]]];
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
        "size",
        "Size",
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
      ), c(
        "separator",
        "Separator",
        [c(
        "direction",
        "Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'horizontal', 'text' => 'Horizontal'], '1' => ['text' => 'Vertical', 'value' => 'vertical']]],
        false,
        false,
        [],
      ), c(
        "starting_position",
        "Starting Position",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 0.1]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "filters",
        "Filters",
        [getPresetSection(
      "EssentialElements\\filter",
      "Before Image",
      "before_image",
       ['type' => 'accordion']
     ), getPresetSection(
      "EssentialElements\\filter",
      "After Image",
      "after_image",
       ['type' => 'accordion']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
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
        return [c(
        "images",
        "Images",
        [c(
        "before",
        "Before",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "after",
        "After",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "lazy_load",
        "Lazy Load",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        return ['0' =>  ['inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');
  if(!containerEl || window.EhInstancesManager.instanceExists(\'EhImageComparison\', \'%%ID%%\')) return;

  const options = {
  	container: containerEl,
    path: containerEl.querySelector(\'#eh-image-comparison-%%ID%%__clip path\'),
    mode: `{{design.separator.direction|default(\'horizontal\')}}`,
 	startingPosition: {{design.separator.starting_position|default(0.5)}}
  };

  window.EhInstancesManager.registerInstance(\'EhImageComparison\', \'%%ID%%\', new EhImageComparison(options));
}());'],'scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/EH_Image_Comparison/assets/js/eh_image_comparison.min.js'],'title' => 'Builder init','builderCondition' => 'return true;','frontendCondition' => 'return false;',],'1' =>  ['inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');
  if(!containerEl) return;

  const options = {
  	container: containerEl,
    path: containerEl.querySelector(\'#eh-image-comparison-%%ID%%__clip path\'),
    mode: `{{design.separator.direction|default(\'horizontal\')}}`,
 	startingPosition: {{design.separator.starting_position|default(0.5)}}
  };

	new EhImageComparison(options);
}());'],'scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_PRO_DIR . 'elements/EH_Image_Comparison/assets/js/eh_image_comparison.min.js'],'title' => 'Front init','builderCondition' => 'return false;','frontendCondition' => 'return true;',],];
    }

    static function settings()
    {
        return ['bypassPointerEvents' => false];
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
  if(window.EhInstancesManager.instanceExists(\'EhImageComparison\', \'%%ID%%\')) {
  	window.EhInstancesManager.getInstance(\'EhImageComparison\', \'%%ID%%\').destroy()
  }
  const options = {
  	container: containerEl,
    path: containerEl.querySelector(\'#eh-image-comparison-%%ID%%__clip path\'),
    mode: `{{design.separator.direction|default(\'horizontal\')}}`,
 	startingPosition: {{design.separator.starting_position|default(0.5)}}
  }

  window.EhInstancesManager.registerInstance(\'EhImageComparison\', \'%%ID%%\', new EhImageComparison(options))
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
        return 5;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
