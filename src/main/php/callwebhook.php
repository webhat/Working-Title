<?php

if( basename(__FILE__) == "callwebhook.php") {
	print("You might like to change the filename, this way the evil hackers can't update your site. *evil grinz*\n");
	exit();
}

$webhook = new WebHook($_POST['payload']);
$capistrano = new CallCapistrano();


if($webhook->branch == 'master') {
	$capistrano->call();
} else if($webhook->branch == 'develop') {
	$capistrano->call();
} else {
	exit();
}

?>

