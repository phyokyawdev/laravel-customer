<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Resources\FailResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 
Route::post('login', [PassportAuthController::class, 'login']);
  
Route::middleware('auth:api')->group(function () {
    // test route for auth
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
});

/**
 * User CRUD
 */
Route::apiResource('users', UserController::class);


/**
 * City CRUD
 */
Route::apiResource('cities', CityController::class);

/**
 * Zone CRUD
 */
Route::apiResource('zones', ZoneController::class);

/**
 * Customer CRUD
 */
Route::apiResource('customers', CustomerController::class);

/**
 * Non existing
 */
Route::fallback(function() {
    return (new FailResource(['message' => 'Route not exists!']))->response()->setStatusCode(404);
});
