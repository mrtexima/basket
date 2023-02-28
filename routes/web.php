<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::prefix('product')->group(function(){
    Route::get('add', [ProductController::class, 'add'])->name('product.create');
    Route::post('add', [ProductController::class, 'store'])->name('product.store');
    Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('edit/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('list', [ProductController::class, 'list'])->name('product.list');
});
Route::prefix('basket')->group(function(){
    Route::get('/', [BasketController::class, 'index'])->name('basket.index');
    Route::get('clear', [BasketController::class, 'clear'])->name('basket.clear');
    Route::get('add/{product}', [BasketController::class, 'add'])->name('basket.add');
    Route::get('sub/{product}', [BasketController::class, 'sub'])->name('basket.sub');
    Route::get('unset/{product}', [BasketController::class, 'unset'])->name('basket.unset');
});
