<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
});
Route::group(['prefix'=>'category'], function(){
    Route::get('/',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{id}',[CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
