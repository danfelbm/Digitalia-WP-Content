<?php

namespace ElementsHiveForBreakdancePro\Extensions\ScrollAnimation\Mask;

add_filter( 'breakdance_element_actions', '\ElementsHiveForBreakdancePro\Extensions\ScrollAnimation\Mask\addActions', 100, 1 );

function addActions( $actions ) {
    $actions[] = [
        'onPropertyChange' => [
            [
                'script' => <<<JS
                    ( function() {
                        if ('{{settings.elements_hive_pro.scroll_animation.animation_type}}' == 'mask' ) {
                            if(window.EhInstancesManager.instanceExists("EhScrollAnimationMask", "%%ID%%")) {
                                window.EhInstancesManager.getInstance("EhScrollAnimationMask", "%%ID%%")?.destroy()
                                console.log('destroyed')
                                window.EhInstancesManager.deleteInstance("EhScrollAnimationMask", "%%ID%%")
                            }
                            const containerEl = document.querySelector('%%SELECTOR%%')
                            if (!containerEl ) return
                            const settings = {
                                style: "{{settings.elements_hive_pro.scroll_animation.mask_style|default("wipe")}}",
                                direction: "{{settings.elements_hive_pro.scroll_animation.mask_direction|default("up")}}",
                                direction_alternative: "{{settings.elements_hive_pro.scroll_animation.mask_direction_alternative|default("center")}}",
                                scroll_direction: "{{settings.elements_hive_pro.scroll_animation.scroll_direction|default(downUp)}}",
                                trigger_element: "{{settings.elements_hive_pro.scroll_animation.trigger_element|default("self")}}",
                                trigger_selector: `{{settings.elements_hive_pro.scroll_animation.trigger_selector|default()}}`,
                                trigger_location: {{settings.elements_hive_pro.scroll_animation.trigger_location|json_encode}},
                                is_pinned: {{settings.elements_hive_pro.scroll_animation.is_pinned|default("false")}},
                                element_to_pin: `{{settings.elements_hive_pro.scroll_animation.element_to_pin|default("self")}}`,
                                pin_selector: "{{settings.elements_hive_pro.scroll_animation.pin_selector}}",
                                play_once: {{settings.elements_hive_pro.scroll_animation.play_once|default("false")}},
                                disable_pin_spacing: {{settings.elements_hive_pro.scroll_animation.advanced.disable_pin_spacing|default("false")}},
                                scrub: {{settings.elements_hive_pro.scroll_animation.advanced.scrub.number|default("true")}},
                                ease: "{{settings.elements_hive_pro.scroll_animation.advanced.ease|default("linear")}}",
                                disable_at: "{{settings.elements_hive_pro.scroll_animation.advanced.disable_at}}",
                                enable_markers: {{settings.elements_hive_pro.scroll_animation.advanced.enable_markers|default("false")}},
                            }
                            const options = {
                                containerEl,
                                id: %%ID%%,
                                ...settings
                            }
                            const instance = new EhScrollAnimationMask(options)
                            window.EhInstancesManager.registerInstance("EhScrollAnimationMask", "%%ID%%", instance)
                        } else {
                            if ( window.EhInstancesManager?.instanceExists('EhScrollAnimationMask', '%%ID%%') ) {
                                window.EhInstancesManager.getInstance("EhScrollAnimationMask", "%%ID%%")?.destroy()
                                window.EhInstancesManager.deleteInstance('EhScrollAnimationMask', '%%ID%%')
                            }
                        }
                    }());
                JS,
                'dependencies' => ['settings.elements_hive_pro.scroll_animation']
            ],
        ],
    ];
    $actions[] = [
        'onBeforeDeletingElement' => [
            [
                'script' => <<<JS
                    ( function() {
                        if(window?.EhInstancesManager?.instanceExists("EhScrollAnimationMask", "%%ID%%")) {
                            window.EhInstancesManager.getInstance("EhScrollAnimationMask", "%%ID%%")?.destroy()
                            window.EhInstancesManager.deleteInstance("EhScrollAnimationMask", "%%ID%%")
                        }
                    }());
                JS,
            ],
        ],
    ];
    $actions[] = [
        'onMountedElement' => [
            [
                'script' => <<<JS
                    ( function() {
                        console.log('mounted')
                        if ('{{settings.elements_hive_pro.scroll_animation.animation_type}}' == 'mask' ) {
                            if(window.EhInstancesManager.instanceExists("EhScrollAnimationMask", "%%ID%%")) {
                                window.EhInstancesManager.getInstance("EhScrollAnimationMask", "%%ID%%")?.destroy()
                                window.EhInstancesManager.deleteInstance("EhScrollAnimationMask", "%%ID%%")
                            }
                            const containerEl = document.querySelector('%%SELECTOR%%')
                            if (!containerEl ) return
                            const settings = {
                                style: "{{settings.elements_hive_pro.scroll_animation.mask_style|default("wipe")}}",
                                direction: "{{settings.elements_hive_pro.scroll_animation.mask_direction|default("up")}}",
                                direction_alternative: "{{settings.elements_hive_pro.scroll_animation.mask_direction_alternative|default("center")}}",
                                scroll_direction: "{{settings.elements_hive_pro.scroll_animation.scroll_direction|default(downUp)}}",
                                trigger_element: "{{settings.elements_hive_pro.scroll_animation.trigger_element|default("self")}}",
                                trigger_selector: `{{settings.elements_hive_pro.scroll_animation.trigger_selector|default()}}`,
                                trigger_location: {{settings.elements_hive_pro.scroll_animation.trigger_location|json_encode}},
                                is_pinned: {{settings.elements_hive_pro.scroll_animation.is_pinned|default("false")}},
                                element_to_pin: "{{settings.elements_hive_pro.scroll_animation.element_to_pin|default("self")}}",
                                pin_selector: `{{settings.elements_hive_pro.scroll_animation.pin_selector}}`,
                                play_once: {{settings.elements_hive_pro.scroll_animation.play_once|default("false")}},
                                disable_pin_spacing: {{settings.elements_hive_pro.scroll_animation.advanced.disable_pin_spacing|default("false")}},
                                scrub: {{settings.elements_hive_pro.scroll_animation.advanced.scrub.number|default("true")}},
                                ease: "{{settings.elements_hive_pro.scroll_animation.advanced.ease|default("linear")}}",
                                disable_at: "{{settings.elements_hive_pro.scroll_animation.advanced.disable_at}}",
                                enable_markers: {{settings.elements_hive_pro.scroll_animation.advanced.enable_markers|default("false")}},
                            }
                            const options = {
                                containerEl,
                                id: %%ID%%,
                                ...settings
                            }
                            const instance = new EhScrollAnimationMask(options)
                            window.EhInstancesManager.registerInstance("EhScrollAnimationMask", "%%ID%%", instance)
                        } else {
                            if ( window.EhInstancesManager?.instanceExists('EhScrollAnimationMask', '%%ID%%') ) {
                                window.EhInstancesManager.getInstance("EhScrollAnimationMask", "%%ID%%")?.destroy()
                                window.EhInstancesManager.deleteInstance('EhScrollAnimationMask', '%%ID%%')
                            }
                        }
                    }());
                JS,
            ],
        ],
    ];
    return $actions;
}
