<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\ContentAccordion",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ContentAccordion extends \Breakdance\Elements\Element
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
        return 'Content Accordion';
    }

    static function className()
    {
        return 'eh-content-accordion';
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
        return ['design' => ['layout' => ['gap' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']], 'orientation' => null, 'vertical_at' => 'breakpoint_phone_landscape', 'height' => ['breakpoint_phone_landscape' => ['number' => 600, 'unit' => 'px', 'style' => '600px']]], 'spacing' => ['margin_bottom' => null], 'accordion_animation' => ['transition' => null, 'duration' => null], 'content_animation' => ['duration' => null]], 'content' => ['accordion_animation' => ['transition' => 'two_step', 'duration' => ['number' => 1.2, 'unit' => 's', 'style' => '1.2s']]]];
    }

    static function defaultChildren()
    {
        return [['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-one.', 'name' => 'dice one', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM224 288c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#8294C4'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 1.6, 'unit' => 'rem', 'style' => '1.6rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']], 'borders' => null]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-two.', 'name' => 'dice two', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM128 192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm192 192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#ACB1D6'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']], 'borders' => null]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => null, 'icon' => ['slug' => 'icon-dice-three.', 'name' => 'dice three', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM128 192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm96 96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm96 96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#DBDFEA'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']]]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-four.', 'name' => 'dice four', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM128 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm192 192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#FFEAD2'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']]]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-five.', 'name' => 'dice five', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM128 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm96 96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm96 96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#FBE0C1FF'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']]]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentAccordionItem', 'defaultProperties' => ['content' => ['default_content' => ['enable_default_icon' => true, 'enable_default_text' => false, 'text' => 'Any Text Here', 'icon' => ['slug' => 'icon-dice-six.', 'name' => 'dice six', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96c0-35.35-28.65-64-64-64zM128 384c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm192 192c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-96c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></svg>']]], 'design' => ['background' => ['color' => '#F9CFA5FF'], 'default_content' => ['icon_color' => '#252424FF', 'icon_size' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'text_typography' => ['color' => ['breakpoint_base' => '#252424'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem']]]]]]], 'layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']]]]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add any Element under the Content Accordion Item ', 'tags' => 'h3']]], 'children' => []]]]];
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "accordion_animation",
        "Accordion Animation",
        [c(
        "transition",
        "Transition",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'make_way', 'text' => 'Make Way'], '1' => ['text' => 'Back & Forth', 'value' => 'two_step'], '2' => ['text' => 'Shaky', 'value' => 'shaky'], '3' => ['text' => 'Shaky Alternative', 'value' => 'shaky_2'], '4' => ['text' => 'Mechanic', 'value' => 'mechanic'], '5' => ['text' => 'Stretch', 'value' => 'stretch']]],
        false,
        false,
        [],
      ), c(
        "expand_factor",
        "Expand Factor",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => '%', '1' => 'vw', '2' => 'rem'], 'defaultType' => '%'], 'rangeOptions' => ['min' => 1, 'max' => 30, 'step' => 0.5]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 's'], 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "content_animation",
        "Content Animation",
        [c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 0.1], 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 's']],
        false,
        false,
        [],
      ), c(
        "stagger_animation",
        "Stagger Animation",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "layout",
        "Layout",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'rem', '2' => '%', '3' => 'vw', '4' => 'calc', '5' => 'custom']]],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'rem', '2' => '%', '3' => 'vh', '4' => 'calc', '5' => 'custom']]],
        true,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "orientation",
        "Orientation",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'horizontal', 'text' => 'Horizontal'], '1' => ['text' => 'Vertical', 'value' => 'vertical']]],
        false,
        false,
        [],
      ), c(
        "vertical_at",
        "Vertical At",
        [],
        ['type' => 'breakpoint_dropdown', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
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
        "items",
        "Items",
        [],
        ['type' => 'add_registered_children', 'layout' => 'vertical'],
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

  if ( !containerEl || window.EhInstancesManager.instanceExists(\'EhContentContainer\', \'%%ID%%\') ) return;

  const options = {
    container: document.querySelector(\'%%SELECTOR%%\'),
    items: document.querySelectorAll(\'%%SELECTOR%% .eh-content-accordion-item\'),
    itemsInner: document.querySelectorAll(\'%%SELECTOR%% .eh-content-accordion-item__inner\'),
    transitionType: \'{{design.accordion_animation.transition|default("two_step")}}\',
    duration: \'{{design.accordion_animation.duration.number|default(0.8)}}\',
    expandFactor: \'{{design.accordion_animation.expand_factor|default(5)}}\',
    itemsTransitionType: \'{{design.content_animation.type|default("visibility")}}\',
    itemsTransitionDuration: {{design.content_animation.duration.number|default(0.2)}},
    itemsTransitionStagger: {{design.content_animation.stagger_animation|default(\'false\')}}
  };

  const instance = new EhContentAccordion(options);
  window.EhInstancesManager.registerInstance(\'EhContentContainer\', \'%%ID%%\', instance);


}());'],'scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/Content_Accordion/assets/js/eh_content_accordion.min.js'],'title' => 'Builder ','frontendCondition' => 'return false;',],'1' =>  ['title' => 'Front','scripts' => [ELEMENTS_HIVE_GSAP,ELEMENTS_HIVE_PRO_DIR . 'elements/Content_Accordion/assets/js/eh_content_accordion.min.js'],'builderCondition' => 'return false;','inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');

  if ( !containerEl ) return;

  const options = {
   container: document.querySelector(\'%%SELECTOR%%\'),
    items: document.querySelectorAll(\'%%SELECTOR%% .eh-content-accordion-item\'),
    itemsInner: document.querySelectorAll(\'%%SELECTOR%% .eh-content-accordion-item__inner\'),
    transitionType: \'{{design.accordion_animation.transition|default("two_step")}}\',
    duration: \'{{design.accordion_animation.duration.number|default(0.8)}}\',
    expandFactor: \'{{design.accordion_animation.expand_factor|default(5)}}\',
    itemsTransitionType: \'{{design.content_animation.type|default("visibility")}}\',
    itemsTransitionDuration: {{design.content_animation.duration.number|default(0.2)}},
    itemsTransitionStagger: {{design.content_animation.stagger_animation|default(\'false\')}}
  };
  new EhContentAccordion(options);


}());'],],];
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

  if(window.EhInstancesManager.instanceExists(\'EhContentContainer\', \'%%ID%%\')) {
  	const instance = window.EhInstancesManager.getInstance(\'EhContentContainer\', \'%%ID%%\')
    instance.transitionType = \'{{design.accordion_animation.transition|default("two_step")}}\',
    instance.duration = \'{{design.accordion_animation.duration.number|default(0.8)}}\',
    instance.expandFactor = \'{{design.accordion_animation.expand_factor|default(5)}}\',
    instance.itemsTransitionType = \'{{design.content_animation.type|default("visibility")}}\',
    instance.itemsTransitionDuration = {{design.content_animation.duration.number|default(0.2)}},
    instance.itemsTransitionStagger = {{design.content_animation.stagger_animation|default(\'false\')}}


	instance.removeEvents()
	instance.update()

  }
}());',
],],

'onBeforeDeletingElement' => [['script' => '( function() {

  if(window.EhInstancesManager.instanceExists(\'EhContentContainer\', \'%%ID%%\')) {

  	window.EhInstancesManager.deleteInstance(\'EhContentContainer\', \'%%ID%%\')
  }

}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container-restricted",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['location' => 'outside-bottom', 'cssProperty' => 'margin-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return [['name' => 'aria-label', 'template' => 'Content Accordion']];
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
        return ['design.layout.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
