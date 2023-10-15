<?php

use App\Models\CustomerData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TankController;

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

Route::get('getcustdata/{id}',[CustomerController::class,'getcustdata']);

Route::post('gettankdata',[TankController::class,'gettankdata']);

Route::post('gettankdata2',[TankController::class,'gettankdata2']);

Route::post('searchdata',[TankController::class,'searchdata']);

Route::post('searchdata2',[TankController::class,'searchdata2']);

Route::post('searchdata3',[TankController::class,'searchdata3']);

