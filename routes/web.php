<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\GoogleLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/carts', [CartController::class, 'index'])->middleware(['auth']);
// Route::get('/carts', [CartController::class, 'store']);

require __DIR__.'/auth.php';

Route::post('/auth/google/redirect', [GoogleLoginController::class, 'getGoogleAuth'])->name('google.redirect');
Route::get('/login/google/callback', [GoogleLoginController::class, 'authGoogleCallback']);