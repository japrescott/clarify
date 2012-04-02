<?php

/**
 * Clarify.
 * 
 * Copyright (C) 2012 Roger Dudler <roger.dudler@gmail.com>
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

lock();

define('API_COLOR', 'color');
define('API_COMMENT', 'comment');
define('API_LIBRARY', 'library');
define('API_MEASURE', 'measure');
define('API_PROJECT', 'project');
define('API_SCREEN', 'screen');

$api = $route[2];

switch ($api) {
    case API_COLOR:
    case API_COMMENT:
    case API_LIBRARY:
    case API_MEASURE:
    case API_PROJECT:
    case API_SCREEN:
        $action = $api . '.' . $route[3];
        if (!is_file(LIBRARY . 'api/' . strtolower($api) . '.php')) {
            die('api not available');
        }
        require LIBRARY . 'api/' . strtolower($api) . '.php';
        break;
}

?>