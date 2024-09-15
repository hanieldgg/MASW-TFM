<?php

namespace App\Http\Controllers\api;

use App\Models\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller {

	public function index() {
		$entries = Entry::all();

		if ( $entries->count() > 0 ) {
			$data = [ 
				'status' => 200,
				'data' => $entries
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No entries found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function create( Request $request ) {

		$validator = Validator::make( $request->all(), [ 
			'title' => [ 'required', 'string', 'max:30' ],
			'entry_category' => [ 'required', 'numeric', Rule::exists( 'entry_categories', 'id' ) ],
			'description' => [ 'string', 'max:255' ],
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$args = [ 
			'title' => $request->title,
			'entry_category_id' => $request->entry_category,
		];

		if ( $request->has( 'description' ) ) {
			$args['description'] = trim( $request->description );
		}

		/**
		 * TODO: Connect user_id
		 */
		$args['user_id'] = 1;
		$args['payment_status'] = "unpaid";
		$args['judgement_status'] = "to_be";
		$args['score'] = 0;
		$args['winner_status'] = "none";

		$entry = Entry::create( $args );

		if ( $entry ) {
			return response()->json( [ 
				'status' => 200,
				'message' => 'Entry successfully created',
				'data' => $entry
			], 200 );
		} else {
			return response()->json( [ 
				'status' => 500,
				'error' => 'Something went wrong'
			], 500 );
		}
	}

	public function find( $id ) {
		$entry = Entry::find( $id );

		if ( $entry ) {
			$data = [ 
				'status' => 200,
				'data' => $entry
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No entry found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function update( Request $request, $id ) {

		$validator = Validator::make( $request->all(), [ 
			'entry_category' => [ 'numeric', Rule::exists( 'entry_categories', 'id' ) ],
			'description' => [ 'string', 'max:255' ],
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		} else {

			$entry = Entry::find( $id );

			if ( $entry ) {

				$args = [];

				if ( $request->has( 'entry_category' ) ) {
					$args['entry_category'] = trim( $request->entry_category );
				}

				if ( $request->has( 'description' ) ) {
					$args['description'] = trim( $request->description );
				}

				if ( empty( $args ) ) {
					return response()->json( [ 
						'status' => 400,
						'error' => 'No parameters provided',
					], 400 );
				}

				$entry->update( $args );

				return response()->json( [ 
					'status' => 200,
					'message' => 'Entry updated',
					'data' => $entry
				], 200 );
			} else {
				return response()->json( [ 
					'status' => 404,
					'error' => 'Entry not found',
				], 404 );
			}
		}
	}

	public function delete( $id ) {

		$entry = Entry::find( $id );

		if ( $entry ) {
			$entry->destroy( $id );

			$data = [ 
				'status' => 200,
				'message' => "Entry deleted successfully",
			];
			return response()->json( $data, 200 );
		} else {

			$data = [ 
				'status' => 404,
				'message' => 'No entry found'
			];
			return response()->json( $data, 404 );
		}
	}

}
