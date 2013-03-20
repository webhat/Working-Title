<?php

require_once('../bootstrap.php');

$c = new WTConfig();

Stripe::setApiKey($config->stripe['secret']);

$token  = (string)$_POST['stripeToken'];
$mail  = (string)$_POST['mail'];
$amount  = (int)$_POST['amount'];

$customer = Stripe_Customer::create(array(
				'email' => $mail,
				'card'  => $token
			));

$charge = Stripe_Charge::create(array(
				'customer' => $customer->id,
				'amount'   => ($amount*100),
				'currency' => 'eur'
			));

echo '<h1>Successfully charged $50.00!</h1>';

?>
