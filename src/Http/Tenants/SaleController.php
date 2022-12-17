<?php
namespace App\Http\Controllers\Tenants;

use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        return view('tenants.sales.index');
    }
}