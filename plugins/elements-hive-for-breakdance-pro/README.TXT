=== Elements Hive for Breakdance Pro ===
Contributors: elementshive
Tags: extension, addon, webgl, threejs, creative, effect, animation, gsap, transition, animation
Tested up to: 6.4.1
Stable tag: 1.2.6
Requires PHP: 7.4
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

**Elements Hive for Breakdance Pro** extends the **[Breakdance Website Builder](https://breakdance.com)** with unique creative elements and extensions.

== Description ==

**Elements Hive for Breakdance Pro** is a *Breakdance Addon* and requires **[Breakdance](https://breakdance.com)** to work.

**Power up your Breakdance Website Builder** with unique Elements and Extensions allowing you to **create interactive web experiences with ease**.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= Can I use the plugin without Breakdance? =

No. Breakdance has to be installed in order for the plugin to work.

= Where can I access the Elements? =

The elements are available in the Add Element panel under the Elements Hive Pro category.

= Where can I access the Extensions? =

The extensions are accessible via the Design tab of the Section element under the Elements Hive category.

== Changelog ==

**Changelog**

= 1.0.0 - 17/07/2023 =

* First release

= 1.0.1 - 18/07/2023 =

* Update license server config
* Hide activate/deactivate license button until a license key is saved first.

= 1.1.0 - 07/08/2023 =

* New: Tilt 3D extension
* New: Images Trail extension
* Added: Morph Cursor >  z-index setting
* Added: Content Reveal Container > Builder Helper setting to show back panel
* Fixed: Morph Cursor > Default cursor visible on morph targets
* Fixed: Morph Cursor > Morph target settings change not update live
* Fixed: Image Comparison > Mis-aligned borders settings issue
* Fixed: Content Reveal Container > Hide additional orphan panels if users mistakely adds more than 2
* Fixed: WebGL Wavy Gradients > Layering when Apply to Page is enabled
* Fixed: WebGL Wavy Gradients > Compatibility with native overlay and background settings
* Fixed: WebGL Wavy Gradients > Canvas remains visible when Apply to Page was used and the extension is disabled
* Fixed: Gooey Overlay > Container doesn't wrap content size by default if below 300px
* Fixed: Morph Masker > Selector settings missing in scroll animation type
* Fixed: Morph Masker > Missing media query support for certain settings
* Fixed: WebGL Lone Slider > Sometimes the default are not visible when the element is first added to a page
* Fixed: WebGL Lone Slider > Missing media query support for navigation icons position

= 1.2.0 - 05/09/2023 =

* New: Demo Sections to Design Library
* Fixed: Tilt 3D > Effect stays active on elements if it was enabled and then is disabled
* Fixed: Content Reveal Container > 3D perspective not working
* Fixed: Content Reveal Container > Missing unit to minimum height
* Fixed: Content Reveal Container > Flip animation not working in builder mode
* Added: Content Reveal Container > Multiple elements per Selector
* Added: Morph Cursor > Support nested morph targets
* Fixed: WebGL Lone Slider > Distortion still visible when disabled
* Fixed: WebGL Lone Slider > Missing media queries in position props
* Fixed: WebGL Lone Slider > Missing cross origin for texture load
* Added: Gooey Overlay > Multiple elements per selector
* Fixed: Content Accordion > Content duration and stagger affects the whole animation
* Fixed: WebGL Image Carousel > Missing cross origin for texture load
* Fixed: WebGL Liquid Distortion > Missing cross origin for texture load

= 1.2.1 - 13/09/2023 =

* New: Mouse Track extension

= 1.2.2 - 04/10/2023 =

* New: Entrance Animations Extension
* Added: WebGL Liquid Distortion > Actions dependencies
* Added: WebGL Wavy Gradients > Actions dependencies
* Added: Morph Dividers > Actions dependencies
* Added: Images Trail > Actions dependencies
* Added: Tilt 3D > Actions dependencies
* Added: Mouse Track > Actions dependencies
* Added: Morphing Cursor > Actions dependencies
* Added: Morphing Cursor > Disable Squeeze Effect setting
* Added: Morphing Cursor > Speed Factor setting
* Added: WebGL Lone Slider > Accessibility support
* Fixed: WebGL Wavy Gradients > Resizing logic in builder mode
* Fixed: WebGL Liquid Distortion > Resizing logic builder mode
* Fixed: Tilt 3D > BD Sticky Compatibility
* Fixed: Content Reveal Container > Keyboard support when using hover trigger

= 1.2.3 - 16/10/2023 =

* Enhancement: Entrance Animations Displacement Effect > Auto scale intensity based on browser engine
* Added: Entrance Animations Displacement Effect > Disable on WebKit setting
* Enhancement: Entrance Animations Displacement Effect > Support nested elements ( Advanced Tabs, Advanced Accordion)
* Enhancement: Entrance Animations Block Reveal Effect > Support nested elements ( Advanced Tabs, Advanced Accordion)

= 1.2.4 - 31/10/2023 =

* New: Entrance Animations Mask Effect
* Enhancement: Mouse Track extension > Optional Z Dimension settings for 3D effect
* Tweak: Delete API Call to Demo Sections server during server-side page generation
* Fixed: Entrance Animations > Respect delay on restart

= 1.2.5 - 28/11/2023 =

* New: WebGL Metaballs extension
* Fixed: WebGL Liquid Distrtion > DOM element remains when section is deleted if Apply To Page is enabled

= 1.2.6 - 07/12/2023 =

* Fixed: WebGL Metaballs > mouse coordinates when section greater than 100vh
* Fixed: WebGL Liquid Distortion > mouse coordinates when section greater than 100vh
* Fixed: Entrance Animation Displacement > Missing Direction and Distance controls

= 1.2.7 - 05/01/2024 =

* New: Scroll Animation Mask Effects
* Fixed: Content Reveal Container > hover on touch devices
* Enhancement: Support quotes, double quotes in selector controls
