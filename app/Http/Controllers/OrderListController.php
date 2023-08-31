<?php

namespace App\Http\Controllers;

class OrderListController extends Controller
{
    public function orderList()
    {
        return view('order-list.order-list-產品列表頁');
    }
    public function orderList2()
    {
        return view('order-list.order-list-產品新增頁');
    }
    public function orderList3()
    {
        return view('order-list.order-list-產品編輯頁');
    }
}
