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

//$crea = $p->getProperty('creations');

$creations = new Creations();

$crea = $creations->getCreations(array( "username" => $maker));
$crea = array_values( $crea);
$crea = array_shift( $crea)['creations'];

$output = array();

foreach( $crea as $elem) {
	$elem['content'] = $creations->stripUpload( $elem['content']);
	array_push( $output, $elem);
}

if( $callback == "")
	print json_encode($output);
else
	print $callback ."( ". json_encode($output) ." );";


?>
