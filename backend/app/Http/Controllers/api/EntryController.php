<?php

namespace App\Http\Controllers\api;

use App\Models\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntryController extends Controller {

	public function index() {
		$entries = Entry::all();

		if ( $entries->count() > 0 ) {
			$data = [ 
				'status' => 200,
				'entries' => $entries
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

	// public function create( Request $request ) {
	// 	$validator = Validator::make( $request->all(), [ 
	// 		'name' => 'required|string|max:191',
	// 		'course' => 'required|string|max:191',
	// 		'email' => 'required|email|max:191|unique:students,email',
	// 		'phone' => 'required|digits:10',
	// 	] );

	// 	if ( $validator->fails() ) {
	// 		return response()->json( [ 
	// 			'status' => 422,
	// 			'error' => $validator->messages()
	// 		], 422 );
	// 	} else {

	// 		$student = Student::create( [ 
	// 			'name' => $request->name,
	// 			'course' => $request->course,
	// 			'email' => $request->email,
	// 			'phone' => $request->phone,
	// 		] );

	// 		if ( $student ) {
	// 			return response()->json( [ 
	// 				'status' => 200,
	// 				'message' => 'Student successfully created',
	// 				'student' => $student
	// 			], 200 );
	// 		} else {
	// 			return response()->json( [ 
	// 				'status' => 500,
	// 				'error' => 'Something went wrong'
	// 			], 500 );
	// 		}
	// 	}
	// }

	// public function find( $id ) {
	// 	$student = Student::find( $id );

	// 	if ( $student ) {
	// 		$data = [ 
	// 			'status' => 200,
	// 			'student' => $student
	// 		];
	// 		return response()->json( $data, 200 );
	// 	} else {
	// 		$data = [ 
	// 			'status' => 404,
	// 			'message' => 'No student found'
	// 		];
	// 		return response()->json( $data, 404 );
	// 	}
	// }

	// public function update( Request $request, $id ) {
	// 	$validator = Validator::make( $request->all(), [ 
	// 		'name' => 'required|string|max:191',
	// 		'course' => 'required|string|max:191',
	// 		'email' => [ 
	// 			'required',
	// 			'email',
	// 			'max:191',
	// 			Rule::unique( 'students' )->ignore( $id ),
	// 		],
	// 		'phone' => 'required|digits:10',
	// 	] );

	// 	if ( $validator->fails() ) {
	// 		return response()->json( [ 
	// 			'status' => 422,
	// 			'error' => $validator->messages()
	// 		], 422 );
	// 	} else {

	// 		$student = Student::find( $id );

	// 		if ( $student ) {
	// 			$student->update( [ 
	// 				'name' => $request->name,
	// 				'course' => $request->course,
	// 				'email' => $request->email,
	// 				'phone' => $request->phone,
	// 			] );

	// 			return response()->json( [ 
	// 				'status' => 200,
	// 				'message' => 'Student successfully updated',
	// 				'student' => $student
	// 			], 200 );
	// 		} else {
	// 			return response()->json( [ 
	// 				'status' => 404,
	// 				'error' => 'Student not found',
	// 			], 404 );
	// 		}
	// 	}
	// }

	// public function delete( $id ) {
	// 	$student = Student::find( $id );

	// 	if ( $student ) {
	// 		$student->destroy( $id );

	// 		$data = [ 
	// 			'status' => 200,
	// 			'message' => "Student deleted successfully",
	// 		];
	// 		return response()->json( $data, 200 );
	// 	} else {

	// 		$data = [ 
	// 			'status' => 404,
	// 			'message' => 'No student found'
	// 		];
	// 		return response()->json( $data, 404 );
	// 	}
	// }

}
