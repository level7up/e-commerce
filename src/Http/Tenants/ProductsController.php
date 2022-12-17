<?php

namespace App\Http\Controllers\Tenants;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\DataTables\ProductDataTable;
use Level7up\Dashboard\Traits\UploadFiles;
use App\Http\Requests\Product\StoreRequest;


class ProductsController extends Controller
{
    use UploadFiles;
    public function index(ProductDataTable $dataTable)
    {
        $categories = ProductCategory::all()->pluck('name', 'id')->toArray();
        return $dataTable->render('tenants.products.index', \compact('categories'));
    }

    public function show()
    {
        # code...
    }

    public function store(StoreRequest $request)
    {
        $image = null;
        if ($request->has('image')) {
            $image = $this->uploadImageAndReturnName($request, 'image', 'products');
        }

        $data = array_merge(
            $request->except(['_method', '_token', 'image', 'special']),
            ['image'=>$image],
            ['is_special'=> $request->special ? 1 : 0 ]
        );
        Product::create($data);
        return \redirect()->back()->with('success', __('Added Successfully'));
    }

    public function search(Request $request)
    {
        $products = Product::where('id', $request->key)->orWhere('name', 'like', '%' . $request->key . '%')->select(['id', 'image', 'name', 'price', 'qty', 'tax'])->get();
        return $products;
    }
}