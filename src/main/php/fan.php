<?php

date_default_timezone_set("UTC");

require('bootstrap.php');
require('loggedinas.php');
require('gettext.php');

$smarty = new Smarty;

$ul = new UserLogin($loggedinas);
$ul->reset();
$hash = $ul->getCookie();

$smarty->setConfigDir(getcwd() ."/../resources/smarty");
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setCompileDir('/tmp/smarty/compile');

$smarty->caching = 0;
$smarty->compile_check = true;
$smarty->force_compile = true;
$smarty->debugging = false;

$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

$smarty->assign( 'USER', $loggedinas);
$smarty->assign( 'HASH', $hash);
$smarty->display( 'smarty/fan.tpl');

?>
