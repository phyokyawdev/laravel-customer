<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZoneController;

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

 
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
  
Route::middleware('auth:api')->group(function () {
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

