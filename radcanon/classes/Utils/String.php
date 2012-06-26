<?php
defined('PaZsCA8p') or exit;

abstract class UtilsString {
	const IMAGE_FILENAME_REGEXP = '/\.(gif|jpg|jpeg|png)$/i';
	const EMAIL_REGEXP = '/[A-Z]+[A-Z\d_\.]*@[^\.]+\.[^\.]+/i';
	const DOMAIN_REGEXP = '/[A-Z\d-]+\.[A-Z]{2,}/i';
	
	public static function isDomain ($str = '') {
		return preg_match(self::DOMAIN_REGEXP, $str);
	}
	
	public static function isEmail ($str = '') {
		return preg_match(self::EMAIL_REGEXP, $str);
	}
	
	public static function urlSafe($str, $allowPeriods = false, $repWith = '-'){
		return preg_replace('/[^A-Z\d' . ($allowPeriods ? '\.' : '') . '_-]+/i', $repWith, $str);
	}

}

?>