<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CompanyController;
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

	// Companies CRUD
	Route::get( 'companies', [ CompanyController::class, 'index' ] );
	Route::get( 'companies/{id}', [ CompanyController::class, 'find' ] );
	Route::post( 'companies', [ CompanyController::class, 'create' ] );
	Route::put( 'companies/{id}', [ CompanyController::class, 'update' ] );
	Route::delete( 'companies/{id}', [ CompanyController::class, 'delete' ] );

	// Entry Categories CRUD
	Route::get( 'entry-categories', [ EntryCategoryController::class, 'index' ] );
	Route::get( 'entry-categories/{id}', [ EntryCategoryController::class, 'find' ] );
	Route::post( 'entry-categories', [ EntryCategoryController::class, 'create' ] );
	Route::put( 'entry-categories/{id}', [ EntryCategoryController::class, 'update' ] );
	Route::delete( 'entry-categories/{id}', [ EntryCategoryController::class, 'delete' ] );
	Route::get( 'entry-categories/full/{id}', [ EntryCategoryController::class, 'getFullCategory' ] );

	// Entries CRUD
	Route::get( 'entries', [ EntryController::class, 'index' ] );
	Route::get( 'entries/{id}', [ EntryController::class, 'find' ] );
	Route::post( 'entries', [ EntryController::class, 'create' ] );
	Route::put( 'entries/{id}', [ EntryController::class, 'update' ] );
	Route::delete( 'entries/{id}', [ EntryController::class, 'delete' ] );
	Route::get( 'entries/user/all', [ EntryController::class, 'indexByUser' ] );
	Route::get( 'entries/unpaid/user', [ EntryController::class, 'indexUnpaidEntries' ] );

	// Braintree routes
	Route::get( 'client_token', [ BraintreeController::class, 'getClientToken' ] );
	Route::post( 'checkout', [ BraintreeController::class, 'checkout' ] );

	// Orders routes
	Route::post( 'orders', [ OrderController::class, 'getUserOrders' ] );
} );
