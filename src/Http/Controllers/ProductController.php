<?php 
namespace Level7up\ECommerce\Http\Controllers;

use Level7up\ECommerce\Models\Category;
use Level7up\Dashboard\Traits\UploadFiles;
use Level7up\Dashboard\Http\Controllers\Controller;
use Level7up\ECommerce\Http\Requests\Product\Store;
use Level7up\ECommerce\DataTables\ProductsDataTable;
use Level7up\ECommerce\Models\Product;

Class ProductController extends Controller 
{
    use UploadFiles;

    public function index(ProductsDataTable $dt)
    {
        return $dt->render('ecommerce::products.index');
    }
    
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('ecommerce::products.create',\compact('categories'));
    }
    
    public function store(Store $request)
    {
        $data = $request->validated();
        if($request->has('special')){
           $data['special'] = 1;
        }
        $data['image'] = $this->uploadImageAndReturnName($request, 'image', 'products');
        Product::create($data);
        return redirect()->route('dashboard.product.index')->with('success', __('ecommerce::keywords.product_created')); 
    }

}