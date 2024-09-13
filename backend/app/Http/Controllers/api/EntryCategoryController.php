<?php

namespace App\Http\Controllers\api;

use App\Models\EntryCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class EntryCategoryController extends Controller {

	public function index() {
		$entryCategories = EntryCategory::all();

		if ( $entryCategories->count() > 0 ) {
			$data = [ 
				'status' => 200,
				'data' => $entryCategories
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No entry categories found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function create( Request $request ) {

		$validator = Validator::make( $request->all(), [ 
			'title' => [ 'required', 'string', 'max:30', Rule::unique( 'entry_categories' ) ],
			'price' => [ 'required', 'numeric', 'min:0' ],
			'parent_id' => [ 'nullable', 'numeric', Rule::exists( 'entry_categories', 'id' ) ]
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$entryCategory = EntryCategory::create( [ 
			'title' => $request->title,
			'price' => $request->price,
			'parent_id' => $request->parent_id,
		] );

		if ( $entryCategory ) {
			return response()->json( [ 
				'status' => 200,
				'message' => 'Entry category successfully created',
				'data' => $entryCategory
			], 200 );
		} else {
			return response()->json( [ 
				'status' => 500,
				'error' => 'Something went wrong'
			], 500 );
		}
	}

	public function find( $id ) {
		$entryCategory = EntryCategory::find( $id );

		if ( $entryCategory ) {
			$data = [ 
				'status' => 200,
				'data' => $entryCategory
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No entry category found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function update( Request $request, $id ) {
		$validator = Validator::make( $request->all(), [ 
			'title' => [ 'string', 'max:30', Rule::unique( 'entry_categories' )->ignore( $id ) ],
			'price' => [ 'numeric', 'min:0' ],
			'parent_id' => [ 'nullable', 'numeric', Rule::exists( 'entry_categories', 'id' ) ]
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		} else {

			$entryCategory = EntryCategory::find( $id );

			if ( $entryCategory ) {

				$args = [];

				if ( $request->has( 'title' ) ) {
					$args['title'] = trim( $request->title );
				}

				if ( $request->has( 'price' ) ) {
					$args['price'] = $request->price;
				}

				if ( $request->has( 'parent_id' ) ) {
					$args['parent_id'] = $request->parent_id;
				}

				if ( empty( $args ) ) {
					return response()->json( [ 
						'status' => 400,
						'error' => 'No parameters provided',
					], 400 );
				}

				$entryCategory->update( $args );

				return response()->json( [ 
					'status' => 200,
					'message' => 'Entry category updated',
					'data' => $entryCategory
				], 200 );
			} else {
				return response()->json( [ 
					'status' => 404,
					'error' => 'Entry category not found',
				], 404 );
			}
		}
	}

	public function delete( $id ) {

		$referenced = EntryCategory::where( 'parent_id', $id )->exists();

		if ( $referenced ) {
			return response()->json( [ 
				'status' => 400,
				'message' => 'Cannot delete entry category because it is referenced by other records.',
			], 400 );
		}

		$entryCategory = EntryCategory::find( $id );

		if ( $entryCategory ) {
			$entryCategory->destroy( $id );

			$data = [ 
				'status' => 200,
				'message' => "Entry category deleted successfully",
			];
			return response()->json( $data, 200 );
		} else {

			$data = [ 
				'status' => 404,
				'message' => 'No entry category found'
			];
			return response()->json( $data, 404 );
		}
	}

}
