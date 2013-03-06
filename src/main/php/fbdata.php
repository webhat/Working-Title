<?php

require_once('loggedinas.php');

preg_match('/[^.]+\.[^.]+$/', $_SERVER['HTTP_HOST'], $matches);
$domain = ".". $matches[0];

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

	if(!setcookie("user", $user, time()+5184000, "/", $domain))
		echo "YYY";
	if(!setcookie("hash", $ul->generateCookie(), time()+2592000, "/", $domain))
		echo "ZZZ";
echo "XXX". (time()+5184000) . "-". time() ."-". $domain;
?>
<script>
	//	top.location = "/maker/<?php print $user; ?>";
location.reload();
</script>
<?php
	} else {
		$fbdata->add( $json, $user);
?>
<script>
location.reload();
</script>
<?php
	}

} else {
	$fbdata->add( $json, $user);
}
?>
