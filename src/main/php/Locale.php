<?php

class Locale {

	public static $default = array( "locale"	=> "en_US", "lang"		=> "en", "name"		=> "English");

	public function __construct() {
	}

	public static function language($lang = 'en') {
		switch($lang) {
			case 'nl':
				return "Nederlands";
			default:
				return "English";
		}
	}

	public static function stripLanguageFromLocale($locale) {
		return preg_replace("/_.*/","",$locale);
	}

	public static function detectLanguage($ip = "127.0.0.1", $accept, $lang = "en") {
		$locale = array();

		foreach (explode(',', $accept) as $lang) {
			$pattern = '/^.*(?P<primarytag>[a-zA-Z]{2,8})'.
			'(?:-(?P<subtag>[a-zA-Z]{2,8}))?(?:(?:;q=)'.
			'(?P<quantifier>\d\.\d))?$/U';

			$splits = array();


			//printf("Lang:,,%s\n", $lang);
			if (preg_match($pattern, $lang, $splits)) {
			//	print_r($splits);

				$i = isset($splits['quantifier'])?$splits['quantifier']:"1.0";

				$locale[$i]['lang'] = $splits['primarytag'];
				if(isset($splits['subtag']))
					$locale[$i]['locale'] = $splits['primarytag'] . strtoupper("_". $splits['subtag']);
				else
					$locale[$i]['locale'] = $splits['primarytag'];
				$locale[$i]['name'] = static::language($splits['primarytag']);
			} else {
				$locale["1.0"] = self::$default;
			}
		}
		return self::whichLocale($locale);
	}

	private static function whichLocale($locale) {
		foreach( $locale as $local ) {
			switch( $local['lang']) {
				case 'nl':
				case 'en':
					return $local;
				default:
			}
		}
		return self::$default;
	}
}
?>
