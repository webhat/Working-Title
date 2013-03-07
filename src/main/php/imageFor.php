<?php

require_once('bootstrap.php');
require_once('function.resize.php');

$maker = 'Unknown';
if(array_key_exists( 'maker', $_GET))
	$maker = (string) $_GET['maker'];

$id = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$id = (string) $_GET['id'];

$crea = new Creations();

$creations = $crea->getCreations(array( "username" => $maker));

foreach($creations as $creation) {
	$creations = $creation['creations'];
	break;
}

try {
	@$filename = basename( $creations[sizeof($creations)-1-$id]['content'] );
	$image = resize("upload/". $filename, array( 'w' => 300));
} catch( Exception $e) {
	// FIXME: hack
	$image = resize("../img/wt365-header.png", array( 'w' => 300), false);
}


header("Content-type: ". $image['type']);
echo $image['image'];
?>
