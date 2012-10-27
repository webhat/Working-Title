<?php

require_once('bootstrap.php');

$user = "";
$pass = "";

$fail = "Login failed";
$success = "Login successful";

if(array_key_exists( 'user', $_POST))
	$user = (string) $_POST['user'];
if(array_key_exists( 'pass', $_POST))
	$pass = (string) $_POST['pass'];

if( $user == "" || $pass == "") {
	print $fail;
	exit();
}

$ul = new UserLogin($user);
#$ul->setPassword('redhat');
#$ul->store();
if( $ul->passwordCheck( $pass)) {
	setcookie("user", $user, time()+2592000);
	setcookie("hash", $ul->generateCookie(), time()+3600);

	print $success;
} else {
	print $fail;
	exit();
}

?>
<script>
	top.location = "/profile.php?id=<?php print $user; ?>";
</script>
