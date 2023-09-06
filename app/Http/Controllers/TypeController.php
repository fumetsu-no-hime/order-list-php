<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Models\ProductTypeImg;
use App\Services\FileService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected FileService $FileService)
    {
    }
    public function index()
    {
        //
        $types = ProductType::get();
        // $typeImg = ProductTypeImg::first();
        return view('type-list.type-list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('type-list.type-list-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $type = ProductType::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        foreach ($request->image ?? [] as $value) {
            ProductTypeImg::create([
                'img_path' => $this->FileService->imgUpload($value, 'type-image'),
                'product_type_id' => $type->id,
            ]);
        }

        return redirect(route('type.index'));
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
        $type = ProductType::find($id);
        return view('type-list.type-list-edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $type = ProductType::find($id);
        $type->updated([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        if ($request->hasFile('image')) {
            foreach ($type->productTypeImg ?? [] as $value) {
                $this->FileService->deleteUpload($value->img_path);
                $value->delete();
            }
            foreach ($request->image ?? [] as $value) {
                ProductTypeImg::create([
                    'img_path' => $this->FileService->imgUpload($value, 'type-image'),
                    'product_type_id' => $id,
                ]);
            }
        }
        return redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $type = ProductType::find($id);
        foreach ($type->productTypeImg ??[]as $value) {
            $this->FileService->deleteUpload($value->img_path);
            $value->delete();
        }
        $type->delete();
        return redirect(route('type.index'));
    }

}
