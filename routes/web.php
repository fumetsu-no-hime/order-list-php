<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
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

//
Route::get('/', function () {
    return view('welcome');

});

Route::get('/order-list', [ProductController::class,'index'])->name('product.index');
Route::get('/order-list-add', [ProductController::class,'create'])->name('product.create');
Route::post('/store', [ProductController::class,'store'])->name('product.store');
Route::get('/order-list-edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::post('/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');


Route::resource('/type', TypeController::class);

Route::resource('/', ChatController::class);




