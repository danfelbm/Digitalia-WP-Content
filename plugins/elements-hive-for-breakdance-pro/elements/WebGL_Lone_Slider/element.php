<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\WebglLoneSlider",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class WebglLoneSlider extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" fill="currentColor">     <path d="M679.825 406Q667 406 658.5 397.325q-8.5-8.676-8.5-21.5 0-12.825 8.675-21.325 8.676-8.5 21.5-8.5 12.825 0 21.325 8.675 8.5 8.676 8.5 21.5 0 12.825-8.675 21.325-8.676 8.5-21.5 8.5ZM345 679l93-123 68 87 103-135 127 171H345ZM140 976q-24 0-42-18t-18-42V296h60v620h620v60H140Zm60-475V236q0-24 18-42t42-18h250v60H260v265h-60Zm60 355q-24 0-42-18t-18-42V561h60v235h250v60H260Zm310 0v-60h250V561h60v235q0 24-18 42t-42 18H570Zm250-355V236H570v-60h250q24 0 42 18t18 42v265h-60Z"/> </svg>';
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
        return 'WebGL Lone Slider';
    }

    static function className()
    {
        return 'eh-webgl-lone-slider';
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
        return ['content' => ['images' => ['images' => ['0' => ['image' => ['id' => 1123, 'filename' => 'elements1.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['thumbnail' => ['height' => 150, 'width' => 150, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'orientation' => 'landscape'], 'medium' => ['height' => 300, 'width' => 300, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'orientation' => 'landscape'], 'medium_large' => ['height' => 768, 'width' => 768, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'orientation' => 'landscape'], 'full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp', 'height' => 1024, 'width' => 1024, 'orientation' => 'landscape']], 'attributes' => ['srcset' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp  1024w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp 300w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp 150w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements1.webp 768w', 'sizes' => '(max-width: 1024px) 100vw, 1024px']]], '1' => ['image' => ['id' => 1122, 'filename' => 'elements2.webp', 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'alt' => '', 'caption' => '', 'mime' => 'image/webp', 'type' => 'image', 'sizes' => ['thumbnail' => ['height' => 150, 'width' => 150, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'orientation' => 'landscape'], 'medium' => ['height' => 300, 'width' => 300, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'orientation' => 'landscape'], 'medium_large' => ['height' => 768, 'width' => 768, 'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'orientation' => 'landscape'], 'full' => ['url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp', 'height' => 1024, 'width' => 1024, 'orientation' => 'landscape']], 'attributes' => ['srcset' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp  1024w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp 300w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp 150w, ' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements2.webp 768w', 'sizes' => '(max-width: 1024px) 100vw, 1024px']]], '2' => [
                'image' => [
                'id' => 1124,
                'filename' => 'elements3.webp',
                'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp',
                'alt' => '',
                'caption' => '',
                'mime' => 'image/webp',
                'type' => 'image',
                'sizes' => [
                    'thumbnail' => [
                    'height' => 150,
                    'width' => 150,
                    'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp',
                    'orientation' => 'landscape'
                    ],
                    'medium' => [
                    'height' => 300,
                    'width' => 300,
                    'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp',
                    'orientation' => 'landscape'
                    ],
                    'medium_large' => [
                    'height' => 768,
                    'width' => 768,
                    'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp',
                    'orientation' => 'landscape'
                    ],
                    'full' => [
                    'url' => ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp',
                    'height' => 1024,
                    'width' => 1024,
                    'orientation' => 'landscape'
                    ]
                ],
                'attributes' => [
                    'srcset' => '' . ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp  1024w, ' .  ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp 300w, ' .  ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp 150w, ' .  ELEMENTS_HIVE_PRO_DIR . 'assets/images/placeholders/elements3.webp 768w',
                    'sizes' => '(max-width: 1024px) 100vw, 1024px'
                ]
                ]
            ]], 'images_dynamic_meta' => null], 'navigation' => ['previous_icon' => ['slug' => 'icon-arrow-left.', 'name' => 'icon-arrow-left.', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/></svg>', 'iconSetSlug' => 'FontAwesome 5 Free - Solid'], 'next_icon' => ['slug' => 'icon-arrow-right.', 'name' => 'icon-arrow-right.', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>', 'iconSetSlug' => 'FontAwesome 5 Free - Solid'], 'previous_icon_hover' => null]], 'design' => ['navigation' => ['previous_icon' => ['icon' => null, 'position' => ['breakpoint_phone_landscape' => ['x' => 2, 'y' => 40]]], 'next_icon' => ['position' => ['breakpoint_phone_landscape' => ['x' => 98, 'y' => 40]]]], 'images' => ['width' => ['breakpoint_phone_landscape' => ['number' => 70, 'unit' => '%', 'style' => '70%']], 'position' => ['breakpoint_phone_landscape' => ['x' => 48.13, 'y' => 16]]], 'slider' => ['width' => null, 'height' => ['breakpoint_phone_landscape' => ['number' => 60, 'unit' => 'vh', 'style' => '60vh'], 'breakpoint_phone_portrait' => ['number' => 50, 'unit' => 'vh', 'style' => '50vh']]], 'slider_effects' => ['enable_distortion' => false, 'distortion' => '0'], 'content_items_container' => ['position' => ['breakpoint_phone_landscape' => ['x' => 49.07, 'y' => 90]], 'width' => ['breakpoint_base' => ['number' => 40, 'unit' => '%', 'style' => '40%'], 'breakpoint_phone_landscape' => ['number' => 80, 'unit' => '%', 'style' => '80%']]]]];
    }

    static function defaultChildren()
    {
        return [['slug' => 'ElementsHiveForBreakdancePro\WebglLoneSlide', 'defaultProperties' => ['design' => ['layout' => ['align' => ['breakpoint_phone_landscape' => 'center'], 'vertical_align' => ['breakpoint_phone_landscape' => 'center']]]], 'children' => ['0' => ['slug' => 'EssentialElements\Text', 'defaultProperties' => ['content' => ['content' => ['text' => 'Add at least 2 images']], 'design' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem'], 'breakpoint_tablet_portrait' => ['number' => 1.5, 'unit' => 'rem', 'style' => '1.5rem']]]]]]]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\WebglLoneSlide', 'defaultProperties' => null, 'children' => ['0' => ['slug' => 'EssentialElements\Text', 'defaultProperties' => ['content' => ['content' => ['text' => 'Content Slides <br>are optional']], 'design' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem'], 'breakpoint_tablet_portrait' => ['number' => 1.5, 'unit' => 'rem', 'style' => '1.5rem']]]]]]]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\WebglLoneSlide', 'defaultProperties' => ['design' => ['layout' => ['align' => ['breakpoint_phone_landscape' => 'center']]]], 'children' => ['0' => ['slug' => 'EssentialElements\Text', 'defaultProperties' => ['content' => ['content' => ['text' => 'Position Images, Content<br>containers and Navigation <br>icons anyway you want']], 'design' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 2, 'unit' => 'rem', 'style' => '2rem'], 'breakpoint_tablet_portrait' => ['number' => 1.5, 'unit' => 'rem', 'style' => '1.5rem']]]]]]]], 'children' => []]]]];
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "slider",
        "Slider",
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
        "images",
        "Images",
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
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'focus_point', 'layout' => 'vertical'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "content_items_container",
        "Content Items Container",
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
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'focus_point', 'layout' => 'vertical'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\background",
      "Background",
      "background",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\effects_no_hover",
      "Effects",
      "effects",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "navigation",
        "Navigation",
        [c(
        "previous_icon",
        "Previous Icon",
        [getPresetSection(
      "EssentialElements\\AtomV1IconDesignWithHover",
      "Icon",
      "icon",
       ['type' => 'popout']
     ), c(
        "position",
        "Position",
        [],
        ['type' => 'focus_point', 'layout' => 'vertical'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "next_icon",
        "Next Icon",
        [getPresetSection(
      "EssentialElements\\AtomV1IconDesignWithHover",
      "Icon",
      "icon",
       ['type' => 'popout']
     ), c(
        "position",
        "Position",
        [],
        ['type' => 'focus_point', 'layout' => 'vertical'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "slider_effects",
        "Slider Effects",
        [c(
        "transition",
        "Transition",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => '0', 'text' => 'Label', 'icon' => 'CircleIcon'], '1' => ['value' => '1', 'text' => 'Label', 'icon' => 'ArrowLeftIcon'], '2' => ['value' => '2', 'text' => 'Label', 'icon' => 'ArrowRightIcon'], '3' => ['value' => '3', 'text' => 'Label', 'icon' => 'ArrowUpIcon'], '4' => ['value' => '4', 'text' => 'Label', 'icon' => 'ArrowDownIcon']]],
        false,
        false,
        [],
      ), c(
        "enable_distortion",
        "Enable Distortion",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "distortion",
        "Distortion",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.slider_effects.enable_distortion', 'operand' => 'is set', 'value' => '']]], 'items' => ['0' => ['value' => '0', 'text' => 'Label', 'icon' => 'CircleIcon'], '1' => ['value' => '1', 'text' => 'Label', 'icon' => 'ArrowLeftIcon'], '2' => ['value' => '2', 'text' => 'Label', 'icon' => 'ArrowRightIcon'], '3' => ['value' => '3', 'text' => 'Label', 'icon' => 'ArrowUpIcon'], '4' => ['value' => '4', 'text' => 'Label', 'icon' => 'ArrowDownIcon']]],
        false,
        false,
        [],
      ), c(
        "speed",
        "Speed",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's']], 'rangeOptions' => ['min' => 1, 'max' => 10, 'step' => 0.1]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "disable_on_touch_devices",
        "Disable on Touch Devices",
        [c(
        "enabled",
        "Enabled",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "info_box",
        "Info box",
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
        return [c(
        "images",
        "Images",
        [c(
        "images",
        "Images",
        [c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => true]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => 'Images', 'defaultTitle' => 'Images', 'buttonName' => 'Add Images', 'galleryMode' => true, 'galleryMediaPath' => 'image'], 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => true]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "content_items",
        "Content items",
        [c(
        "slide",
        "Slide",
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
      ), c(
        "navigation",
        "Navigation",
        [c(
        "previous_icon",
        "Previous Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        true,
        [],
      ), c(
        "next_icon",
        "Next Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        true,
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
        return ['0' =>  ['title' => 'GSAP','scripts' => [ELEMENTS_HIVE_GSAP],],'1' =>  ['title' => 'Builder init','scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js',ELEMENTS_HIVE_PRO_DIR . 'elements/WebGL_Lone_Slider/assets/js/eh_webgl_lone_slider.min.js'],'inlineScripts' => ['( function() {
	const containerEl = document.querySelector(\'%%SELECTOR%%\');

    if( !containerEl || window.EhInstancesManager.instanceExists(\'EhWebglLoneSlider\', \'%%ID%%\') ) return;

	const options = {
      container: containerEl,
      canvas: containerEl.querySelector(\'.eh-webgl-lone-slider__canvas\'),
      imageDOM: containerEl.querySelector(\'.eh-webgl-lone-slider__image-placeholder\'),
      contentDOM: containerEl.querySelectorAll(\'.eh-webgl-lone-slide\'),
     nav: containerEl.querySelectorAll(\'.eh-webgl-lone-slider__btn\'),
     transitionDirection: {{design.slider_effects.transition|default(2)}},
       distortionDirection: {{design.slider_effects.distortion|default(2)}},
       duration: {{design.slider_effects.speed|default(3)}},
       images: [...containerEl.querySelectorAll(\'.eh-webgl-lone-slider__builder-images>img\')].map( img => img.src ),
	 applyDistortion: {{design.slider_effects.enable_distortion|default(false)}},
    };

	const instance = new EhWebglLoneSlider(options);
	window.EhInstancesManager.registerInstance(\'EhWebglLoneSlider\', \'%%ID%%\', instance);
	setTimeout( () => {
      instance.resize();
    }, 300);
}());'],'builderCondition' => 'return true;','frontendCondition' => 'return false;',],'2' =>  ['title' => 'Frontend init','inlineScripts' => ['( function() {

    const containerEl = document.querySelector(\'%%SELECTOR%%\');
    if( !containerEl) return;

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
     await import(\'{{getElementsHiveProPluginUrl()}}elements/WebGL_Lone_Slider/assets/js/eh_webgl_lone_slider.min.js\');
      const options = {
        container: containerEl,
        canvas: containerEl.querySelector(\'.eh-webgl-lone-slider__canvas\'),
        imageDOM: containerEl.querySelector(\'.eh-webgl-lone-slider__image-placeholder\'),
        contentDOM: containerEl.querySelectorAll(\'.eh-webgl-lone-slide\'),
       nav: containerEl.querySelectorAll(\'.eh-webgl-lone-slider__btn\'),
       transitionDirection: {{design.slider_effects.transition|default(\'2\')}},
       distortionDirection: {{design.slider_effects.distortion|default(\'2\')}},
       duration: {{design.slider_effects.speed|default(\'3\')}},
         images: [],
           applyDistortion: {{design.slider_effects.enable_distortion|default(\'false\')}},
      };


        {% for item in content.images.images %}
        	{% if item.image %}
          		options.images.push(\'{{item.image.url}}\');
             {% else %}
             	options.images.push(\'{{item.url}}\');
              {% endif %}
        {% endfor %}

        new EhWebglLoneSlider(options);

   }

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

	const containerEl = document.querySelector(\'%%SELECTOR%%\')
	if(!containerEl) return

	function update() {
      if( window.EhInstancesManager.instanceExists(\'EhWebglLoneSlider\', \'%%ID%%\') ) {
          const instance = window.EhInstancesManager.getInstance(\'EhWebglLoneSlider\', \'%%ID%%\')
          const options = {
            contentDOM: containerEl.querySelectorAll(\'.eh-webgl-lone-slide\'),
            transitionDirection: {{design.slider_effects.transition|default(\'2\')}},
            distortionDirection: {{design.slider_effects.distortion|default(\'2\')}},
            duration: {{design.slider_effects.speed|default(\'3\')}},
            images: [...containerEl.querySelectorAll(\'.eh-webgl-lone-slider__builder-images>img\')].map( img => img.src ),
            applyDistortion: {{design.slider_effects.enable_distortion|default(false)}},
         }

       instance.update(options)
	 }
   }

    setTimeout( () => {
  		update()
	}, 500)

}());','runForAllChildren' => true,
],],

'onMovedElement' => [['script' => '( function() {
	const containerEl = document.querySelector(\'%%SELECTOR%%\')

    if( !containerEl ) return

  	if(window.EhInstancesManager.instanceExists(\'EhWebglLoneSlider\', \'%%ID%%\')) {
    	window.EhInstancesManager.deleteInstance(\'EhWebglLoneSlider\', \'%%ID%%\')
    }

  function init() {
	const options = {
      container: containerEl,
      canvas: containerEl.querySelector(\'.eh-webgl-lone-slider__canvas\'),
      imageDOM: containerEl.querySelector(\'.eh-webgl-lone-slider__image-placeholder\'),
      contentDOM: containerEl.querySelectorAll(\'.eh-webgl-lone-slide\'),
     nav: containerEl.querySelectorAll(\'.eh-webgl-lone-slider__btn\'),
     transitionDirection: {{design.slider_effects.transition|default(2)}},
       distortionDirection: {{design.slider_effects.distortion|default(2)}},
       duration: {{design.slider_effects.speed|default(3)}},
       images: [...containerEl.querySelectorAll(\'.eh-webgl-lone-slider__builder-images>img\')].map( img => img.src ),
	 applyDistortion: {{design.slider_effects.enable_distortion|default(false)}},
    }

	const instance = new EhWebglLoneSlider(options)
 	window.EhInstancesManager.registerInstance(\'EhWebglLoneSlider\', \'%%ID%%\', instance)
}
	setTimeout( () => {
     init()
    }, 500)
}());',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container-restricted",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['cssProperty' => 'margin-bottom', 'location' => 'outside-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
      return [['name' => 'role', 'template' => 'region'], ['name' => 'aria-label', 'template' => 'Slider']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'gallery', 'path' => 'content.images.images'], '1' => ['accepts' => 'gallery', 'path' => 'content.images.images[].image'], '2' => ['accepts' => 'image_url', 'path' => 'design.content_items_container.background.layers[].image'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.content_items_container.background.image', 'design.content_items_container.background.overlay.image', 'design.content_items_container.background.image_settings.unset_image_at', 'design.content_items_container.background.image_settings.size', 'design.content_items_container.background.image_settings.height', 'design.content_items_container.background.image_settings.repeat', 'design.content_items_container.background.image_settings.position', 'design.content_items_container.background.image_settings.left', 'design.content_items_container.background.image_settings.top', 'design.content_items_container.background.image_settings.attachment', 'design.content_items_container.background.image_settings.custom_position', 'design.content_items_container.background.image_settings.width', 'design.content_items_container.background.overlay.image_settings.custom_position', 'design.content_items_container.background.image_size', 'design.content_items_container.background.overlay.image_size', 'design.content_items_container.background.overlay.type', 'design.content_items_container.background.image_settings'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
