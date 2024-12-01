<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "ElementsHiveForBreakdancePro\\ContentRevealContainer",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ContentRevealContainer extends \Breakdance\Elements\Element
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
        return 'Content Reveal Container';
    }

    static function className()
    {
        return 'eh-content-reveal-container';
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
        return [['slug' => 'ElementsHiveForBreakdancePro\ContentRevealPanel', 'defaultProperties' => ['design' => ['background' => ['color' => '#FD5A00FF', 'overlay' => null], 'padding' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'top' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]]], 'layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center'], 'gap' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'panel' => ['panel_type' => 'front']], 'content' => ['panel' => ['panel_type' => 'front']]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Put Anything here', 'tags' => 'h2']]], 'children' => []]]], ['slug' => 'ElementsHiveForBreakdancePro\ContentRevealPanel', 'defaultProperties' => ['content' => ['panel' => ['panel_type' => 'back']], 'design' => ['background' => ['color' => '#252424FF'], 'layout' => ['vertical_align' => ['breakpoint_base' => 'center'], 'align' => ['breakpoint_base' => 'center'], 'gap' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'panel' => ['panel_type' => 'back']]], 'children' => ['0' => ['slug' => 'EssentialElements\Heading', 'defaultProperties' => ['content' => ['content' => ['text' => 'Put Anything here', 'tags' => 'h2']], 'design' => ['typography' => ['color' => ['breakpoint_base' => '#E4E4E4FF']]]], 'children' => []]]]];
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
        "trigger",
        "Trigger",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'hover', 'text' => 'Hover'], '1' => ['text' => 'Click', 'value' => 'click']], 'placeholder' => 'Hover'],
        false,
        false,
        [],
      ), c(
        "click_trigger",
        "Click Trigger",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'container', 'text' => 'Container'], '1' => ['text' => 'Selector', 'value' => 'selector']], 'placeholder' => 'Container', 'condition' => ['0' => ['0' => ['path' => 'design.trigger.trigger', 'operand' => 'equals', 'value' => 'click']]]],
        false,
        false,
        [],
      ), c(
        "selector",
        "Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.trigger.trigger', 'operand' => 'equals', 'value' => 'click'], '1' => ['path' => 'design.trigger.click_trigger', 'operand' => 'equals', 'value' => 'selector']]]],
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
        "animation",
        "Animation",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flip', 'text' => 'Flip'], '1' => ['text' => 'Slide', 'value' => 'slide'], '2' => ['text' => 'Push', 'value' => 'push'], '3' => ['text' => 'Swap', 'value' => 'swap'], '4' => ['text' => 'Square Wipe', 'value' => 'wipe'], '5' => ['text' => 'Circle Wipe', 'value' => 'circular']], 'placeholder' => 'Circle Wipe'],
        false,
        false,
        [],
      ), c(
        "direction",
        "Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'left', 'text' => 'Label', 'icon' => 'ArrowLeftIcon'], '1' => ['value' => 'right', 'text' => 'Label', 'icon' => 'ArrowRightIcon'], '2' => ['value' => 'down', 'text' => 'Label', 'icon' => 'ArrowDownIcon'], '3' => ['value' => 'up', 'text' => 'Label', 'icon' => 'ArrowUpIcon']]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 's'], 'defaultType' => 'ms'], 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.1]],
        false,
        false,
        [],
      ), c(
        "enable_3d_perspective",
        "Enable 3D Perspective",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation', 'operand' => 'equals', 'value' => 'flip']]]],
        false,
        false,
        [],
      ), c(
        "depth",
        "Depth",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 10, 'max' => 100, 'step' => 1], 'condition' => ['0' => ['0' => ['path' => 'design.animation.animation', 'operand' => 'equals', 'value' => 'flip'], '1' => ['path' => 'design.animation.enable_3d_perspective', 'operand' => 'is set', 'value' => '']]]],
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
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'em', '1' => 'rem', '2' => '%', '3' => 'vw', '4' => 'px', '5' => 'custom'], 'defaultType' => '%']],
        true,
        false,
        [],
      ), c(
        "minimum_height",
        "Minimum Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem', '3' => '%', '4' => 'vh', '5' => 'custom'], 'defaultType' => 'px']],
        true,
        false,
        [],
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
      "EssentialElements\\typography",
      "Typography",
      "typography",
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
        "show_back_panel",
        "Show Back Panel",
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
        return ['0' =>  ['title' => 'Flip Animations','inlineStyles' => ['	{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: rotateY(180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateY(-180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: rotateY(-180deg);
      }
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: none;
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: rotateY(-180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateY(180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: rotateY(180deg);
      }
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: none;
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: rotateX(180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateX(-180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: rotateX(-180deg);
      }
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: none;
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: rotateX(-180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateX(180deg);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: rotateX(180deg);
      }
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: none;
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'flip\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'1' =>  ['title' => 'Slide Animations','inlineStyles' => ['{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
   %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
   %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
   %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);;
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'slide\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'2' =>  ['title' => 'Swap Animations','inlineStyles' => ['{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateX(100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
   %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateX(-100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateY(-100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateY(100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'swap\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'3' =>  ['title' => 'Push Animations','inlineStyles' => ['{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateX(-100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
   %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateX(100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateX(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateY(100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(-100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
    %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(1) {
        transform: translateY(-100%);
      }

      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        transform: translateY(0);
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'push\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'4' =>  ['title' => 'Square Wipe Animations','inlineStyles' => ['{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 0 100%);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 0 0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: inset( 0 0 0 0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 100% 0 0);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 0 0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: inset( 0 0 0 0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 100% 0 0 0);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 0 0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: inset( 0 0 0 0);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 100% 0);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset( 0 0 0 0);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: inset( 0 0 0 0);
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'wipe\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'5' =>  ['title' => 'Circle Wipe Animations','inlineStyles' => ['{% if design.animation.direction|default(\'left\') == \'left\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(0% at right center);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(100%);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: circle(100%);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'right\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(0% at left center);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(100%);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: circle(100%);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'down\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(0% at top center);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(100%);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: circle(100%);
      }
    }
  {% endif %}
{% elseif design.animation.direction|default(\'left\') == \'up\' %}
  %%SELECTOR%% .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(0% at bottom center);
  }
  %%SELECTOR%%.eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(100%);
  }
  {% if design.trigger.trigger|default(\'hover\') == \'hover\' %}
    @media (hover: hover) {
      %%SELECTOR%%:hover .eh-content-reveal-panel:nth-child(2) {
        clip-path: circle(100%);
      }
    }
  {% endif %}
{% endif %}'],'builderCondition' => 'return false;','frontendCondition' => '{% if design.animation.animation|default(\'circular\') == \'circular\' %}
	return true;
{% else %}
	return false;
{% endif %}',],'6' =>  ['title' => 'Inline JS','inlineScripts' => ['( function() {

  const isTouchDevice = \'ontouchstart\' in window;
  const containerEl = document.querySelector(\'%%SELECTOR%%\');
  if(!containerEl) return;

  const panels = containerEl.querySelectorAll(\'.eh-content-reveal-panel\');

  if (panels.length < 2) return;
  panels[0].setAttribute(\'aria-hidden\', false);
  panels[1].setAttribute(\'aria-hidden\', true);

  let triggers = null;

  const toggleAriaHidden = () => {
  	panels[0].setAttribute(\'aria-hidden\', panels[0].getAttribute(\'aria-hidden\') === \'true\' ? \'false\' : \'true\');
    panels[1].setAttribute(\'aria-hidden\', panels[1].getAttribute(\'aria-hidden\') === \'true\' ? \'false\' : \'true\' );
  };

  const toggleContainer = () => {
    containerEl.classList.toggle(\'eh-show\');
    toggleAriaHidden();
  };

  const addKeydownListener = () => {
  	containerEl.addEventListener(\'keydown\', e => {
      if( e.code === "Space" || e.key === "Enter" ) toggleContainer();
    });
  };

  {% if design.trigger.trigger == \'click\' %}
    {% if design.trigger.click_trigger == \'container\' %}
    	triggers = [containerEl];
    {% else %}
    	try{
    		triggers = document.querySelectorAll(\'{{design.trigger.selector}}\');
        } catch(e) {
           console.warn(\'Content Reveal Container #%%ID%%: Invalid trigger selector, will default to the container\');
           triggers = [containerEl];
        }
    {% endif %}
    triggers.forEach( el => {
      el.addEventListener(\'click\', toggleContainer);
    });
  {% endif %}

	    addKeydownListener();



    if (isTouchDevice) containerEl.addEventListener(\'touchstart\', toggleContainer);

 }());'],'builderCondition' => 'return false;','frontendCondition' => 'return true;',],'7' =>  ['title' => 'Builder Only','builderCondition' => 'return true;','frontendCondition' => 'return false;','inlineStyles' => ['
/* Flip Animations */

/* Flip Left */
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
    transform: rotateY(180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateY(-180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
}

/* Flip Right */
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
    transform: rotateY(-180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateY(180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
}

/* Flip Down */
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
    transform: rotateX(180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateX(-180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
}

/* Flip Up */
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
    transform: rotateX(-180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: rotateX(180deg);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="flip"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="flip"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: none;
}


/* Slide Animations */

/* Slide Left */
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="slide"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Slide Right */
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="slide"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Slide Down */
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="slide"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}

/* Slide Up */
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
}

%%SELECTOR%%[data-eh-reveal-trigger="hover"][data-eh-reveal-trigger="hover"][data-eh-reveal-effect="slide"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="slide"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}

/* Swap Animations */

/* Swap Left */
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Swap Right */
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Swap Down */
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}

/* Swap Up */
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="swap"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}


/* Push Animations */

/* Push Left */
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="left"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="left"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Push Right */
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateX(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="right"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="right"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateX(0);
}

/* Push Down */
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="down"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="down"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}

/* Push Up */
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(1),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(1) {
    transform: translateY(-100%);
}

%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="hover"][data-eh-reveal-direction="up"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="push"][data-eh-reveal-trigger="click"][data-eh-reveal-direction="up"].eh-show .eh-content-reveal-panel:nth-child(2) {
    transform: translateY(0);
}


/* Circular */

/* Circular Left*/
%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: circle(0% at right center);
}

/* Circular Right*/
%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: circle(0% at left center);
}


/* Circular Down*/
%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: circle(0% at top center);
}


/* Circular Right*/
%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: circle(0% at bottom center);
}

%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-trigger="hover"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="circular"][data-eh-reveal-trigger="click"].eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: circle(100%);
}

/* Wipe */

/* Wipe Left*/
%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-direction="left"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: inset(0 0 0 100%);
}

/* Wipe Right*/
%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-direction="right"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: inset(0 100% 0 0);
}


/* Wipe Down*/
%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-direction="down"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: inset(0 0 100% 0);
}


/* Wipe Right*/
%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-direction="up"] .eh-content-reveal-panel:nth-child(2) {
	clip-path: inset(100% 0 0 0);
}

%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-trigger="hover"]:hover .eh-content-reveal-panel:nth-child(2),
%%SELECTOR%%[data-eh-reveal-effect="wipe"][data-eh-reveal-trigger="click"].eh-show .eh-content-reveal-panel:nth-child(2) {
    clip-path: inset(0 0 0 0);
}

'],'inlineScripts' => ['( function() {

  if(window.EhInstancesManager.instanceExists(\'EhContentRevealContainer\', \'%%ID%%\') ) return;

  const revealModule = () => {

     const containerEl = document.querySelector(\'%%SELECTOR%%\');
     let triggers = null;
     let eventApplied = false;

     const toggleContainer = () => {
      containerEl.classList.toggle(\'eh-show\');
    }

    const removeEventListener = () => {
    	if (eventApplied) {
          triggers.forEach( el => {
            el.removeEventListener(\'click\', toggleContainer);
          });
        }
    }
    const init = () => {

      {% if design.trigger.trigger|default(\'hover\') == \'click\' %}
        {% if design.trigger.click_trigger == \'container\' %}
            triggers = [containerEl];
        {% else %}
            try{
                triggers = document.querySelectorAll(\'{{design.trigger.selector}}\');
            } catch(e) {
               console.warn(\'Content Reveal Container #%%ID%%: Invalid trigger selector, will default to the container\');
               triggers = [containerEl];
            }
        {% endif %}

          triggers.forEach( el => {
            el.addEventListener(\'click\', toggleContainer);
          	eventApplied = true;
          })

      {% endif %}
    }

    return {
      init,
      toggleContainer,
      removeEventListener
    }

}

const instance = revealModule();
instance.init();
window.EhInstancesManager.registerInstance(\'EhContentRevealContainer\', \'%%ID%%\', instance);

 }());'],'scripts' => [ELEMENTS_HIVE_PRO_DIR . 'assets/js/utils/eh_instances_manager.js'],],];
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

  let instance = window.EhInstancesManager.getInstance(\'EhContentRevealContainer\', \'%%ID%%\')
  if( instance ) {
    instance.removeEventListener()
    window.EhInstancesManager.deleteInstance(\'EhContentRevealContainer\', \'%%ID%%\')
  }

  const revealModule = () => {

     const containerEl = document.querySelector(\'%%SELECTOR%%\')
     let triggers = null
     let eventApplied = false

     const toggleContainer = () => {
      containerEl.classList.toggle(\'eh-show\')
    }

     const removeEventListener = () => {
    	if (eventApplied) {
          triggers.forEach( el => {
            el.removeEventListener(\'click\', toggleContainer)
          })
        }
    }
    const init = () => {

      {% if design.trigger.trigger|default(\'hover\') == \'click\' %}
        {% if design.trigger.click_trigger == \'container\' %}
            triggers = [containerEl]
        {% else %}
            try{
                triggers = document.querySelectorAll(\'{{design.trigger.selector}}\')
            } catch(e) {
               console.warn(\'Content Reveal Container #%%ID%%: Invalid trigger selector, will default to the container\')
               triggers = [containerEl]
            }
        {% endif %}

        console.log(triggers, \'{{design.trigger.selector}}\', triggers.length)

          triggers.forEach( el => {
            el.addEventListener(\'click\', toggleContainer)
          	eventApplied = true
          })

      {% endif %}
    }

    return {
      init,
      toggleContainer,
      removeEventListener
    }

}

instance = revealModule()
instance.init()
window.EhInstancesManager.registerInstance(\'EhContentRevealContainer\', \'%%ID%%\', instance)


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
        return [['name' => 'data-eh-reveal-effect', 'template' => '{{design.animation.animation|default(\'circular\')}}'], ['name' => 'data-eh-reveal-direction', 'template' => '{{design.animation.direction|default(\'left\')}}'], ['name' => 'data-eh-reveal-trigger', 'template' => '{{design.trigger.trigger|default(\'hover\')}}'], ['name' => 'tabindex', 'template' => '0'], ['name' => 'role', 'template' => 'button'], ['name' => 'aria-roledescription', 'template' => 'Navigate between the 2 panels']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 3;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '11' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '12' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '13' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '14' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '15' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '16' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '17' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '18' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '19' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '20' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '21' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '22' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '23' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '24' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '25' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
