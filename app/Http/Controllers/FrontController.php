<?php

namespace App\Http\Controllers;

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
        return view('/checkout/front', compact('products'));
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
        return view('test.test',compact('phone'));
    }

    public function step1_store(Request $request)
    {
        //
        $request->validate([
            'phone'=>'required',
        ]);
        $request->session()->put('form_phone', $request->phone);
        return redirect(route('test.step2'));
    }

    public function step2(Request $request)
    {
        //
        $phone = $request->session()->get('form_phone', '');
        return view('test.test2',compact('phone'));
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
