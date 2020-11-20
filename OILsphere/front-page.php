<?php
require_once('header.php');
$sections = [
    'front-twice-sliders',
    // 'front-catalog',
    'front-popular-slider',
    'front-about',
    'last-articles',
    'map'
];
foreach ($sections as $section) {
    include(__DIR__ . '/template-parts/' . $section . '.php');
}

require_once('footer.php');