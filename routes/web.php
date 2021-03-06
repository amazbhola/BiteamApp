<?php

use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Routing\RouteGroup;
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
// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/', DashboardController::class);
    Route::resource('/categories', AdminCategoriesController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/brands', AdminBrandController::class);
    Route::resource('/orders', OrderController::class);



});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/{path}', function () {
    return view('home');
})->where('path','.*');
