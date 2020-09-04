<?php

namespace App\Providers;

use App\Http\Middleware\CleanArchitectureMiddleware;
use Illuminate\Support\ServiceProvider;
use Package\Controllers\Todo\TodoStoreController;
use Package\Controllers\Todo\TodoShowController;
use Package\Controllers\Todo\TodoIndexController;
use Package\Controllers\Todo\TodoToggleDoneController;
use Package\Gateways\Eloquent\TodoGateway;
use Package\Presenters\Todo\TodoStorePresenter;
use Package\Presenters\Todo\TodoIndexPresenter;
use Package\Presenters\Todo\TodoShowPresenter;
use Package\Presenters\Todo\TodoToggleDonePresenter;
use Package\UseCases\Repository\TodoRepository;
use Package\UseCases\Todo\Store\TodoStoreInput;
use Package\UseCases\Todo\Store\TodoStoreOutput;
use Package\UseCases\Todo\Show\TodoShowInput;
use Package\UseCases\Todo\Show\TodoShowOutput;
use Package\UseCases\Todo\Index\TodoIndexInput;
use Package\UseCases\Todo\Index\TodoIndexOutput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneInput;
use Package\UseCases\Todo\ToggleDone\TodoToggleDoneOutput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CleanArchitectureMiddleware::class);

        // Todo
        $this->app->singleton(TodoRepository::class, TodoGateway::class);
        $this->app->bind(TodoIndexInput::class, TodoIndexController::class);
        $this->app->bind(TodoIndexOutput::class, TodoIndexPresenter::class);
        $this->app->bind(TodoShowInput::class, TodoShowController::class);
        $this->app->bind(TodoShowOutput::class, TodoShowPresenter::class);
        $this->app->bind(TodoStoreInput::class, TodoStoreController::class);
        $this->app->bind(TodoStoreOutput::class, TodoStorePresenter::class);
        $this->app->bind(TodoToggleDoneInput::class, TodoToggleDoneController::class);
        $this->app->bind(TodoToggleDoneOutput::class, TodoToggleDonePresenter::class);
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
