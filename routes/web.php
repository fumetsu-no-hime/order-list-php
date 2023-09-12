<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CheckoutController;
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

// Route::get('/', function () {
//     return view('checkout.front');
// });

//誰都可以進
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/front', [FrontController::class, 'index'])->name('front.index');
Route::get('/com/index', [ChatController::class, 'index'])->name('com.index');
Route::get('/front/product', [FrontController::class, 'product'])->name('front.product');


Route::middleware(['auth', 'role.weight:1', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//管理者
Route::middleware(['auth', 'role.weight:1'])->prefix('admin')->group(function () {
    Route::get('/backend', [BackendController::class, 'index'])->name('backend.index');

    Route::prefix('/product')->group(function () {
        Route::get('/order-list', [ProductController::class, 'index'])->name('product.index');
        Route::get('/order-list-add', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/order-list-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    });
    Route::resource('/type', TypeController::class);
    Route::get('/test', [FrontController::class, 'test'])->name('test.step1');
    Route::get('/test/2', [FrontController::class, 'step2'])->name('test.step2');
    Route::post('/test/store', [FrontController::class, 'step1_store'])->name('test.step1Store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//登入者
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('/front')->group(function () {
        Route::get('/user_check', [CheckoutController::class, 'check'])->name('user.check');
        Route::put('/products/cart-update', [CheckoutController::class, 'cart_update'])->name('cart.update');
        Route::get('/user_del_info', [CheckoutController::class, 'del_info'])->name('user.del');
        Route::get('/user_pay_info', [CheckoutController::class, 'pay_info'])->name('user.pay');
        Route::get('/user_thx', [CheckoutController::class, 'thx'])->name('user.thx');
        Route::get('/user_info', [FrontController::class, 'user_info'])->name('user.info');
        Route::post('/user_info_update', [FrontController::class, 'user_info_update'])->name('user.update');
    });
    Route::prefix('/com')->group(function () {
        Route::post('/create', [ChatController::class, 'create'])->name('com.create');
        Route::post('/store', [ChatController::class, 'store'])->name('com.store');
        Route::get('/edit/{id}', [ChatController::class, 'edit'])->name('com.edit');
        Route::post('/update/{id}', [ChatController::class, 'update'])->name('com.update');
        Route::post('/respUpdate/{id}', [ChatController::class, 'respUpdate'])->name('com.respUpdate');
        Route::post('/delete/{id}', [ChatController::class, 'destroy'])->name('com.delete');
        Route::post('/respDelete/{id}', [ChatController::class, 'respDelete'])->name('com.respDelete');
    });

    Route::post('/products/add-carts', [FrontController::class, 'add_cart'])->name('front.addCart');
});
