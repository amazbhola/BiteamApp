<?php

use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\DashboardController;
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


Route::prefix('admin')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('index')->name('dashboard.index');
    // categories routes----------------------------------------------------
    // Urs GET Routs
    Route::get('/categories',[AdminCategoriesController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[AdminCategoriesController::class,'create'])->name('categories.create');
    // Route::get('/categories/edit',[AdminCategoriesController::class,'edit'])->name('categories.edit');
    // Products Routes -----------------------------------------------------
    // Route::get('/products',[AdminCategoriesController::class,'index']);
    // Route::get('/products/create',[AdminCategoriesController::class,'create']);
    // Route::get('/products/edit',[AdminCategoriesController::class,'edit']);
});
