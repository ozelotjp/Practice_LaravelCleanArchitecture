<?php

namespace App\Providers;

use Domain\Adapter\Gateway\MenuGateway;
use Domain\Adapter\Gateway\ReservationGateway;
use Domain\Adapter\Gateway\ShopGateway;
use Domain\Service\Repository\MenuRepository;
use Domain\Service\Repository\ReservationRepository;
use Domain\Service\Repository\ShopRepository;
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
