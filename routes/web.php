<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/index', function(){
    return view('admin.dashboard');
})->name('index');
Route::group(['prefix'=>'category'], function(){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
});

Route::group(['prefix'=>'category/subcategory'], function(){
    Route::get('/',[SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/create',[SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/store',[SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/{id}/edit',[SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::put('/{id}/update',[SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('/{id}/delete',[SubCategoryController::class, 'destroy'])->name('subcategory.destroy');


});
Route::group(['prefix'=>'product'], function(){
    Route::get('/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/store',[ProductController::class, 'store'])->name('product.store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
