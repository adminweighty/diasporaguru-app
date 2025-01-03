<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('company-rates', 'App\Http\Controllers\API\ApiController@getCompanyRates');
Route::any('company-rates-receive/{amount}', 'App\Http\Controllers\API\ApiController@receiveCompanyRatesAll');
Route::resource('company-rates-crud',App\Http\Controllers\CompanyRatesController::class)->only(['index','store','show','update','destroy']);
