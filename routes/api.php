<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\PaymentTypeController;

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

// UNAUTHORIZED ROUTES
Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'store']);

// AUTHORIZED ROUTES
Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('/user', UserController::class);
    Route::resource('/scholarship', ScholarshipController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/payment-details', PaymentDetailsController::class);
    Route::resource('/payment-type', PaymentTypeController::class);
});
