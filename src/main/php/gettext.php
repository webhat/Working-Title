<?php

require_once('bootstrap.php');

define("LOCALE_DIR", "/home/ec2-user/beta/Working-Title/src/main/locale");
$locale = Locale::detectLanguage("0.0.0.0", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
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
	return _($params['gt']);
}

//$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

?>

