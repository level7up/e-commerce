<?php 
namespace Level7up\ECommerce\Http\Controllers;

use Level7up\Dashboard\Http\Controllers\Controller;
use Level7up\ECommerce\DataTables\ProductsDataTable;

Class ProductController extends Controller 
{
    public function index(ProductsDataTable $dt)
    {
        return $dt->render('ecommerce::products.index');
    }
    
    public function create()
    {
        return view('ecommerce::products.create');
    }

}