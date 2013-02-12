<?php

require_once("bootstrap.php");
require_once('geoip.php');
require_once('smartyload.php');

if(!$admin) exit();


$id = "";
if(array_key_exists( 'id', $_GET))
	$id = (string) $_GET['id'];


$p = new Payment();

$payments = array();
$fans = array();

if($id == "") {
	$users = new Users();
	$userlist = $users->getUsers();

	foreach($userlist as $user) {
		if(array_key_exists('username', $user)) {
			if($user['username'] == "") continue;
			$fans[$user['username']] = 0;
			$t =$p->getPayments($user['username']);
			if(is_array($t))
				$payments = array_merge( $payments, $t);
		}
	}
} else {
	$fans[$id] = 0;
	$payments =$p->getPayments($id);
}

$done = array();

$transactions = $p->getTransactions();
foreach($transactions as $transaction) {
	if(array_key_exists( "custom", $transaction)) {
		if( array_key_exists($transaction['custom'], $done) && @$transaction['payment_status'] == "Completed")
			$done[$transaction['custom']]++;
		else
			if( @$transaction['payment_status'] == "Completed")
				$done[$transaction['custom']] = 1;
	} else {
		if(array_key_exists( "transx", $transaction)) {
			if( array_key_exists($transaction['transx'], $done))
				$done[$transaction['transx']]++;
			else
				$done[$transaction['transx']] = 1;
		}
	}
}

//echo "Pay: ". count($payments) ."<br />";
//echo "Tra: ". count($done) ."<br />";

for($itt = 0; $itt < count($payments); $itt++) {
	if($payments[$itt]['pending'] == true) {
			if(array_key_exists( 'uniq', $payments[$itt]) && array_key_exists( $payments[$itt]['uniq'], $done) && $done[$payments[$itt]['uniq']] > 0 ) {
				$done[$payments[$itt]['uniq']]--;
				$payments[$itt]['pending'] = false;
			} else {
				if(array_key_exists( $payments[$itt]['code'], $done) && $done[$payments[$itt]['code']] > 0 ) {
					$done[$payments[$itt]['code']]--;
					$payments[$itt]['pending'] = false;
				}
			}
	}

	if($payments[$itt]['pending'] == false) {
		$fans[$payments[$itt]['maker']]++;
	}
}

//var_export($done);

foreach( $fans as $u => $f) {
	try {
		$m = new MakerProfile($u);
		$m->setFans($f);
	} catch( Exception $e) {
		error_log("'$u' not a username");
	}
}

$smarty->assign( 'T', $payments);
$smarty->display( 'smarty/trans.tpl');
?>
