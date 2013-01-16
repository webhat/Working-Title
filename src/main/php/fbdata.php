<?php

require_once('loggedinas.php');

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$user = (string) $loggedinas;

$json->code = md5($_POST['json'] . $user);

$fbdata = new FaceBookData();
if($user == "") {
	$user = $fbdata->logmein( $json);
	if($user != "") {
		$ul = new UserLogin($user);
		$ul->reset();

		setcookie("user", $user, time()+5184000);
		setcookie("hash", $ul->generateCookie(), time()+2592000);
?>
<script>
		top.location = "/maker/<?php print $user; ?>";
</script>
<?php
	} else {
		$fbdata->add( $json, $user);
?>
<script>
	var create = "/create.php";
	console.log(top.location.pathname);
	if(top.location.pathname != create)
		top.location = create;
</script>
<?php
	}

} else {
	$fbdata->add( $json, $user);
}
?>
