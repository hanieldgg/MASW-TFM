<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use App\Models\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {
	public function getUserOrders( Request $request ) {

		$validator = Validator::make( $request->all(), [ 
			'userID' => [ 'required', 'numeric', Rule::exists( 'users', 'id' ) ]
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$orders_response = array();

		$orders = Order::where( 'user_id', $request->userID )->get();

		foreach ( $orders as $order ) {
			$entries = Entry::where( 'order_id', $order->id )->get();

			$order['entries'] = $entries;

			array_push( $orders_response, $order );
		}

		$data = [ 
			'status' => 200,
			'data' => $orders
		];

		return response()->json( $data, 200 );
	}
}
