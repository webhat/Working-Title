<?php

function loader($class) {
	$file = "". $class . '.php';
	if (file_exists($file)) {
		require $file;
	} else if(file_exists("../../../ext/php/libs/" . $class .".class.php")) {
		$file = "../../../ext/php/libs/" . $class .".class.php";
		require $file;
	}
}

spl_autoload_register('loader');

foreach($_POST  as $key => $value) {
	$_POST[$key] = strip_tags($value);
}

foreach($_GET  as $key => $value) {
	$_GET[$key] = strip_tags($value);
}


