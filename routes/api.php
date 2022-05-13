<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
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

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/stocks', [StockController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/carts', [CartController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/carts', [CartController::class, 'store'])->middleware(['auth:sanctum']);
