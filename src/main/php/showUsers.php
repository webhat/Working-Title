<?php
require_once('bootstrap.php');
require_once('geoip.php');
require_once('smartyload.php');

if(!$admin) exit();

$users = new Users();
$userlist = $users->getUsers();

$p = new Payment();

for($i = 0; $i < count($userlist); $i++) {
	$userlist[$i]['grav'] = md5(strtolower(trim($userlist[$i]['mail'])));
	$userlist[$i]['trans'] = $p->getPaymentsCount($userlist[$i]['username']);
}

$smarty->assign( 'U', $userlist);
$smarty->display( 'smarty/users.tpl');

/*
foreach($userlist as $user) {
		$grav = md5(strtolower(trim($user['mail'])));
	?>
		<a href="http://workingtitle365.com/maker/<?php
		echo $user['username'];
	?>">
		<img width="40" height="40" src="http://www.gravatar.com/avatar/<?= $grav ?>" />
		<?php
		echo $user['username'];
	?></a>&nbsp;&nbsp;&nbsp;<em><?php echo $user['mail'] ?></em><br /><?php
}
*/
		echo count($users);
?>
	in db.
