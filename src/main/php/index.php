<?php

date_default_timezone_set("UTC");

require('bootstrap.php');
require('loggedinas.php');
require('gettext.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$smarty = new Smarty;

$p = new MakerProfile( $maker);
$p->reset();

$crea = new Creations();

$smarty->setConfigDir(getcwd() ."/../resources/smarty");
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setCompileDir('/tmp/smarty/compile');

$smarty->caching = 0;
$smarty->compile_check = true;
$smarty->force_compile = true;
$smarty->debugging = false;

$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

/*
$smarty->assign( 'MAKERS', array(
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' ),
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' ),
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' ),
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' ),
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' ),
			array( 'username' => 'redhat', 'creation' => '/upload/subsidie.jpg1355739720.jpg' )
			)
		);
*/

$smarty->assign( 'MAKERS', $crea->getLatest());


if( $loggedinas != $maker) {
	$smarty->assign( 'EDIT', 'display:none;');
} else {
	$smarty->assign( 'EDIT', 'display:inline;');
}

function addhttp($url) {
	    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
				        $url = "http://" . $url;
								    }
			    return $url;
}

$smarty->assign( 'USER', "Frontpage");
$smarty->assign( 'WT', ''. $p->getProperty("profilename"));
$smarty->assign( 'PROFILE', ''. $p->getProperty('profile'));
$smarty->assign( 'SITE', ''. addhttp($p->getProperty('site')));
$smarty->assign( 'PIMG', ''. md5(strtolower(trim($p->getProperty('mail')))));
$smarty->assign( 'WHO', ''. $p->getProperty('whoami'));
$smarty->assign( 'WHAT', ''. $p->getProperty('whatdoido'));
$smarty->assign( 'WHY', ''. $p->getProperty('whydoidothis'));
$smarty->assign( 'WANT', ''. $p->getProperty('whatdoiwant'));
$smarty->assign( 'WORK', ''. $p->getProperty('work'));

$smarty->display( 'smarty/frontpage.tpl');

?>
