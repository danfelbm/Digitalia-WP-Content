<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\WebglImageCarousel",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class WebglImageCarousel extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg viewBox="0 0 80 80" fill="none"     xmlns="http://www.w3.org/2000/svg">     <path d="M12 12L12 68" stroke="currentColor" stroke-width="6" stroke-linecap="round" />     <rect x="24" y="12" width="32" height="56" rx="4" fill="currentColor" stroke="currentColor" stroke-width="4" stroke-linecap="round" />     <path d="M68 12L68 68" stroke="currentColor" stroke-width="6" stroke-linecap="round" /> </svg>';
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
        return 'WebGL Image Carousel';
    }

    static function className()
    {
        return 'eh-webgl-image-carousel';
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
        return ['content' => ['images' => ['images' => ['0' => ['image' => ['id' => 1121, 'filename' => 'elements1.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]], '1' => ['image' => ['id' => 1122, 'filename' => 'elements2.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]], '2' => ['image' => ['id' => 1123, 'filename' => 'elements3.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]], '3' => ['image' => ['id' => 1124, 'filename' => 'elements4.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements4.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements4.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]], '4' => ['image' => ['id' => 1125, 'filename' => 'elements5.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements5.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements5.webp', 'height' => 1282, 'width' => 1920, 'orientation' => 'landscape']]]]]]], 'design' => ['image_size' => ['width' => ['breakpoint_base' => ['number' => 35, 'unit' => '%', 'style' => '35%']]]]];
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
        "layout",
        "Layout",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "align",
        "Align",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left'], '1' => ['text' => 'Center', 'value' => 'center'], '2' => ['text' => 'Right', 'value' => 'flex-end']]],
        false,
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "image_size",
        "Image Size",
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
        "effects",
        "Effects",
        [c(
        "style",
        "Style",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => '1', 'text' => 'Style 1'], '1' => ['value' => '2', 'text' => 'Style 2'], '2' => ['value' => '3', 'text' => 'Style 3'], '3' => ['value' => '4', 'text' => 'Style 4'], '4' => ['value' => '5', 'text' => 'Style 5'], '5' => ['value' => '6', 'text' => 'Style 6'], '6' => ['value' => '7', 'text' => 'Style 7'], '7' => ['value' => '8', 'text' => 'Style 8']]],
        false,
        false,
        [],
      ), c(
        "speed_factor",
        "Speed Factor",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 1, 'max' => 3, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "duplicate_images",
        "Duplicate Images",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "duplicate_image_info",
        "Duplicate Image Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>Enable only If you notice that the images get cut off when scrolling and you can\'t add more images.</p>']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "disable_on_touch_devices",
        "Disable on Touch Devices",
        [c(
        "enabled",
        "enabled",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "infobox",
        "Infobox",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>Will not load on touch-enabled devices like tablets and mobiles.</p>']],
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
        "images",
        "Images",
        [c(
        "images",
        "Images",
        [c(
        "image",
        "image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['multiple' => true]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => true], 'repeaterOptions' => ['titleTemplate' => 'Images', 'defaultTitle' => 'Images', 'buttonName' => 'Add Images', 'galleryMode' => true, 'galleryMediaPath' => 'image']],
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

  if (!containerEl || window.EhInstancesManager.instanceExists(\'EhWebglImageCarousel\', \'%%ID\') ) return;

  const images = containerEl.querySelectorAll(\'.eh-webgl-image-carousel__carousel>img\');
   if (images.length === 0) return;

  const carouselOptions = {
     carouselDOM: containerEl.querySelector(\'.eh-webgl-image-carousel__carousel\'),
     images: images,
    effectStyle:  {{design.effects.style|default(5)}},
    speedFactor: {{design.effects.speed_factor|default(1)}},
  };

  const options = {
    parent: containerEl,
    canvasClass: \'eh-webgl-image-carousel__canvas\',
   carouselOptions
  };

    const instance = new EhWebglImageCarousel(options);
	window.EhInstancesManager.registerInstance(\'EhWebglImageCarousel\', \'%%ID%%\', instance );

}());'],'scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets//js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/WebGL_Image_Carousel/assets/js/eh_webgl_image_carousel.min.js'],'title' => 'Builder init','builderCondition' => 'return true;','frontendCondition' => 'return false;',],'1' =>  ['inlineScripts' => ['( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\');
  if (!containerEl ) return;

  const images = containerEl.querySelectorAll(\'.eh-webgl-image-carousel__carousel>img\');
  if (!images) return;

 {% if design.disable_on_touch_devices.enabled %}
   if (\'ontouchstart\' in window) {
     containerEl.style.display = \'none\';
     return;
   } else {
     init();
   }
{% else %}
  init();
{% endif %}

  async function init() {
	await import(\'{{getElementsHiveProPluginUrl()}}elements/WebGL_Image_Carousel/assets/js/eh_webgl_image_carousel.min.js\');
    const carouselOptions = {
       carouselDOM: containerEl.querySelector(\'.eh-webgl-image-carousel__carousel\'),
       images: images,
      effectStyle:  {{design.effects.style|default(5)}},
      speedFactor: {{design.effects.speed_factor|default(1)}},
    };

    const options = {
      parent: containerEl,
      canvasClass: \'eh-webgl-image-carousel__canvas\',
     carouselOptions
    };

    new EhWebglImageCarousel(options);
 }

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
  if (!containerEl ) return

  let instance = null
  if ( window.EhInstancesManager.instanceExists(\'EhWebglImageCarousel\', \'%%ID%%\') ) {
    containerEl.querySelector(\'.eh-webgl-image-carousel__canvas\')?.remove()
     window.EhInstancesManager.getInstance(\'EhWebglImageCarousel\', \'%%ID%%\').destroy()
    window.EhInstancesManager.deleteInstance(\'EhWebglImageCarousel\', \'%%ID%%\')
  }

  function update() {
    const images = containerEl.querySelectorAll(\'.eh-webgl-image-carousel__carousel>img\')
    if (images.length === 0) return

    const carouselOptions = {
       carouselDOM: containerEl.querySelector(\'.eh-webgl-image-carousel__carousel\'),
       images: images,
       effectStyle:  {{design.effects.style|default(5)}},
       speedFactor: {{design.effects.speed_factor|default(1)}},
    }

    const options = {
      parent: containerEl,
      canvasClass: \'eh-webgl-image-carousel__canvas\',
      carouselOptions
    }

      instance = new EhWebglImageCarousel(options)
      window.EhInstancesManager.registerInstance(\'EhWebglImageCarousel\', \'%%ID%%\', instance )
  }

  setTimeout( () => {
    update()
  }, 500)
}());',
],],

'onMovedElement' => [['script' => '( function() {

  const containerEl = document.querySelector(\'%%SELECTOR%%\')
  if (!containerEl ) return

  let instance = null
  if ( window.EhInstancesManager.instanceExists(\'EhWebglImageCarousel\', \'%%ID%%\') ) {
    containerEl.querySelector(\'.eh-webgl-image-carousel__canvas\')?.remove()
     window.EhInstancesManager.getInstance(\'EhWebglImageCarousel\', \'%%ID%%\').destroy()
    window.EhInstancesManager.deleteInstance(\'EhWebglImageCarousel\', \'%%ID%%\')
  }

    const images = containerEl.querySelectorAll(\'.eh-webgl-image-carousel__carousel>img\')
    if (images.length === 0) return

    const carouselOptions = {
       carouselDOM: containerEl.querySelector(\'.eh-webgl-image-carousel__carousel\'),
       images: images,
       effectStyle:  {{design.effects.style|default(5)}},
       speedFactor: {{design.effects.speed_factor|default(1)}},
    }

    const options = {
      parent: containerEl,
      canvasClass: \'eh-webgl-image-carousel__canvas\',
      carouselOptions
    }

      instance = new EhWebglImageCarousel(options)
      window.EhInstancesManager.registerInstance(\'EhWebglImageCarousel\', \'%%ID%%\', instance )

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
        return 1;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'gallery', 'path' => 'content.images.images'], '1' => ['accepts' => 'gallery', 'path' => 'content.images.images[].image']];
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
        return ['design.layout.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
