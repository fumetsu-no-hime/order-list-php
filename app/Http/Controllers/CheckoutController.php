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
        $carts = Cart::where('user_id', $request->user()->id)->get();

        $total = 0;
        foreach ($carts as $value) {
            $total += $value->product->price * $value->qty;
        }

        return view('checkout2.checkout_order_detail', compact('carts', 'total'));

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
            'code' => $updateCart ? 1 : 0,
            'price' => ($cart->product?->price ?? 0) * $cart->qty,
        ];
    }

    public function del_store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'add' => 'required',
            'date' => 'required',
            'phone' => 'required|numeric',
        ]);
        $request->session()->put('del_name', $request->name);
        $request->session()->put('del_add', $request->add);
        $request->session()->put('del_date', $request->date);
        $request->session()->put('del_phone', $request->phone);
        $request->session()->put('del_memo', $request->memo);
        return redirect(route('user.pay'));
    }

    public function del_info(Request $request)
    {
        //
        $delName = $request->session()->get('del_name', '');
        $delAdd = $request->session()->get('del_add', '');
        $delDate = $request->session()->get('del_date', '');
        $delPhone = $request->session()->get('del_phone', '');
        $delMemo = $request->session()->get('del_memo', '');

        return view('checkout2.delivery_detail', compact('delName', 'delAdd', 'delDate', 'delPhone', 'delMemo'));
    }

    public function pay_info(Request $request)
    {
        //
        return view('checkout2.payment_detail');

    }

    public function order(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'add' => 'required',
            'date' => 'required',
            'phone' => 'required|numeric',
        ]);
        return redirect(route('user.thx'));
    }

    public function thx(Request $request)
    {
        //
        return view('checkout2.order_complete');

    }
}
