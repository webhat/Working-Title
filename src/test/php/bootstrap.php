<?php

function loader($class)
{
    $file = "src/main/php/". $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
}

spl_autoload_register('loader');
