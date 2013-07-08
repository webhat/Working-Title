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
$crea = $crea[0]['creations'];

$output = array();

foreach( $crea as $elem) {
	$file = $creations->stripUpload( $elem['content']);
	$filename = explode(".", $file);
	switch( $elem['type']) {
		case 'video':
			$elem['types'] = array( array_pop($filename), 'webm');
			break;
	}
	$elem['content'] = implode(".", $filename);
	array_push( $output, $elem);
}

if( $callback == "")
	print json_encode($output);
else
	print $callback ."( ". json_encode($output) ." );";


?>
