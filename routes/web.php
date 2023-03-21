<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [HomePage::class, 'index'])->name('welcome');

Route::get('/product/{product}', [ProductController::class, 'index'])->name('product');
Route::get('/cart', [CartController::class, 'index'])->name('cart');;
Route::get('/getWilaya', [ProductController::class, 'getwilaya'])->name('getWilaya');
Route::get('/getCommune/{wilaya_code}', [ProductController::class, 'getCommune'])->name('getCommune');
Route::get('/getCommune/{wilaya_code}', [ProductController::class, 'getCommune'])->name('getCommune');
Route::post('/saveOrder', [ProductController::class, 'saveOrder'])->name('saveOrder');
Route::post('/addToCart', [ProductController::class, 'addToCart'])->name('addToCart');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');






Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/accept-order/{id}', [DashboardController::class, 'accept_order'])->name('accept-order');
    Route::get('/refuse-order/{id}', [DashboardController::class, 'refuse_order'])->name('refuse-order');
    Route::get('/annulled-order/{id}', [DashboardController::class, 'annulled_order'])->name('annulled-order');
});



require __DIR__.'/auth.php';
