<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/hotels', [HotelController::class,'create']);
Route::get('/hotels',[HotelController::class,'index']);
Route::get('/hotels/{id}',[HotelController::class, 'get']);
Route::put('/hotels/{id}',[HotelController::class,'update']);
Route::delete('/hotels/{id}',[HotelController::class,'delete']);


