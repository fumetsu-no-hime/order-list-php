<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function check(Request $request)
    {
        //
        return view('/checkout/checklist');

    }
    public function del_info(Request $request)
    {
        //
        return view('/checkout/del-info');

    }

    public function pay_info(Request $request)
    {
        //
        return view('/checkout/pay-info');

    }

    public function thx(Request $request)
    {
        //
        return view('/checkout/thanks');

    }
}


