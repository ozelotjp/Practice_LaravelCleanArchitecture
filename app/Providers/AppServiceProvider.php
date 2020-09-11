<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Package\Infra\Eloquent\TodoGateway;
use Package\Infra\TodoGatewayInterface;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        TodoGatewayInterface::class => TodoGateway::class
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
