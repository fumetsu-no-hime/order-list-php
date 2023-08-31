<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderListController;
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

Route::get('/order-list-1', [OrderListController::class,'orderList']);

Route::get('/order-list-2', [OrderListController::class,'orderList2']);

Route::get('/order-list-3', [OrderListController::class,'orderList3']);
