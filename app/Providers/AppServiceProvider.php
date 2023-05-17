<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MarvelService;
use App\Services\FavouriteComicsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarvelService::class, function ($app) {
            return new MarvelService();
        });

        $this->app->bind(FavouriteComicsService::class, function ($app) {
            $marvel = $app->make(MarvelService::class);
            return new FavouriteComicsService($marvel);
        });
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
