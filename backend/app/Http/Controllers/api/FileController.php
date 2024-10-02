<?php

namespace App\Http\Controllers\api;

use App\Models\File;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller {
	public function upload( Request $request ) {
		$user = Auth::user();

		if ( $user ) {

			$validator = Validator::make( $request->all(), [ 
				'entryID' => [ 'required', 'numeric', Rule::exists( 'entries', 'id' ) ],
				'file' => [ 'required', 'file', 'mimes:jpeg,png,jpg,gif,svg,mp4,avi,mov,doc,docx,pdf', 'max:32768' ],
			] );

			if ( $validator->fails() ) {
				return response()->json( [ 
					'status' => 422,
					'error' => $validator->errors()
				], 422 );
			} else {
				if ( $request->file( 'file' ) ) {
					$file = $request->file( 'file' );
					$path = $file->store( 'uploads', 'public' );
					$fileType = $file->getClientMimeType();

					$originalName = $file->getClientOriginalName();

					$new_file = File::create(
						array(
							'file_name' => $originalName,
							'file_url' => "http://localhost:8000/" . $path,
							'entry_id' => $request->entryID,
							'file_type' => $fileType
						)
					);

					return response()->json( [ 
						'status' => 200,
						'data' => $new_file,
					] );
				}

				return response()->json( [ 'success' => false ], 400 );
			}



		} else {
			$data = [ 
				'status' => 401,
				'message' => 'Unauthorized'
			];
			return response()->json( $data, 401 );
		}

	}

	public function listFiles( Request $request ) {
		$user = Auth::user();

		if ( $user ) {

			$validator = Validator::make( $request->all(), [ 
				'entryID' => [ 'required', 'numeric', Rule::exists( 'entries', 'id' ) ],
			] );

			if ( $validator->fails() ) {
				return response()->json( [ 
					'status' => 422,
					'error' => $validator->messages()
				], 422 );
			} else {

				$files = File::where( [ 'entry_id' => $request->entryID ] )->get();

				return response()->json( [ 
					'status' => 200,
					'data' => $files,
				] );
			}

		} else {
			$data = [ 
				'status' => 401,
				'message' => 'Unauthorized'
			];
			return response()->json( $data, 401 );
		}

	}
}
