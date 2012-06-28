<?php

class AuthNet {
	const REQUEST_URL = "https://api.authorize.net/xml/v1/request.api";
	protected static $default_login_id = NULL;
	protected static $default_transaction_key = NULL;
	protected $login_id = NULL;
	protected $transaction_key = NULL;
	
	/**
	 * Set the Default Authorization Info for all subclasses
	 */
	public static function setAuthorizationInfo ($login_id, $transaction_key) {
		self::$default_login_id = $login_id;
		self::$default_transaction_key = $transaction_key;
	}
	
	public function overrideAuthorizationInfo ($login_id = NULL, $transaction_key = NULL) {
		$this->login_id = $login_id;
		$this->transaction_key = $transaction_key;
	}
	
}

?>