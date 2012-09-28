<?php

require('../../ext/php/libs/Smarty.class.php');

$smarty = new Smarty;

$smarty->caching = 0;
$smarty->compile_check = true;
$smarty->force_compile = true;
$smarty->debugging = false;

$smarty->display( 'index.tpl');

?>
