<?php
/**
This Example shows how to pull the Members of a List using the MCAPI.php 
class and do some basic error checking.
**/
require_once 'ext/php/libs/MCAPI.class.php';

$api = new MCAPI("XXX");

$retval = $api->lists();

if ($api->errorCode){
	echo "Unable to load lists()!";
	echo "\n\tCode=".$api->errorCode;
	echo "\n\tMsg=".$api->errorMessage."\n";
} else {
	echo "Lists that matched:".$retval['total']."\n";
	echo "Lists returned:".sizeof($retval['data'])."\n";
	foreach ($retval['data'] as $list){
		echo "Id = ".$list['id']." - ".$list['name']."\n";
		echo "Web_id = ".$list['web_id']."\n";
		echo "\tSub = ".$list['stats']['member_count'];
		echo "\tUnsub=".$list['stats']['unsubscribe_count'];
		echo "\tCleaned=".$list['stats']['cleaned_count']."\n";
	}
}

?>
