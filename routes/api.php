<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InventoryController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//--------------------- customer routes ---------------------
Route::get('/customers',[CustomerController::class,'index']);
Route::get('/customers/{id}',[CustomerController::class,'show']);
Route::post('/customers',[CustomerController::class,'store']);
Route::put('/customers/{id}',[CustomerController::class,'update']);
Route::delete('/customers/{id}',[CustomerController::class,'destroy']);

//--------------------- customer routes ---------------------
Route::get('/inventories',[InventoryController::class,'index']);
Route::get('/inventories/{id}',[InventoryController::class,'show']);
Route::post('/inventories',[InventoryController::class,'store']);
Route::put('/inventories/{id}',[InventoryController::class,'update']);
Route::delete('/inventories/{id}',[InventoryController::class,'destroy']);

