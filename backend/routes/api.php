<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\EntryCategoryController;
use App\Http\Controllers\api\EntryController;
use App\Http\Controllers\api\FileController;
use App\Http\Controllers\api\OrderController;

Route::get( '/user', function (Request $request) {
	return $request->user();
} )->middleware( 'auth:sanctum' );



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



// Entries CRUD
Route::get( 'entries', [ EntryController::class, 'index' ] );
Route::get( 'entries/{id}', [ EntryController::class, 'find' ] );
Route::post( 'entries', [ EntryController::class, 'create' ] );
Route::put( 'entries/{id}', [ EntryController::class, 'update' ] );
Route::delete( 'entries/{id}', [ EntryController::class, 'delete' ] );