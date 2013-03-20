<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require('bootstrap.php');
require('loggedinas.php');

$callback = "";
if(array_key_exists( 'callback', $_GET))
	$callback = (string) $_GET['callback'];

$maker = $loggedinas;
$maker = "Roos Blufpand";

$p = new MakerProfile( $maker);
$p->reset();

$analytics = array();

$a = new Analytics();

$analytics =  array( "dates" => array(),
		"total" => $a->getAnalyticsTotalFor( $maker)
		);

$date = "";

for($i = 1; $i < 13; $i++ ) {
	try {
		if( $i < 10)
			$date = "2013-02-0". $i;
		else
			$date = "2013-02-". $i;
		$an = $a->getAnalyticsFor( $date, $maker);
		$analytics['dates'][$i] = $an;
	} catch( Exception $e) {
		$analytics['dates'][$i] = array( "date" => $date, "new" => 0, "visits" => 0);
	}
}



/*
$analytics = "";
$file_handle = fopen("../js/stats.json", "r");
while (!feof($file_handle)) {
	   $analytics .= fgets($file_handle);
}
fclose($file_handle);

$analytics = json_decode($analytics);
*/

if( $callback == "")
	print json_encode($analytics);
else
	print $callback ."( '$maker', ". json_encode($analytics) ." );";


?>
