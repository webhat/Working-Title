<?php

setcookie("user", "", time()-5184000);
setcookie("hash", "", time()-5184000);

header("Location: /");
?>
