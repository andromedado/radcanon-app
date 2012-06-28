<?php

class AuthNetCim extends AuthNet {
	public $id = 0;
	/** @var AuthNetXMLRequest $AuthNetXMLRequest */
	protected $AuthNetXMLRequest = NULL;
	
	public function __construct ($id = NULL) {
		$this->id = $id;
	}
	
	/**
	 * @param String $login_id
	 * @param String $transaction_key
	 * @return AuthNetXMLRequest
	 */
	public function getAuthNetXMLRequest ($login_id = NULL, $transaction_key = NULL) {
		if (!is_null($login_id) || is_null($this->AuthNetXMLRequest)) {
			$this->AuthNetXMLRequest = new AuthNetXMLRequest($login_id, $transaction_key);
		}
		return $this->AuthNetXMLRequest;
	}
	
	public function isValid() {
		return $this->id > 0;
	}
	
	protected function genPublicError ($code) {
		switch ($code) {
			case "E00039":
				$msg = 'Information Submitted is a duplicate of an existing record';
			break;
			case "E00003":
			case "E00013":
			case "E00015":
			case "E00016":
				$msg = "Invalid Information Provided [{$code}]";
			break;
			case "E00041":
			case "E00014":
				$msg = 'Required Field Missing';
			break;
			case "E00001":
			default:
				$msg = "The system has experienced a problem [{$code}]. Please Try Again Later";
		}
		return $msg;
	}
	
}

?>