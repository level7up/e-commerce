<?php
namespace App\Http\Controllers\Tenants;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('tenants.home');
    }
}