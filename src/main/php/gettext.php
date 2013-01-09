<?php

define("LOCALE_DIR", "/home/ec2-user/beta/Working-Title/src/main/locale");
define("LOCALE", "nl_NL.utf8");

putenv('LC_ALL='. LOCALE);
setlocale(LC_ALL, 0);
setlocale(LC_CTYPE, 0);
setlocale(LC_ALL, LOCALE);

bindtextdomain("messages", LOCALE_DIR);
bind_textdomain_codeset("messages", 'UTF-8');

textdomain("messages");

function smarty_function_gettext($params, $template) {
	return _($params['gt']);
}

//$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

?>

