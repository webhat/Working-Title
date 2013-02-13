<?php

setcookie("user", "", time()-5184000, "/", $domain);
setcookie("hash", "", time()-5184000, "/", $domain);

header("Location: /");
?>
