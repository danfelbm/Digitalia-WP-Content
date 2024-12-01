<?php

namespace ElementsHiveForBreakdancePro;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;

\Breakdance\Elements\PresetSections\PresetSectionsController::getInstance()->register(
    "ElementsHiveForBreakdancePro\\image_repeater",
    c(
        "images",
        "Images",
        [c(
        "images",
        "Images",
        [c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['multiple' => false]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '', 'defaultTitle' => '', 'buttonName' => 'Add Images', 'galleryMode' => true, 'galleryMediaPath' => 'image']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout', 'preset' => ['slug' => 'ElementsHiveForBreakdancePro\\image_repeater']]],
        false,
        false,
        [],
      ),
    true,
    ['relativeDynamicPropertyPaths' => ['0' => ['accepts' => 'gallery', 'path' => 'images']]]
);

