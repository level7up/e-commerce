<?php 
namespace Level7up\ECommerce\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EcommerceServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'ecommerce');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'ecommerce');
        $this->bootRoute();
    }
    
    private function bootRoute()
    {
        return Route::group([
            'middleware' => ['web'],
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/e-commerce.php');
        });
    }
}