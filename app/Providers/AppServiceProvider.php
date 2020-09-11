<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Package\Infra\DB\Eloquent\TodoEloquent;
use Package\Infra\DB\TodoGateway;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        TodoGateway::class => TodoEloquent::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
