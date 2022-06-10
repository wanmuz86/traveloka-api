<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
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
// Pulangkan hotel, dan bilik yang di bawah RM 200 untuk setiap hotel -> Doing query in relation
Route::get('/hotels-with-cheap-room',[HotelController::class,'hotelCheapRoom']);

Route::post('/hotels/{hotel_id}/rooms', [RoomController::class,'create']);
Route::get('/hotels/{hotel_id}/rooms',[RoomController::class, 'index']);
Route::get('/hotels/{hotel_id}/rooms/{room_id}',[RoomController::class,'get']);
Route::put('/hotels/{hotel_id}/rooms/{room_id}',[RoomController::class, 'update']);
Route::delete('/hotels/{hotel_id}/rooms/{room_id}',[RoomController::class,'delete']);

Route::post('/facilities', [FacilityController::class,'create']);
Route::get('/facilities', [FacilityController::class,'index']);

Route::get('/facilities/{facility_id}/hotels',[FacilityController::class,'getHotels']);

