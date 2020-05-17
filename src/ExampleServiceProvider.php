<?php

namespace OhSeeSoftware\LaravelPackageBoilerplate;

use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-server-analytics');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-server-analytics');
        // $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        // $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-package-boilerplate.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-package-boilerplate'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-package-boilerplate'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-package-boilerplate'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-package-boilerplate');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-package-boilerplate', function () {
            return new LaravelPackageBoilerplate;
        });
    }
}
