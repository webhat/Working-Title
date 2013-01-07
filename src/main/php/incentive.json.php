<?php
error_reporting(0);

function array_sort($array, $on) {
	$new_array = array();
	$sortable_array = array();

	foreach($array as $id => $item) {
		$new_array[$item[$on]] = $item;
	}

	sort($new_array);

	return $new_array;
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
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

$incentives = array_sort($p->getProperty('incentives'), 'amount');

if( $callback == "")
	print json_encode($incentives);
else
	print $callback ."( '$maker', ". json_encode($incentives) ." );";


?>
