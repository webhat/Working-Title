<?php

header("Content-type: application/x-javascript");

require('bootstrap.php');
require('loggedinas.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$callback = "";
if(array_key_exists( 'callback', $_GET))
	$callback = (string) $_GET['callback'];


$p = new MakerProfile( $maker);
$p->reset();


$incentives = $p->getProperty('incentives');

if( $callback == "")
	print json_encode($incentives);
else
	print $callback ."( ". json_encode($incentives) ." );";


?>
