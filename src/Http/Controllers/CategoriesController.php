<?php 
namespace Level7up\ECommerce\Http\Controllers;

use Level7up\ECommerce\Models\Category;
use Level7up\Dashboard\Traits\UploadFiles;
use Level7up\Dashboard\Http\Controllers\Controller;
use Level7up\ECommerce\Http\Requests\Category\Store;
use Level7up\ECommerce\DataTables\CategoriesDataTable;

Class CategoriesController extends Controller 
{
    use UploadFiles;
    public function index(CategoriesDataTable $dt)
    {
        return $dt->render('ecommerce::categories.index');
    }
    
    public function create()
    {
        return view('ecommerce::categories.create');
    }
    
    public function store(Store $request)
    {
        $data = $request->validated();
        if($request->has('special')){
           $data['special'] = 1;
        }
        $data['image'] = $this->uploadImageAndReturnName($request, 'image', 'categories');
        Category::create($data);
        return redirect()->route('dashboard.category.index')->with('success', __('ecommerce::keywords.category_created')); 
    }

}