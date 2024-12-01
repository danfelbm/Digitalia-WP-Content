<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\ContentAccordionItem",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ContentAccordionItem extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="currentColor">     <path d="M80 381h140v390H80V381Zm200-85h400v560H280V296Zm60 60v440-440Zm400 25h140v390H740V381Zm-400-25v440h280V356H340Z"/> </svg>';
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
        return 'Content Accordion Item';
    }

    static function className()
    {
        return 'eh-content-accordion-item';
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
        return ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-one.', 'name' => 'dice one', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM224 288c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#8294C4'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 1.6, 'unit' => 'rem', 'style' => '1.6rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']], 'borders' => null]]];
    }

    static function defaultChildren()
    {
        return [['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]];
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "default_content",
        "Default Content",
        [getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Text Typography",
      "text_typography",
       ['type' => 'popout']
     ), c(
        "icon_color",
        "Icon Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'content.default_content.enable_default_text', 'operand' => 'is set', 'value' => '']], '1' => ['0' => ['path' => 'content.default_content.enable_default_icon', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "layout",
        "Layout",
        [getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\LessFancyBackground",
      "Background",
      "background",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "default_content",
        "Default Content",
        [c(
        "enable_default_icon",
        "Enable Default Icon",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.default_content.enable_default_icon', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "enable_default_text",
        "Enable Default Text",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.default_content.enable_default_text', 'operand' => 'is set', 'value' => '']]]],
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
        return false;
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => false];
    }

    static public function actions()
    {
        return [

'onCreatedElement' => [['script' => '( function() {
  const parentID = document.querySelector(\'%%SELECTOR%%\').parentElement.dataset.nodeId

  if(window.EhInstancesManager.instanceExists(\'EhContentContainer\', parentID)) {
  	const instance = window.EhInstancesManager.getInstance(\'EhContentContainer\', parentID)
    instance.removeEvents()
	instance.update()
  }

}());',
],],

'onPropertyChange' => [['script' => '( function() {
  const parentEl = document.querySelector(\'%%SELECTOR%%\').parentElement
  const parentID = parentEl.dataset.nodeId

  if(window.EhInstancesManager.instanceExists(\'EhContentContainer\', parentID)) {
  	const instance = window.EhInstancesManager.getInstance(\'EhContentContainer\', parentID)
    instance.removeEvents()
      instance.update()

  }

}());',
],],

'onBeforeDeletingElement' => [['script' => '( function() {

  const parentID = document.querySelector(\'%%SELECTOR%%\').parentElement.dataset.nodeId

  if(window.EhInstancesManager.instanceExists(\'EhContentContainer\', parentID)) {
  	const instance = window.EhInstancesManager.getInstance(\'EhContentContainer\', parentID)
    instance.removeEvents()
	instance.update()
  }

}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container", "restrictedToBeADirectChildOf" => ['ElementsHiveForBreakdancePro\ContentAccordion'],  ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return [['name' => 'tabindex', 'template' => '0'], ['name' => 'aria-expanded', 'template' => 'false'], ['name' => 'data-expand', 'template' => 'false'], ['name' => 'role', 'template' => 'button']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 2;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.background.image', 'design.background.overlay.image', 'design.background.image_settings.unset_image_at', 'design.background.image_settings.size', 'design.background.image_settings.height', 'design.background.image_settings.repeat', 'design.background.image_settings.position', 'design.background.image_settings.left', 'design.background.image_settings.top', 'design.background.image_settings.attachment', 'design.background.image_settings.custom_position', 'design.background.image_settings.width', 'design.background.overlay.image_settings.custom_position', 'design.background.image_size', 'design.background.overlay.image_size', 'design.background.overlay.type', 'design.background.image_settings', 'design.layout.layout.horizontal.vertical_at', 'design.default_content.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
