<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Content-type: text/html");

require_once('bootstrap.php');
require_once('onetime.php');

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
	$user = $ul->getUser();

	$ul->setProperty( "lastlogin", time());
	$ul->store();

	$ul = new UserLogin($user);
	$ul->reset();
	setcookie("user", $user, time()+5184000);
	setcookie("hash", $ul->generateCookie(), time()+2592000);

	error_log("SUCCESS");
	print $success;
} else {
	error_log("FAIL");
	print $fail;
	exit();
}


?>
<script>
	top.location = "/profile.php?id=<?php print $user; ?>";
</script>
