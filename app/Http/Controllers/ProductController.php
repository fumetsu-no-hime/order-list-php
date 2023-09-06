<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;

class ProductController extends Controller
{
    // protected $FileService;

    // public function _construct(FileService $FileService)
    // {
    //     $this->FileService = $FileService;
    // }

    public function __construct(protected FileService $FileService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $products = Product::query();
        $keyword = $request->keyword ??'';
        if ($request->filled('keyword')) {
            $products = Product::where('name','like','%' .$keyword.'%')->orWhere('desc','like','%' . $keyword.'%');
        }

        $products = $products->paginate(5);
        // $products->withPath('/order-list?keyword=',$keyword);
        $products->appends(['keyword'=>$keyword]);

        // $searchs = Product::table('products')->where('name', $products->name)->first();
        //產品列表頁
        return view('order-list.order-list', ['products' => $products, 'keyword'=>$keyword]);
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
        //方法一 使用storage
        // $path = Storage::putFile('public', $request->file('image'));
        //方法二 使用fileservice
        $path = $this->FileService->imgUpload($request->file('image'), 'product-image');
        Product::create([
            'name' => $request->name,
            // 'img_path'=>$request->img_path,
            // 'img_path' => str_replace('public', 'storage', $path),
            'img_path' => $path,
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

        // if ($request->file('image')) {
        //     $path = Storage::putFile('public', $request->file('image'));
        //     Storage::delete(str_replace('storage', 'public', $product->img_path));

        //     $product->update([
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'status' => $request->status,
        //         'desc' => $request->desc,
        //         'img_path' => str_replace('public', 'storage', $path),
        //     ]);
        // } else {
        //     $product->update([
        //         'name' => $request->name,
        //         'price' => $request->price,
        //         'status' => $request->status,
        //         'desc' => $request->desc,
        //     ]);
        // }

        if ($request->file('image')) {
            $path = $this->FileService->imgUpload($request->file('image'), 'product-image');
            $this->FileService->deleteUpload($product->img_path);
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
                'desc' => $request->desc,
                'img_path' => $path,
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
        $this->FileService->deleteUpload($product->img_path);
        $product->delete();
        return redirect(route('product.index'));
        //刪除資料功能
        // dd($id);
    }
}
