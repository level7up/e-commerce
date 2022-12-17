<?php

namespace App\Http\Controllers\Tenants;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Level7up\Dashboard\Helpers\Reply;
use App\DataTables\PurchasesDataTable;
use Level7up\Dashboard\Http\Controllers\Controller;



class PurchasesController extends Controller
{
    public function index(PurchasesDataTable $dataTable)
    {
        return $dataTable->render('tenants.purchases.index');
    }

    public function create()
    {
        return view('tenants.purchases.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->items as $item) {
                $purchase = new Purchase();
                $purchase->product_id = $item['id'];
                $purchase->qty = $item['qty'];
                $purchase->amount = $item['amount'];
                $purchase->total = $item['amount'];
                $purchase->save();
                // add to inventory
                $product = Product::find($item['id']);
                $old_qty = $product->qty;
                $product->qty = $item['qty'] + $old_qty;
                $product->save();
            }
            DB::commit();
            return Reply::success('Your work has been saved');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}