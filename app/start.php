<?php

// Ruta raíz
define('INC_ROOT', dirname(__DIR__));

// Require composer autoloader
require_once INC_ROOT . '/vendor/autoload.php';

// Require core files
/*require_once INC_ROOT . '/app/core/App.php';
require_once INC_ROOT . '/app/core/Controller.php';*/

// Require database component
//require_once INC_ROOT . '/app/database.php';

// Ruta raíz para URL 
define('HTTP_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);

// Ruta raíz para recursos
define('ASSET_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);
