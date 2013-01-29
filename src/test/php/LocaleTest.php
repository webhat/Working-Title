<?php

class LocaleTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testLanguage() {
		$this->assertEquals('English', MyLocale::language());
	}

	/**
	 * @dataProvider provider
	 */
	public function testLanguages($locale, $lang, $name) {
		$this->assertEquals($name, MyLocale::language($lang));
	}

	/**
	 * @dataProvider IPProvider
	 */
	public function testDetectLanguage($ip, $accept, $name, $locale) {
		$l = MyLocale::detectLanguage($ip, $accept);
		$this->assertEquals($name, $l['lang']);
		$this->assertEquals($locale, $l['locale']);
	}

	/**
	 * @dataProvider provider
	 */
	public function testStripLanguageFromLocale($locale, $lang, $name) {
		$this->assertEquals($lang, MyLocale::stripLanguageFromLocale($locale));
	}

	public function provider() {
		return array(
				array( "", "", "English"),
				array( "en_US", "en", "English"),
				array( "nl_NL", "nl", "Nederlands"),
				array( "de_DE", "de", "English"),
				);
	}

	public function IPProvider() {
		return array(
				array( "127.0.0.1", "Accept-Language: da, en-gb;q=0.8, en;q=0.7", "en", "en_GB"),
				array( "24.132.20.10", "Accept-Language: nl, en-us;q=0.2, en;q=0.7", "nl", "nl"),
				array( "127.0.0.1", "Accept-Language: de, sv;q=0.8, nl-NL;q=0.7", "nl", "nl_NL"),
				array( "8.8.8.8", "Accept-Language: en-us, en;q=0.8", "en", "en_US"),
				array( "8.8.8.8", "Accept-Language: en-gb, en;q=0.8, en-us;q=0.2", "en", "en_GB"),
				array( "8.8.8.8", "en-GB, en;q=0.8,en-US;q=0.6,nl;q=0.4,de;q=0.2,hi;q=0.2", "en", "en_GB"),
				);
	}
}

?>
