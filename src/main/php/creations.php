<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
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
