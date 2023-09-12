<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function check(Request $request)
    {
        //
        $carts = Cart::where('user_id',$request->user()->id)->get();
        return view('checkout2.checkout_order_detail',compact('carts'));

    }
    public function del_info(Request $request)
    {
        //
        return view('checkout2.delivery_detail');

    }

    public function pay_info(Request $request)
    {
        //
        return view('checkout2.payment_detail');

    }

    public function thx(Request $request)
    {
        //
        return view('checkout2.order_complete');

    }
}


