<?php

class AnalyticsTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	/**
	 * @dataProvider gaProvider
	 */
	public function testUpdateAnalytics($ga) {
		$analytics = new Analytics();
		$analytics->updateAnalytics($ga);

	}

	/**
	 * @dataProvider gaProvider
	 * @depends testUpdateAnalytics
	 */
	public function testGetAnalytics($ga) {
		$analytics = new Analytics();
		$analytics->updateAnalytics($ga);
		$actual = $analytics->getAnalytics( $ga['query']['start-date']);

		$this->assertEquals( $ga, $actual);
	}

	/**
	 * @dataProvider gaProvider
	 * @depends testUpdateAnalytics
	 */
	public function testGetAnalyticsFor($ga) {
		$analytics = new Analytics();
		$analytics->updateAnalytics($ga);
		$actual = $analytics->getAnalyticsFor( $ga['query']['start-date'], "Sumadi");

		$this->assertEquals( $ga, $actual);
	}

	public function gaprovider() {
	$ga1 = array (
	'kind' => 'analytics#gadata',
	'id' => 'https://www.googleapis.com/analytics/v3/data/ga?ids=ga:63616928&dimensions=ga:pagepath&metrics=ga:newvisits,ga:visits&filters=ga:pagepath%3d~%5e/maker&start-date=2013-01-01&end-date=2013-01-08&max-results=500',
	'query' => 
	array (
	'start-date' => '2013-01-01',
	'end-date' => '2013-01-01',
	'ids' => 'ga:63616928',
	'dimensions' => 'ga:pagepath',
	'metrics' => 
	array (
	0 => 'ga:newvisits',
	1 => 'ga:visits',
	),
	'filters' => 'ga:pagepath=~^/maker',
	'start-index' => 1,
	'max-results' => 500,
	),
	'itemsperpage' => 500,
	'totalresults' => 25,
	'selflink' => 'https://www.googleapis.com/analytics/v3/data/ga?ids=ga:63616928&dimensions=ga:pagepath&metrics=ga:newvisits,ga:visits&filters=ga:pagepath%3d~%5e/maker&start-date=2013-01-01&end-date=2013-01-08&max-results=500',
	'profileinfo' => 
	array (
	'profileid' => '63616928',
	'accountid' => '34506988',
	'webpropertyid' => 'ua-34506988-1',
	'internalwebpropertyid' => '62071089',
	'profilename' => 'working title 365',
	'tableid' => 'ga:63616928',
	),
	'containssampleddata' => false,
	'columnheaders' => 
	array (
	0 => 
	array (
	'name' => 'ga:pagepath',
	'columntype' => 'dimension',
	'datatype' => 'string',
	),
	1 => 
	array (
	'name' => 'ga:newvisits',
	'columntype' => 'metric',
	'datatype' => 'integer',
	),
	2 => 
	array (
	'name' => 'ga:visits',
	'columntype' => 'metric',
	'datatype' => 'integer',
	),
	),
	'totalsforallresults' => 
	array (
	'ga:newvisits' => '11',
	'ga:visits' => '30',
	),
	'rows' => 
	array (
	0 => 
	array (
	0 => '/maker/48073',
	1 => '0',
	2 => '1',
	),
	1 => 
	array (
	0 => '/maker/claudia van rooij',
	1 => '0',
	2 => '1',
	),
	2 => 
	array (
	0 => '/maker/debusscher',
	1 => '0',
	2 => '0',
	),
	3 => 
	array (
	0 => '/maker/hazelaar',
	1 => '0',
	2 => '0',
	),
	4 => 
	array (
	0 => '/maker/maartenvds',
	1 => '0',
	2 => '0',
	),
	5 => 
	array (
	0 => '/maker/norbertwille',
	1 => '0',
	2 => '2',
	),
	6 => 
	array (
	0 => '/maker/peter beentjes',
	1 => '0',
	2 => '0',
	),
	7 => 
	array (
	0 => '/maker/petrowitsch',
	1 => '0',
	2 => '0',
	),
	8 => 
	array (
	0 => '/maker/roos blufpand',
	1 => '1',
	2 => '4',
	),
	9 => 
	array (
	0 => '/maker/sumadi',
	1 => '3',
	2 => '7',
	),
	10 => 
	array (
	0 => '/maker/wilma van de hel',
	1 => '0',
	2 => '0',
	),
	11 => 
	array (
	0 => '/maker/dwichers',
	1 => '0',
	2 => '0',
	),
	12 => 
	array (
	0 => '/maker/frankruiter',
	1 => '1',
	2 => '1',
	),
	13 => 
	array (
	0 => '/maker/jcvanderhart',
	1 => '0',
	2 => '2',
	),
	14 => 
	array (
	0 => '/maker/kama24',
	1 => '0',
	2 => '1',
	),
	15 => 
	array (
	0 => '/maker/kama29',
	1 => '1',
	2 => '1',
	),
	16 => 
	array (
	0 => '/maker/kmaarek',
	1 => '1',
	2 => '2',
	),
	17 => 
	array (
	0 => '/maker/login.php',
	1 => '1',
	2 => '2',
	),
	18 => 
	array (
	0 => '/maker/markmoore',
	1 => '1',
	2 => '1',
	),
	19 => 
	array (
	0 => '/maker/nemhja',
	1 => '1',
	2 => '1',
	),
	20 => 
	array (
	0 => '/maker/petragroen',
	1 => '0',
	2 => '0',
	),
	21 => 
	array (
	0 => '/maker/redhat',
	1 => '0',
	2 => '1',
	),
	22 => 
	array (
	0 => '/maker/tenarvkn',
	1 => '0',
	2 => '1',
	),
	23 => 
	array (
	0 => '/maker/wimheesakkers',
	1 => '0',
	2 => '1',
	),
	24 => 
	array (
	0 => '/maker/zanne',
	1 => '1',
	2 => '1',
	),
	)
);

		$ga2 = $ga1;
		$ga2['query']['start-date'] = '2013-01-02';
		$ga2['query']['end-date'] = '2013-01-02';

		return array(
				array( $ga1),
				array( $ga2)
		);

	}
}
?>
