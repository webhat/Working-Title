<?php

$POST = $_POST;
require_once 'loggedinas.php';

foreach( $POST as $prop => $val) {
	$storedprop = (string) $prop;
	$storedval = (string) $val;
	$doc = new DOMDocument();

	// load the HTML string we want to strip
	$doc->loadHTML($storedval);

	// get all the script tags
	$script_tags = $doc->getElementsByTagName('script');

	$length = $script_tags->length;

	// for each tag, remove it from the DOM
	for ($i = 0; $i < $length; $i++) {
		  $script_tags->item(0)->parentNode->removeChild($script_tags->item(0));
	}

	// get the HTML string back
	$no_script_html_string = $doc->saveHTML();
	$ul->setProperty($storedprop, $no_script_html_string);
}
$ul->store();

?>
