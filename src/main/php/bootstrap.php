<?php

if (!function_exists('loader')) {
	function loader($class) {
		$file = "". $class . '.php';
		if (file_exists($file)) {
			require $file;
		}	else if (file_exists("../". $file)) {
			require "../". $file;
		} else if(file_exists("../../../ext/php/libs/" . $class .".class.php")) {
			$file = "../../../ext/php/libs/" . $class .".class.php";
			require $file;
		} else if(file_exists("../../../ext/php/lib/classes/" . $class .".class.php")) {
			$file = "../../../ext/php/lib/classes/" . $class .".class.php";
			require $file;
		} else if(file_exists("../../../../ext/php/lib/classes/" . $class .".class.php")) {
			$file = "../../../../ext/php/lib/classes/" . $class .".class.php";
			require $file;
		} else if(file_exists("../../../mail/src/php/" . $class .".class.php")) {
			$file = "../../../mail/src/php/" . $class .".class.php";
			require $file;
		}
	}
}

if (!function_exists('loadera')) {
	function loadera($class) {
			$file = "src/main/php/". $class . '.php';
			if (file_exists($file)) {
					require $file;
		} else if(file_exists("ext/php/libs/" . $class .".class.php")) {
			$file = "ext/php/libs/" . $class .".class.php";
			require $file;
		}
	}
}

if (!function_exists('loader_puppet')) {
	function loader_puppet($class) {
			$file = "src/main/php/". $class . '.php';
			if (file_exists($file)) {
					require $file;
		} else if(file_exists("/var/data/ext/php/lib/classes/" . $class .".class.php")) {
			$file = "/var/data/ext/php/lib/classes/" . $class .".class.php";
			require $file;
		} else if(file_exists("/var/data/ext/php/lib/classes/" . $class .".class.php")) {
			$file = "/var/data/ext/php/lib/classes/" . $class .".class.php";
			require $file;
		} else if(file_exists("/var/data/ext/php/libs/" . $class .".class.php")) {
			$file = "/var/data/ext/php/libs/" . $class .".class.php";
			require $file;
		}
	}
}

spl_autoload_register('loader');
spl_autoload_register('loadera');
spl_autoload_register('loader_puppet');

foreach($_POST  as $key => $value) {
	$_POST[$key] = strip_tags($value);
}

foreach($_GET  as $key => $value) {
	$_GET[$key] = strip_tags($value);
}


