<?php

namespace App\Providers;

use Braintree\Gateway;

class BraintreeService {
	protected $gateway;

	public function __construct() {
		$this->gateway = new Gateway( [ 
			'environment' => env( 'BRAINREE_ENV' ),
			'merchantId' => env( 'BRAINREE_MERCHANT_ID' ),
			'publicKey' => env( 'BRAINREE_PUBLIC_KEY' ),
			'privateKey' => env( 'BRAINREE_PRIVATE_KEY' ),
		] );
	}

	public function getClientToken() {
		return $this->gateway->clientToken()->generate();
	}

	public function createTransaction( $nonce, $amount ) {
		return $this->gateway->transaction()->sale( [ 
			'amount' => $amount,
			'paymentMethodNonce' => $nonce,
			'options' => [ 'submitForSettlement' => true ],
		] );
	}
}