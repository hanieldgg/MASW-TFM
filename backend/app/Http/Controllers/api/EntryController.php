<?php

namespace App\Http\Controllers\api;

use App\Models\Entry;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

		$user = Auth::user();

		if ( $user ) {

			$entries = $request->entries;

			if ( $entries ) {

				$created_entries = [];

				foreach ( $entries as $entry ) {


					$validator = Validator::make( $entry, [ 
						'title' => [ 'required', 'string', 'max:30' ],
						'entry_category' => [ 'required', 'numeric', Rule::exists( 'entry_categories', 'id' ) ],
						'description' => [ 'nullable', 'string', 'max:255' ],
					] );

					if ( $validator->fails() ) {
						return response()->json( [ 
							'status' => 422,
							'error' => $validator->messages()
						], 422 );
					}

					$args = [ 
						'title' => $entry['title'],
						'entry_category_id' => $entry['entry_category'],
					];

					if ( isset( $entry['description'] ) ) {
						$args['description'] = trim( $entry['description'] );
					}


					$args['user_id'] = $user->id;
					$args['payment_status'] = "unpaid";
					$args['judgement_status'] = "to_be";
					$args['score'] = 0;
					$args['winner_status'] = "none";

					$entry = Entry::create( $args );

					if ( $entry ) {
						$created_entries[] = $entry;
					}
				}

				if ( $created_entries && sizeof( $created_entries ) > 0 ) {

					return response()->json( [ 
						'status' => 200,
						'message' => 'Entry successfully created',
						'data' => $created_entries
					], 200 );

				} else {
					return response()->json( [ 
						'status' => 500,
						'error' => 'Something went wrong'
					], 500 );
				}

			} else {
				return response()->json( [ 
					'status' => 400,
					'error' => 'Bad Request'
				], 422 );
			}
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

		$user = Auth::user();

		if ( $user ) {

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
		} else {
			$data = [ 
				'status' => 401,
				'message' => 'Unauthorized'
			];
			return response()->json( $data, 401 );
		}


	}

	public function delete( $id ) {

		$user = Auth::user();

		if ( $user ) {

			$entry = Entry::find( $id );

			if ( $entry->user_id == $user->id ) {

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
			} else {
				$data = [ 
					'status' => 401,
					'message' => 'User unauthorized to delete entry'
				];
				return response()->json( $data, 401 );
			}

		} else {
			$data = [ 
				'status' => 401,
				'message' => 'Unauthorized'
			];
			return response()->json( $data, 401 );
		}

	}

	public function indexByUser( Request $request ) {

		$user = Auth::user();

		if ( $user ) {

			$entries = Entry::where( 'user_id', $user->id )->get();

			if ( $entries->count() > 0 ) {

				$entries = $entries->toArray();
				$entries_dates = array_column( $entries, 'created_at' );

				$entries_response = array();

				foreach ( $entries_dates as $dateKey => $date ) {

					$time = strtotime( $date );
					$year = date( "Y", $time );

					if ( ! array_key_exists( $year, $entries_response ) ) {
						$entries_response[ $year ] = array(
							'winner' => array(),
							'judged' => array(),
							'paid' => array(),
							'unpaid' => array(),
						);
					}
				}

				foreach ( $entries as $entryKey => $entry ) {

					$entry_year = date( "Y", strtotime( $entry['created_at'] ) );
					$winner_status = $entry['winner_status'];
					$judgement_status = $entry['judgement_status'];
					$payment_status = $entry['payment_status'];

					if (
						$payment_status == 'paid' &&
						$judgement_status == 'judged' &&
						$winner_status != 'none'
					) {
						array_push( $entries_response[ $entry_year ]['winner'], $entry );
					}

					if (
						$payment_status == 'paid' &&
						$judgement_status == 'judged' &&
						$winner_status == 'none'
					) {
						array_push( $entries_response[ $entry_year ]['judged'], $entry );
					}

					if (
						$payment_status == 'paid' &&
						$judgement_status == 'to_be' &&
						$winner_status == 'none'
					) {
						array_push( $entries_response[ $entry_year ]['paid'], $entry );
					}

					if (
						$payment_status == 'unpaid'
					) {
						array_push( $entries_response[ $entry_year ]['unpaid'], $entry );
					}

				}

				$data = [ 
					'status' => 200,
					'data' => $entries_response
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

	}

	public function indexUnpaidEntries() {

		$user = Auth::user();

		if ( $user ) {

			$entries = Entry::where( 'user_id', $user->id )->where( 'payment_status', 'unpaid' )->get();

			$data = [ 
				'status' => 200,
				'data' => $entries
			];

			return response()->json( $data, 200 );
		}


	}

}
