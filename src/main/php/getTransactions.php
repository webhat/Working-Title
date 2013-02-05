<?php

require_once("bootstrap.php");
require_once('geoip.php');

if(!$admin) exit();


$p = new Payment();

//  	"price" : "54.75", 	"incentive" : "1dc8ce154b9bd58a82a0acbe106409b8", 	"maker" : "Roos Blufpand", 	"amount" : "54.75", 	"code" : "1861804e5e4a090ddf95c02347795e8b", 	"pending" : true }

foreach( $p->getTransactions() as $t) {
	echo "Maker: <a href='http://workingtitle365.com/maker/". $t["maker"] ."'>". $t["maker"] ."</a> Code:". $t["code"] ." Price: ". $t["price"] ." <a href='http://workingtitle365.com/payments.php?inc=". $t['incentive'] ."&id=". $t['maker'] ."'>reward</a>" ;
	echo "<br />";
}

?>
