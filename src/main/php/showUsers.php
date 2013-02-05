<?php
require_once('bootstrap.php');
require_once('geoip.php');

if(!$admin) exit();

$users = new Users();
$userlist = $users->getUsers();

foreach($userlist as $user) {
	?>
		<a href="http://workingtitle365.com/maker/<?php
		echo $user['username'];
	?>"><?php
		echo $user['username'];
	?></a>&nbsp;&nbsp;&nbsp;<em><?php echo $user['mail'] ?></em><br /><?php
}
		echo count($users);
?>
	in db.

