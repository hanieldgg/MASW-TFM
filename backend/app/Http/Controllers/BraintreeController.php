<?php

namespace App\Http\Controllers;


use App\Models\Entry;
use App\Models\Order;

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
			'amount' => 'required', 'numeric',
			'entries' => 'required'
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$result = $this->braintreeService->createTransaction( $request->paymentMethodNonce, $request->amount );

		if ( $result->success ) {

			$this->checkoutEntries( $request->amount, $result->transaction->id, $request->entries );

			return response()->json( [ 'success' => true, 'transactionId' => $result->transaction->id ] );
		} else {
			return response()->json( [ 'error' => $result->message ], 500 );
		}
	}

	public function checkoutEntries( $total, $braintree_id, $entries ) {

		$args = array(
			'user_id' => 1,
			'total' => $total,
			'payment_type' => 'Credit Card',
			'braintree_transaction_id' => $braintree_id,
		);

		$order = Order::create( $args );

		foreach ( $entries as $entry_in ) {

			$entry = Entry::find( $entry_in['id'] );

			if ( $entry ) {

				$args = [];
				$args['payment_status'] = 'paid';
				$args['order_id'] = $order->id;

				$entry->update( $args );
			}
		}

	}
}
