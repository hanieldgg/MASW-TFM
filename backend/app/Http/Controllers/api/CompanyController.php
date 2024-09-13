<?php

namespace App\Http\Controllers\api;

use App\Models\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller {

	public function index() {
		$companies = Company::all();

		if ( $companies->count() > 0 ) {
			$data = [ 
				'status' => 200,
				'data' => $companies
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No companies found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function create( Request $request ) {

		$validator = Validator::make( $request->all(), [ 
			'name' => [ 'required', 'string', 'max:30', Rule::unique( 'companies' ) ],
			'address' => [ 'required', 'string', 'max:100' ],
			'logo_url' => [ 'nullable', 'string', 'max:255' ]
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$company = Company::create( [ 
			'name' => $request->name,
			'address' => $request->address,
			'logo_url' => $request->logo_url,
		] );

		if ( $company ) {
			return response()->json( [ 
				'status' => 200,
				'message' => 'Company successfully created',
				'data' => $company
			], 200 );
		} else {
			return response()->json( [ 
				'status' => 500,
				'error' => 'Something went wrong'
			], 500 );
		}
	}

	public function find( $id ) {
		$company = Company::find( $id );

		if ( $company ) {
			$data = [ 
				'status' => 200,
				'data' => $company
			];
			return response()->json( $data, 200 );
		} else {
			$data = [ 
				'status' => 404,
				'message' => 'No company found'
			];
			return response()->json( $data, 404 );
		}
	}

	public function update( Request $request, $id ) {
		$validator = Validator::make( $request->all(), [ 
			'name' => [ 'string', 'max:30', Rule::unique( 'companies' )->ignore( $id ) ],
			'address' => [ 'string', 'max:100' ],
			'logo_url' => [ 'string', 'max:255' ]
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		} else {

			$company = Company::find( $id );

			if ( $company ) {

				$args = [];

				if ( $request->has( 'name' ) ) {
					$args['name'] = trim( $request->name );
				}

				if ( $request->has( 'address' ) ) {
					$args['address'] = trim( $request->address );
				}

				if ( $request->has( 'logo_url' ) ) {
					$args['logo_url'] = trim( $request->logo_url );
				}

				if ( empty( $args ) ) {
					return response()->json( [ 
						'status' => 400,
						'error' => 'No parameters provided',
					], 400 );
				}

				$company->update( $args );

				return response()->json( [ 
					'status' => 200,
					'message' => 'Company updated',
					'data' => $company
				], 200 );
			} else {
				return response()->json( [ 
					'status' => 404,
					'error' => 'Company not found',
				], 404 );
			}
		}
	}

	public function delete( $id ) {

		/**
		 * TODO: Implement reference for users
		 */
		// $referenced = EntryCategory::where( 'parent_id', $id )->exists();

		// if ( $referenced ) {
		// 	return response()->json( [ 
		// 		'status' => 400,
		// 		'message' => 'Cannot delete entry category because it is referenced by other records.',
		// 	], 400 );
		// }

		$company = Company::find( $id );

		if ( $company ) {
			$company->destroy( $id );

			$data = [ 
				'status' => 200,
				'message' => "Company deleted successfully",
			];
			return response()->json( $data, 200 );
		} else {

			$data = [ 
				'status' => 404,
				'message' => 'No company found'
			];
			return response()->json( $data, 404 );
		}
	}
}
