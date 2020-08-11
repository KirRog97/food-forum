<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('components.heading', 'heading');
        Blade::component('components.sub-heading', 'sub-heading');
        Blade::component('components.paginate-links', 'paginate-links');
        Blade::component('components.message', 'message');
        Blade::component('components.message-empty-collection', 'message-empty-collection');
    }
}
