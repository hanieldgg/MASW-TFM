<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
	public function login( Request $request ) {
		$credentials = $request->only( 'email', 'password' );

		if ( Auth::attempt( $credentials ) ) {
			$user = Auth::user();
			$token = $user->createToken( 'API Token' )->plainTextToken;

			return response()->json( [ 'token' => $token ] );
		}

		return response()->json( [ 'status' => 401, 'message' => 'Invalid Credentials' ], 401 );
	}

	public function register( Request $request ) {
		$request->validate( [ 
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8|confirmed',
		] );

		$user = User::create( [ 
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make( $request->password ),
		] );

		return response()->json( [ 'token' => $user->createToken( 'token_name' )->plainTextToken ] );
	}

	public function getProfile( Request $request ) {
		$user = Auth::user();

		if ( $user ) {
			return response()->json( $user );
		}

		return response()->json( [ 'error' => 'Unauthorized' ], 401 );
	}
}