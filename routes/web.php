<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FrontController;
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
    return view('welcome2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/front', [FrontController::class,'index']);

Route::get('/order-list', [ProductController::class,'index'])->name('product.index');
Route::get('/order-list-add', [ProductController::class,'create'])->name('product.create');
Route::post('/store', [ProductController::class,'store'])->name('product.store');
Route::get('/order-list-edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::post('/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');

Route::resource('/type', TypeController::class);

// Route::resource('/com', ChatController::class);
Route::get('/com-index', [ChatController::class,'index'])->name('com.index');
Route::get('/create', [ChatController::class,'create'])->name('com.create');
Route::post('/store', [ChatController::class,'store'])->name('com.store');
Route::get('/edit/{id}', [ChatController::class,'edit'])->name('com.edit');
Route::post('/update/{id}', [ChatController::class,'update'])->name('com.update');
Route::post('/delete/{id}', [ChatController::class,'destroy'])->name('com.delete');
