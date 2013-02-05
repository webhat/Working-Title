<?php

// Originally written for SNYPHER...

$ip = $_SERVER['REMOTE_ADDR'];
// XXX: redhat - 20100129 - This busts the cache when there is a query which goes first through the cache:global:80 then to apache:localhost:80
if( isset($_SERVER['HTTP_X_FORWARD_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARD_FOR'];
}
// XXX: redhat - 20100129 - I doubt this actually does anything, but I added it anyway
if( isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

$admin = false;
if($ip == "24.132.203.232") {
	$admin = true;
}

?>
