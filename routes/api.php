<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SubscriptionController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::apiResource('products', ProductController::class);
Route::apiResource('images', ImageController::class);

//mailer
Route::post('sendemail', [SendMailController::class, 'store']);


//Subscription
Route::prefix('subscription')->group(function () {
    // subscription CRUD
    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('index', 'index');
        Route::post('store', 'store');
    });
});

//orders
Route::prefix('orders')->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get('index', 'index');
        Route::post('show', 'show');
        Route::post('store', 'store');
        Route::post('update/{id}', 'update');
        Route::post('delete/{id}', 'destroy');
    });
});

//cart
Route::prefix('cart')->group(function () {
    Route::controller(CartController::class)->group(function () {
        Route::get('list', 'cartList'); // changed 'cartList' to 'list'
        Route::post('add', 'addToCart'); // changed 'add' to 'add'
        Route::post('update/{id}', 'updateCart');
        Route::post('remove/{id}', 'removeCart');
        Route::post('clear', 'clearAllCart');
    })->middleware('api');
});
