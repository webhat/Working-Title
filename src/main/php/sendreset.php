<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$ul = new UserLogin($json->username);
$ul->reset();
/*
if($ul->getCookie() != "") {
	header("HTTP/1.1 403 Can't Reset User");
	echo "{ \"error\": \"Gebruiker kan niet worden reset\"}";
	return;
}
*/

$mail = $ul->getProperty("mail");

if($mail == $json->mail) {
	header("HTTP/1.1 201 Reset");
	$ul->mailReset();
	
	echo "{ \"success\": \"". _("Gebruiker wordt reset, kijk in je mailbox for een link.")."\"}";
	return;
}

header("HTTP/1.1 403 Can't Reset User");
echo "{ \"error\": \""._("Gebruiker kan niet worden reset")."\"}";
?>
