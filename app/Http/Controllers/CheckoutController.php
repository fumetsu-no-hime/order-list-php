<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'payment' => 'required|numeric'
        ]);

        $items = Cart::where('user_id', $request->user()->id)->get();

        $todayOrderCount = Order::whereDate('created_at', today())->get()->count();

        $string = 'ADNVKFJDGHCDSGFDSfcmjnkjlyyutdetzsghvfDHGDSEAGFFD';

        $shuffle = str_shuffle($string);

        $form = Order::create([
            'user_id' => $request->user()->id,
            'name' => session()->get('del_name'),
            'address' => session()->get('del_add'),
            'date' => session()->get('del_date'),
            'phone' => session()->get('del_phone'),
            'memo' => session()->get('del_memo')??'',
            'number' => 'HW' . date("Ymd") . str_pad($todayOrderCount, 4, '0', STR_PAD_LEFT) . substr($shuffle, 0, 3),
            'payment' => $request->payment,
        ]);

        $total = 0;

        foreach ($items as $value) {
            $total += $value->product->price * $value->qty;

            OrderProduct::create([
                'form_id' => $form->id,
                'img_path' => $value->product->img_path,
                'product_name' => $value->product->name,
                'desc' => $value->product->desc,
                'qty' => $value->qty,
                'price' => $value->product->price,
            ]);

            $value->delete();
        }

        $form->update([
            'subtotal' => $total,
        ]);

        session()->forget(['del_name','del_add','del_date','del_phone','del_memo']);

        $data = [
            'name'=>$request->user()->name,
            'order_id'=> $form->number,
            'subtotal'=>$total,
        ];

        Mail::to($request->user()->email)->send(new OrderCreated($data));

        return redirect(route('user.thx'));
    }

    public function thx(Request $request)
    {
        //
        return view('checkout2.order_complete');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);
        $cart = Cart::find($request->cart_id)->delete();

        $carts = Cart::where('user_id', $request->user()->id)->get();

        $total = 0;

        foreach ($carts as $value) {
            $total += $value->product->price * $value->qty;
        }

        return (object) [
            'code' => $cart ? 1 : 0,
            'id' => $request->cart_id,
            'total' => $total,
        ];
    }

    public function detail(Request $request)
    {
        //
        $order = Order::where('user_id', $request->user()->id)->get();
        return view('checkout2.order_detail',compact('order'));
    }
}
