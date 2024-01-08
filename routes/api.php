<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendMailController;
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


Route::apiResource('products', ProductController::class);
Route::apiResource('images', ImageController::class);
Route::apiResource('orders', OrderController::class);

//mailer
Route::post('sendemail',[SendMailController::class,'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



