<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('Register');
});

Route::resource('Dashboard',DashboardController::class)->middleware('logincheck');

Route::resource('CustomerDetails',CustomerController::class)->middleware('logincheck');

Route::resource('TankDetails',TankController::class)->middleware('logincheck');
Route::get('Register',[TankController::class,'register'])->middleware('logincheck');

Route::resource('Deposit',DepositController::class)->middleware('logincheck');

Route::resource('Withdraw',WithdrawController::class)->middleware('logincheck');

Route::get('/createPDF/{id}',[CustomerController::class,'createPDF']);

Route::get('/registerpdf',[TankController::class,'registerpdf']);

Route::get('/reciptPDF/{id}',[TankController::class,'reciptPDF']);

Route::get('bill/{id}',[TankController::class,'bill']);


Route::get('bill2/{id}',[TankController::class,'bill2']);



Route::get('fast/{id}',[TankController::class,'fastbill']);

Route::get('fast2/{id}',[TankController::class,'fastbill2']);


Route::resource('Agency', AgencyController::class)->middleware('logincheck');

Route::get('CustomerSearch',[CustomerController::class,'customersearch'])->middleware('logincheck');

Route::get('findbill',[CustomerController::class,'findbill'])->middleware('logincheck');


Route::resource('LoadDetails', LoadController::class)->middleware('logincheck');

Route::resource('login',LoginController::class);

Route::get('login1',[LoginController::class,'login1'])->middleware('logincheck');

Route::get('forgetpassword',[LoginController::class,'forgetpassword']);

Route::get('otp',[LoginController::class,'otp']);

Route::get('changepassword',[LoginController::class,'changepassword']);

Route::get('newpassword',[LoginController::class,'newpassword']);

Route::resource('registeration',RegisterationController::class);

Route::get('logout',[LoginController::class,'logout']);

Route::get('pendingbill',[CustomerController::class,'pendingbill'])->middleware('logincheck');
