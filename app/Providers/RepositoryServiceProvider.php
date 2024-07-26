<?php

namespace App\Providers;

use App\Contracts\Repositories\PopupRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'App\Repositories\ProductRepositoryInterface',
            'App\RepositoryEloquent\ProductRepository',
        );
        $this->app->singleton(
            'App\Repositories\CategoryRepositoryInterface',
            'App\RepositoryEloquent\CategoryRepository',
        );
        $this->app->singleton(
            'App\Repositories\AffiliateRepositoryInterface',
            'App\RepositoryEloquent\AffiliateRepository',
        );
        $this->app->singleton(
            'App\Repositories\SettingRepositoryInterface',
            'App\RepositoryEloquent\SettingRepository',
        );
        $this->app->singleton(
            'App\Repositories\BiddingRepositoryInterface',
            'App\RepositoryEloquent\BiddingRepository',
        );
    }
}
