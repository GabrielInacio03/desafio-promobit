<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\IProductRepository','App\Repositories\Eloquent\ProductRepository');

        $this->app->bind('App\Repositories\Contracts\ITagRepository','App\Repositories\Eloquent\TagRepository');
        
        $this->app->bind('App\Repositories\Contracts\IProductTagRepository','App\Repositories\Eloquent\ProductTagRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
