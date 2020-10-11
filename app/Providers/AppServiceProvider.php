<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Package\Gateway\ITodoDatabase;
use Package\Gateway\ITodoFile;
use Package\Infra\TodoDatabase;
use Package\Infra\TodoFile;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ITodoDatabase::class => TodoDatabase::class,
        ITodoFile::class => TodoFile::class
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
