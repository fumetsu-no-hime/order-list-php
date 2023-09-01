<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Service\FileService;

class ProductController extends Controller
{
    protected $FileService;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        //產品列表頁
        return view('order-list.order-list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //新增資料頁
        //驗證進來的資料是否合規範
        return view('order-list.order-list-add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //新產品資料儲存功能
        // dd($request->all());
        $path = Storage::putFile('public', $request->file('image'));


        Product::create([
            'name' => $request->name,
            'img_path' => str_replace('public', 'storage', $path),
            'price' => $request->price,
            'status' => $request->status,
            'desc' => $request->desc,
        ]);

        return redirect(route('product.index'));
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
    public function edit($id)
    {
        $product = Product::find($id);
        //產品編輯頁
        return view('order-list.order-list-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //產品更新功能
        // dd($request->all());
        $product = Product::find($id);

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            Storage::delete(str_replace('storage', 'public', $product->img_path));

            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
                'desc' => $request->desc,
                'img_path' => str_replace('public', 'storage', $path),
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
                'desc' => $request->desc,
            ]);
        }


        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        //刪除資料功能
    }
}
