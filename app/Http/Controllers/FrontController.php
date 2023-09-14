<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::where('status', 1)->get();
        return view('/front', compact('products'));
    }

    public function user_info(Request $request)
    {
        //
        $user = $request->user();
        return view('user_setting', compact('user'));

    }

    public function user_info_update(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => '必填',
            'name.max' => '字數過長',
        ]);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        // ]);

        // if ($validator->fails()) {
        //     return redirect(route('user.info'))->withErrors(['nameError' => '帳號名稱字數過多']);
        // }

        $user = $request->user();
        $user->update([
            'name' => $request->name
        ]);
        return redirect(route('user.info'));
    }

    public function test(Request $request)
    {
        //
        $phone = $request->session()->get('form_phone', '');
        return view('test.test', compact('phone'));
    }

    public function step1_store(Request $request)
    {
        //
        $request->validate([
            'phone' => 'required',
        ]);
        $request->session()->put('form_phone', $request->phone);
        return redirect(route('test.step2'));
    }

    public function step2(Request $request)
    {
        //
        $phone = $request->session()->get('form_phone', '');
        return view('test.test2', compact('phone'));
    }

    public function product(Request $request)
    {
        //
        $products = Product::where('status', 1)->get();
        return view('frontproduct', compact('products'));
    }

    public function add_cart(Request $request)
    {
        $request->validate([
            'qty' => 'required|min:1|numeric',
            'product_id' => 'required|exists:products,id|numeric',
        ]);

        $oddCart = Cart::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();
        if ($oddCart) {
            $cart = $oddCart->update([
                'qty' => $request->qty,
            ]);
        } else {
            $cart = Cart::create([
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'user_id' => $request->user()->id,
            ]);
        }

        return (object) [
            'code' => $cart ? 1 : 0,
            'product_id' => $request->product_id,
        ];
    }

    public function ec_pay(Request $request, $order_id)
    {
        $user = $request->user();

        $order = Order::where('user_id', $user->id)->find($order_id);

        $string = 'ADNVKFJDGHCDSGFDSfcmjnkjlyyutdetzsghvfDHGDSEAGFFD';

        $shuffle = str_shuffle($string);

        if ($order) {
            $data = (object) [
                'MerchantID' => '3002607',
                'MerchantTradeNo' => $order->number . substr($shuffle, 0, 3),
                'MerchantTradeDate' => date('Y/m/d H:i:s'),
                'PaymentType' => 'aio',
                'TotalAmount' => $order->subtotal,
                'TradeDesc' => '線上購物網站',
                'ItemName' => '購物',
                'ReturnURL' => 'https://demo-miki.digipack.io/ECpay/ECPay-callback',
                'ChoosePayment' => 'ALL',
                'CheckMacValue' => '',
                'EncryptType' => 1,
                'ClientBackURL' => url('/'),
                'IgnorePayment' => 'WebATM#CVS#BARCODE',
            ];
            //測試用
            $hashKey = 'pwFHCqoQZGmho4w6';

            $hashIv = 'EkRm7iFT261dpevs';

            $step1 = "ChoosePayment={$data->ChoosePayment}&ClientBackURL={$data->ClientBackURL}&EncryptType={$data->EncryptType}&IgnorePayment={$data->IgnorePayment}&ItemName={$data->ItemName}&MerchantID={$data->MerchantID}&MerchantTradeDate={$data->MerchantTradeDate}&MerchantTradeNo={$data->MerchantTradeNo}&PaymentType={$data->PaymentType}&ReturnURL={$data->ReturnURL}&TotalAmount={$data->TotalAmount}&TradeDesc={$data->TradeDesc}";

            $step2 = "HashKey={$hashKey}&{$step1}&HashIV={$hashIv}";

            $step3 = urlencode($step2);

            $step4 = strtolower($step3);

            $step5 = hash('sha256',$step4);

            $step6 = strtoupper($step5);

            $data->CheckMacValue = $step6;

            return view('ecpay', compact('data'));
        } else {
            return redirect('/');
        }
    }

    public function ec_pay_return(Request $request)
    {
        //綠界打不回來，因為我們是本地測試伺服器
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
