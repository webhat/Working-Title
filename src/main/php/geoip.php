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
switch(md5($ip)) {
	case 'd0eb42194ae647e10fe8fcebad5ed5cd':
	case 'dbf1791f8606b86e314e437276c4f548':
		$admin = true;
		break;
	default:
		$admin = false;
		break;
}

?>
