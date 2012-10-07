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
