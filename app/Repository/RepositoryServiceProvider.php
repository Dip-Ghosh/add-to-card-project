<?php

namespace App\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\Base\BaseInterface',
            'App\Repository\Base\BaseRepository'
        );

        $this->app->bind(
            'App\Repository\Category\CategoryInterface',
            'App\Repository\Category\CategoryRepository'
        );
        $this->app->bind(
            'App\Repository\Product\ProductInterface',
            'App\Repository\Product\ProductRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
