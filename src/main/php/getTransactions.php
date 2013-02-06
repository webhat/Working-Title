<?php

require_once("bootstrap.php");
require_once('geoip.php');
require_once('smartyload.php');

if(!$admin) exit();


$p = new Payment();

$smarty->assign( 'T', $p->getTransactions());
$smarty->display( 'smarty/trans.tpl');
?>
