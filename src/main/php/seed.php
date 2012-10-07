<?php

require('bootstrap.php');

$maker = 'redhat';

$p = new MakerProfile( $maker);

$p->setProperty('profile',"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus scelerisque porta nulla, sed sagittis lacus viverra eu. Nulla at sem purus, id ornare nisi. Nunc vel risus in orci venenatis viverra. In vitae sem felis, at venenatis libero. Mauris a dolor erat, quis blandit erat. Suspendisse lectus ante, luctus mattis adipiscing quis, accumsan non metus. Nulla facilisi.");
$p->setProperty('whoami',"Who am I...");
$p->setProperty('whatdoido',"What do I do");
$p->setProperty('whydoidothis',"Why do I do it");

$p->store();

print var_export($p, true);

?>
