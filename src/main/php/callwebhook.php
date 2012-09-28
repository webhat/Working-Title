<?php

$webhook = new WebHook($_POST['payload']);
$capistrano = new CallCapistrano();

if($webhook->branch == 'master') {
//	$capistrano->call();
} else if($webhook->branch == 'develop') {
//	$capistrano->call();
} else {
	exit();
}

?>

