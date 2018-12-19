<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Store\StoreInterface',
            'App\Repositories\Store\StoreRepository'
        );

        $this->app->bind(
            'App\Repositories\Shipper\ShipperInterface',
            'App\Repositories\Shipper\ShipperRepository'
        );

        $this->app->bind(
            'App\Repositories\Shipper\UserInterface',
            'App\Repositories\Shipper\UserRepository'
        );

        $this->app->bind(
            'App\Repositories\ShipperOrder\ShipperOrderInterface',
            'App\Repositories\ShipperOrder\ShipperOrderRepository'
        );
    }
}
