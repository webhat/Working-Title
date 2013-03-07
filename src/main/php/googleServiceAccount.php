<?php
/*
 * Copyright 2012 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once("bootstrap.php");

$c = new WTConfig();

require_once '../../../ext/php/google-api-php-client/src/Google_Client.php';
require_once '../../../ext/php/google-api-php-client/src/contrib/Google_AnalyticsService.php';


// Set your client id, service account name, and the path to your private key.
// For more information about obtaining these keys, visit:
// https://developers.google.com/console/help/#service_accounts
define( 'CLIENT_ID', $c->google['client']);
define( 'SERVICE_ACCOUNT_NAME', $c->google['account']);

// Make sure you keep your key.p12 file in a secure location, and isn't
// readable by others.
define( 'KEY_FILE', "../../../ext/keys/". $c->google['public'] ."-privatekey.p12");

$client = new Google_Client();
$client->setApplicationName("Google Analytics Sample");

// Set your cached access token. Remember to replace $_SESSION with a
// real database or memcached.
session_start();
if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

// Load the key in PKCS 12 format (you need to download this from the
// Google API Console when the service account was created.
$key = file_get_contents(KEY_FILE);
$client->setAssertionCredentials(new Google_AssertionCredentials(
    SERVICE_ACCOUNT_NAME,
    array(
			'https://www.googleapis.com/auth/analytics.readonly'
			),
    $key)
);

$client->setClientId(CLIENT_ID);
$service = new Google_AnalyticsService($client);

/*

https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A63616928&dimensions=ga%3ApagePath&metrics=ga%3AnewVisits%2Cga%3Avisits&segment=gaid%3A%3A-1&filters=ga%3ApagePath%3D~%5E%2Fmaker&start-date=2013-01-08&end-date=2013-01-08&max-results=500
	 */

$profileId = "63616928";

$date = date( "Y-m-d", time());

$gadata = $service->data_ga->get(
				'ga:' . $profileId,
								$date,
								$date,
								'ga:visits',
								array(
									'dimensions' => 'ga:pagePath',
									'metrics' => 'ga:newVisits,ga:visits',
									'filters' => 'ga:pagePath=~^/maker',
									'max-results' => '500'
									)
								);

var_export($gadata);

$ga = new Analytics();
$ga->updateAnalytics($gadata);

// We're not done yet. Remember to update the cached access token.
// Remember to replace $_SESSION with a real database or memcached.
if ($client->getAccessToken()) {
	$_SESSION['token'] = $client->getAccessToken();
}
