<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EntryCategoryController;
use App\Http\Controllers\api\EntryController;
use App\Http\Controllers\api\FileController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\AuthController;

// Route::get( '/user', function (Request $request) {
// 	return $request->user();
// } )->middleware( 'auth:sanctum' );

// User routes
Route::post( '/auth/login', [ AuthController::class, 'login' ] )->name( 'login' );
Route::post( '/auth/register', [ AuthController::class, 'register' ] );


Route::middleware( 'auth:sanctum' )->group( function () {
	Route::get( '/auth/validate', [ AuthController::class, 'validateToken' ] );
	Route::get( '/auth/profile', [ AuthController::class, 'getProfile' ] );
	Route::post( '/auth/profile', [ AuthController::class, 'updateProfile' ] );

	// Entry Categories CRUD
	Route::get( 'entry-categories', [ EntryCategoryController::class, 'index' ] );
	Route::get( 'entry-categories/{id}', [ EntryCategoryController::class, 'find' ] );
	Route::get( 'entry-categories/full/{id}', [ EntryCategoryController::class, 'getFullCategory' ] );

	// Entries CRUD
	Route::get( 'entries', [ EntryController::class, 'index' ] );
	Route::post( 'entries', [ EntryController::class, 'create' ] );
	Route::put( 'entries/{id}', [ EntryController::class, 'updateScore' ] );
	Route::delete( 'entries/{id}', [ EntryController::class, 'delete' ] );
	Route::get( 'entries/user/all', [ EntryController::class, 'indexByUser' ] );
	Route::get( 'entries/unpaid/user', [ EntryController::class, 'indexUnpaidEntries' ] );
	Route::get( 'entries/meta/{entryID}', [ EntryController::class, 'dashboardMeta' ] );

	// Braintree routes
	Route::get( 'client_token', [ BraintreeController::class, 'getClientToken' ] );
	Route::post( 'checkout', [ BraintreeController::class, 'checkout' ] );

	// Orders routes
	Route::post( 'orders', [ OrderController::class, 'getUserOrders' ] );

	// File Upload routes
	Route::post( 'upload', [ FileController::class, 'upload' ] );
	Route::post( 'upload/list', [ FileController::class, 'listFiles' ] );
} );
