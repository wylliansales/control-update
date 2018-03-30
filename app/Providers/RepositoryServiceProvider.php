<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('App\Repositories\UserRepository','App\Repositories\UserRepositoryEloquent');
        \App::bind('App\Repositories\CustomerRepository','App\Repositories\CustomerRepositoryEloquent');
        \App::bind('App\Repositories\ProductRepository','App\Repositories\ProductRepositoryEloquent');
        \App::bind('App\Repositories\OrderRepository','App\Repositories\OrderRepositoryEloquent');
    }
}
