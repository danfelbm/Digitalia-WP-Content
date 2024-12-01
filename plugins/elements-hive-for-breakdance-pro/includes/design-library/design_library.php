<?php

namespace ElementsHiveForBreakdancePro\DesignLibrary;

use function Breakdance\DesignLibrary\setDesignSets;
use function Breakdance\DesignLibrary\getRegisteredDesignSets;

/* Use this style when/if https://breakdance.canny.io/features/p/design-library-custom-providers is implemented */
// $DemoSectionsSite = [
//     '0' => [
//         "name" => "Elements Hive Demo Sections",
//         "url" => 'https://demos.elementshive.com',
//         "type" => "sections",
//         "fullSiteImportEnabled" => false,
//     ],
// ];


$currentSites = getRegisteredDesignSets();

$ehSites = [
    'https://demos.elementshive.com'
];

$matches = array_intersect($currentSites, $ehSites);

if(empty($matches)) {
    setDesignSets(array_merge($currentSites ?: [], $ehSites));
}
