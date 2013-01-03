<?php

require('bootstrap.php');
require('function.resize.php');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$id = "";
if(array_key_exists( 'id', $_GET))
	$id = (string) $_GET['id'];

$size = "";
if(array_key_exists( 'size', $_GET))
	$size = (string) $_GET['size'];

$width = 100;
switch( $size) {
	case 's':
		$width = 100;
		break;
	case 'm':
		$width = 300;
		break;
	default:
		$width = 100;
}

$image = resize("upload/". $id, array( 'w' => $width));

header("Content-type: ". $image['type']);
echo $image['image'];

?>
