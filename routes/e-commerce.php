<?php

use Illuminate\Support\Facades\Route;
use Level7up\ECommerce\Http\Controllers\ProductController;
use Level7up\ECommerce\Http\Controllers\CategoriesController;

 Route::group([
    'middleware' => ['auth:admin'],
], function () {
        Route::resource('product', ProductController::class);
        Route::resource('category', CategoriesController::class);
});