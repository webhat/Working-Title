<?php

include_once('config.inc.php');

function loaderb($class)
{
    $file = "src/main/php/". $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('loaderb');
