<?php

function array_sort($array, $on) {
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				foreach ($v as $k2 => $v2) {
					if ($k2 == $on) {
						$sortable_array[$k] = $v2;
					}
				}
			} else {
				$sortable_array[$k] = $v;
			}
		}

		sort($sortable_array, SORT_NUMERIC);

		foreach ($sortable_array as $k => $v) {
			$new_array[$k] = $array[$k];
		}
	}

	return $new_array;
}

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
