<?php

namespace ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal;

// ADD HTML ATTRIBUTES TO ALL ELEMENTS
add_filter('breakdance_element_attributes', '\ElementsHiveForBreakdancePro\Extensions\EntranceAnimation\BlockReveal\addAttributes', 100, 1);

/**
 * @param  ElementAttribute[] $attributes
 *
 * @return array
 */
function addAttributes($attributes)
{
    // Edge case, moving an element with block reveal enabled below/above another element with block reveal enabled
    $attributes[] = [
        "name" => "data-node-id",
        "template" => "%%ID%%",
    ];

    return $attributes;
}

