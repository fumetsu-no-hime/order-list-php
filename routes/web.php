<?php

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

Route::get('/order-list-1', function () {
    return view('order-list.order-list-產品列表頁');
});

Route::get('/order-list-2', function () {
    return view('order-list.order-list-產品新增頁');
});

Route::get('/order-list-3', function () {
    return view('order-list.order-list-產品編輯頁');
});
