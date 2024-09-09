<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EntryController;

Route::get( '/user', function (Request $request) {
	return $request->user();
} )->middleware( 'auth:sanctum' );

Route::get( 'entries', [ EntryController::class, 'index' ] );
// Route::get( 'students/{id}', [ StudentController::class, 'find' ] );
// Route::post( 'students', [ StudentController::class, 'create' ] );
// Route::put( 'students/{id}', [ StudentController::class, 'update' ] );
// Route::delete( 'students/{id}', [ StudentController::class, 'delete' ] );