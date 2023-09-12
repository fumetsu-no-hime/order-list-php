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

        $total = 0;
        foreach ($carts as $value){
            $total += $value->product->price * $value->qty;
        }

        return view('checkout2.checkout_order_detail',compact('carts','total'));

    }

    public function cart_update(Request $request)
    {
        //
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'qty' => 'required|numeric|min:1',
        ]);
        $cart = Cart::find($request->cart_id);

        $updateCart = $cart->update([
            'qty' => $request->qty,
        ]);

        return (object) [
            'code'=>$updateCart?1:0,
            'price'=>($cart->product?->price ?? 0)*$cart->qty,
        ];
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


