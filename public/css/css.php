<?php

/**
 * Clarify.
 * 
 * Copyright (C) 2012 Roger Dudler <roger.dudler@gmail.com>
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

define('TERRIFIC_DIR', dirname(__FILE__) . '/..');

$output = '';

// load reset css
$output .= file_get_contents(TERRIFIC_DIR . '/css/core/reset.css');

// load layout css including skins
$output .= file_get_contents(TERRIFIC_DIR . '/layout/css/project.css');
foreach (glob(TERRIFIC_DIR . '/layout/css/skin/*') as $entry) {
    if (is_file($entry)) {
        $output .= file_get_contents($entry);
    }
}

// load plugin css
foreach (glob(TERRIFIC_DIR . '/css/plugins/*.css') as $entry) {
    if (is_file($entry)) {
        $output .= file_get_contents($entry);
    }
}

// load module css including skins
foreach (glob(TERRIFIC_DIR . '/modules/*', GLOB_ONLYDIR) as $dir) {
    $module = basename($dir);
    $css = $dir . '/css/' . strtolower($module) . '.css';
    if (is_file($css)) {
        $output .= file_get_contents($css);
    }
    foreach (glob($dir . '/css/skin/*') as $entry) {
        if (is_file($entry)) {
            $output .= file_get_contents($entry);
        }
    }
}

require_once '../../application/library/thirdparty/cssmin.php';
// $output = cssmin::minify($output);
header("Content-Type: text/css");
echo $output;

?>
