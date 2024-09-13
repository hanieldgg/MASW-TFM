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
				'companies' => $companies
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
			'name' => 'required|string|max:30',
			'address' => 'required|string|max:100',
			'logo_url' => 'required|string|max:255',
		] );

		if ( $validator->fails() ) {
			return response()->json( [ 
				'status' => 422,
				'error' => $validator->messages()
			], 422 );
		}

		$existingCompany = Company::where( 'name', $request->name )->first();
		if ( $existingCompany ) {
			return response()->json( [ 
				'status' => 409,
				'error' => 'A company with this name already exists.'
			], 409 );
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
				'company' => $company
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
				'company' => $company
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
			'address' => [ 'string', 'max:100', Rule::unique( 'companies' )->ignore( $id ) ],
			'logo_url' => [ 'string', 'max:255', Rule::unique( 'companies' )->ignore( $id ) ]
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
					'company' => $company
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
