<?php

use Illuminate\Support\Facades\Route;
use Level7up\ECommerce\Http\Controllers\ProductController;

 Route::group([
    'middleware' => ['auth:admin'],
], function () {
        Route::resource('product', ProductController::class);
});