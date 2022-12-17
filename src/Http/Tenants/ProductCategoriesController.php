<?php
namespace App\Http\Controllers\Tenants;

use App\Models\ProductCategory;
use Level7up\Dashboard\Traits\UploadFiles;
use App\Http\Requests\Category\StoreRequest;
use App\DataTables\ProductCategoriesDataTable;

class ProductCategoriesController extends Controller
{
    public function index(ProductCategoriesDataTable $dataTable)
    {   
        return $dataTable->render('tenants.categories.index');
    }
    
    public function store(StoreRequest $request)
    {
        $image = null;
        if ($request->has('image')) {
            $image = $this->uploadFile('images/categories' ,$request->image);
        }
        
        $data = array_merge(
            $request->except(['_method', '_token', 'image']),
            ['image'=>$image]
        );
        ProductCategory::create($data);
        return \redirect()->back()->with('success', __('Added Successfully'));
    }
}