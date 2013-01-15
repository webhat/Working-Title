<?php

class PaymentsTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}


	public function testStub() {
		$this->markTestIncomplete( 'This test has not been implemented yet.');
	}

	/**
	 * @dataProvider paymentProvider
	*/
	public function testAddPaymentPayPal($pay) {
		$payment = new Payment();

		$payment->updatePayPal($pay);
		$actual = $payment->getPayPal($pay['custom']);

		unset($actual['_id']);

		$this->assertEquals($pay, $actual);
	}

	public function paymentProvider() {
		return array(
			array (
				array (
					'txn_type' => 'subscr_signup',
					'subscr_id' => 'I-R2UBNKGU8P27',
					'last_name' => 'Crompton',
					'residence_country' => 'US',
					'mc_currency' => 'EUR',
					'item_name' => 'Subscription to Maker: redhat',
					'business' => 'wt365_1357659463_biz@gmail.com',
					'recurring' => '1',
					'verify_sign' => 'AdL0infwGhlcRva2Q4y6.Z6hzJQJA763gzbfuLHVsefxPx4r4r-gJV8v',
					'payer_status' => 'verified',
					'test_ipn' => '1',
					'payer_email' => 'daniel_1340367123_per@gmail.com',
					'first_name' => 'Dani?l',
					'receiver_email' => 'wt365_1357659463_biz@gmail.com',
					'payer_id' => 'SYFVEB7AUW3S2',
					'reattempt' => '1',
					'subscr_date' => '08:13:30 Jan 08, 2013 PST',
					'custom' => '2ce741d1f0b634014693c3a04f6e554a',
					'charset' => 'windows-1252',
					'notify_version' => '3.7',
					'period3' => '1 Y',
					'mc_amount3' => '10.00',
					'ipn_track_id' => 'cf0a8e22c66ad'
				)
			),
			array (
				array (
					'txn_type' => 'subscr_signup',
					'subscr_id' => 'I-R2UBNKGU8P27',
					'last_name' => 'Crompton',
					'residence_country' => 'US',
					'mc_currency' => 'EUR',
					'item_name' => 'Subscription to Maker: redhat',
					'business' => 'wt365_1357659463_biz@gmail.com',
					'recurring' => '1',
					'verify_sign' => 'AdL0infwGhlcRva2Q4y6.Z6hzJQJA763gzbfuLHVsefxPx4r4r-gJV8v',
					'payer_status' => 'verified',
					'test_ipn' => '1',
					'payer_email' => 'daniel_1340367123_per@gmail.com',
					'first_name' => 'Dani?l',
					'receiver_email' => 'wt365_1357659463_biz@gmail.com',
					'payer_id' => 'SYFVEB7AUW3S2',
					'reattempt' => '1',
					'subscr_date' => '08:13:30 Jan 08, 2013 PST',
					'custom' => '2ce741d1f0b634014693c3a04f6e565a',
					'charset' => 'windows-1252',
					'notify_version' => '3.7',
					'period3' => '1 Y',
					'mc_amount3' => '11.00',
					'ipn_track_id' => 'cf0a8e22c67ad'
				)
			)
		);
	}

}
 
?>
