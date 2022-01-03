<?php

namespace Udiptaweb\LaravelMultilang;
use Illuminate\Support\ServiceProvider;

class LaravelMultilangServiceProvider extends ServiceProvider{
    
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-multilang');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-multilang');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/laravel-multilang.php' => config_path('laravel-multilang.php'),
            ], 'config');
            // Publishing the migrations.
            $this->publishes([
                __DIR__.'/database/migrations/2022_01_03_102303_create_translations_table.php' => database_path('migrations/2022_01_03_102303_create_translations_table.php'),
            ]);

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-multilang'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-multilang'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-multilang'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    public function register()
    {
        # code...
    }
}

?>