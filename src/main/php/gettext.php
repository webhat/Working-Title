<?php

require_once('bootstrap.php');
require_once('geoip.php');

define("LOCALE_DIR", getcwd() ."../locale");
$locale = MyLocale::detectLanguage("0.0.0.0", $_SERVER['HTTP_ACCEPT_LANGUAGE']);

// FIXME: dirty hack
if($locale['locale'] == 'nl') $locale['locale'] = "nl_NL";
if($locale['locale'] == 'en') $locale['locale'] = "en_US";
if($locale['locale'] == 'en_GB') $locale['locale'] = "en_US";

define("LOCALE", $locale['locale'] .".utf8");
?><!-- <?= LOCALE ?> --><?php
?><!-- <?= $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?> --><?php

define("LANG",preg_replace("/_.*/","",LOCALE));

//putenv('LC_ALL='. LOCALE);
setlocale(LC_ALL, LOCALE);

bindtextdomain("messages", LOCALE_DIR);
bind_textdomain_codeset("messages", 'UTF8');

textdomain("messages");

function smarty_function_gettext($params, $template) {
	setlocale(LC_ALL, LOCALE);
	$msg = _($params['gt']);

	error_log($msg ." - ". $params['gt']);
	unset($params['gt']);


	if(empty($params)) {
		return $msg;
	} else {
		return vsprintf( $msg, $params);
	}
}

//$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

?>

