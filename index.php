<?php

define('BP',__DIR__ . DIRECTORY_SEPARATOR);
define('BP_APP', BP . 'app' . DIRECTORY_SEPARATOR);

$autoload=[
    BP_APP . 'controller',
    BP_APP . 'core',
    BP_APP . 'model'
];


$paths = implode(PATH_SEPARATOR,$autoload);

set_include_path($paths);

spl_autoload_register(function($class){

    $putanje = explode(PATH_SEPARATOR,get_include_path());
    foreach($paths as $path){

        $file = $path . DIRECTORY_SEPARATOR .
            $path . '.php';

        if(file_exists($file)){
            require_once $file;
            break;
        }
    }
});

App::start();