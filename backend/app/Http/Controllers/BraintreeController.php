<?php

namespace App\Http\Controllers;


use App\Models\Entry;

use App\Providers\BraintreeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class BraintreeController extends Controller {
	protected $braintreeService;

	public function __construct( BraintreeService $braintreeService ) {
		$this->braintreeService = $braintreeService;
	}

	public function getClientToken() {
		$token = $this->braintreeService->getClientToken();
		return response()->json( [ 'clientToken' => $token ] );
	}

	public function checkout( Request $request ) {
		$validator = Validator::make( $request->all(), [ 
			'paymentMethodNonce' => 'required',
			'amount' => 'required', 'numeric'
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$result = $this->braintreeService->createTransaction( $request->paymentMethodNonce, $request->amount );

		if ( $result->success ) {

			return response()->json( [ 'success' => true, 'transactionId' => $result->transaction->id ] );
		} else {
			return response()->json( [ 'error' => $result->message ], 500 );
		}
	}

	public function checkoutEntry( Request $request ) {

		$validator = Validator::make( $request->all(), [ 
			'entryID' => [ 'numeric', 'required', Rule::exists( 'entries', 'id' ) ],
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$entry = Entry::find( $request->entryID );

		if ( $entry ) {

			$args = [];
			$args['payment_status'] = 'paid';

			$entry->update( $args );

			return response()->json( [ 
				'status' => 200,
				'message' => 'Entry updated',
				'data' => $entry
			], 200 );

		}
	}
}
