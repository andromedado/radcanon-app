<?php

class AuthNetCimPayProfile extends AuthNetCim {
	
	public function createPayProfile (array $raw) {
		$reqsAndMaxLength = array(
			'customerProfileId' => NULL,
			'firstName' => 50,
			'lastName' => 50,
			'address' => 60,
			'zip' => 20,
			'cardNumber' => 16,
			'expirationDate' => 7,
			'cardCode' => 4,
		);
		foreach ($reqsAndMaxLength as $field => $maxLength) {
			if (!isset($raw[$field])) {
				throw new ExceptionAuthNet('Missing Field');
			} elseif (!is_null($maxLength) && strlen($raw[$field]) > $maxLength) {
				$raw[$field] = substr($raw[$field], 0, $maxLength);
			}
		}
		$data = $raw;
		
		$PayProfileInfo = array(
			'customerProfileId' => $data['customerProfileId'],
			'paymentProfile' => array(
				'customerType' => isset($data['customerType']) ? $data['customerType'] : 'individual',
				'billTo' => array(
					'firstName' => $data['firstName'],
					'lastName' => $data['lastName'],
					'address' => $data['address'],
					'zip' => $data['zip'],
					'country' => isset($data['country']) ? $data['country'] : 'usa',
				),
				'payment' => array(
					'creditCard' => array(
						'cardNumber' => $data['cardNumber'],
						'expirationDate' => $data['expirationDate'],
						'cardCode' => $data['cardCode'],
					),
				),
			),
			'validationMode' => DEBUG ? 'testMode' : 'liveMode',
		);
		
		$R = $this->getAuthNetXMLRequest()->getAuthNetXMLResponse('createCustomerPaymentProfileRequest', $PayProfileInfo);
		if (!$R->isGood) throw new ExceptionAuthNet($this->genPublicError($R->code));
		$ccn = substr($PayProfileInfo['paymentProfile']['payment']['creditCard']['cardNumber'], -4);
		return strval($R->XML->customerPaymentProfileId);
	}
	
}

?>