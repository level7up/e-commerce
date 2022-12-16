<?php 
namespace Level7up\ECommerce\DataTables;

use Level7up\ECommerce\Models\Product;
use Level7up\Dashboard\DataTables\DataTable;
use Level7up\Dashboard\Vendor\Yajra\DataTables\Html\Column;

class ProductsDataTable extends DataTable
{   
    protected $model = Product::class;
    public function dataTable($query)
    {
        $dt = parent::dataTable($query->withTrashed());
        $rawCols = $this->getRawColumns();
        return $dt->rawColumns($rawCols);
    }


    public function query(Product $model)
    {
        return $model->newQuery();
    }

    protected function getColumns()
    {
        return array_merge(
            [
                Column::make('id'),
                Column::make('name'),
            ],
            parent::getColumns()
        );
    }
}