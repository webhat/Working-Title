<?php

header("Content-type: application/x-javascript");

require('bootstrap.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$callback = "";
if(array_key_exists( 'callback', $_GET))
	$callback = (string) $_GET['callback'];

$smarty = new Smarty;

$p = new MakerProfile( $maker);
$p->reset();

$creations = $p->getProperty('creations');

if( $callback == "")
	print json_encode($creations);
else
	print $callback ."( ". json_encode($creations) ." );";

?>
