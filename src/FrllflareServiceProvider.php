<?php

namespace Freemancontingent\Laravellogflare;

use Illuminate\Support\ServiceProvider;

class FrllflareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'logflare');
        $this->publishes([
            __DIR__.'/config/logflare.php' => config_path('logflare.php'),
            __DIR__.'/views' => base_path('resources/views/freemancontingent/logflare/')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Freemancontingent\Laravellogflare\FrlaravellogflareController');
    }
}
