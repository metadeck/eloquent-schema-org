<?php

namespace Metadeck\EloquentSchemaOrg;

use Illuminate\Support\ServiceProvider;

class EloquentSchemaOrgServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('eloquent-schema-org.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'eloquent-schema-org');

        // Register the main class to use with the facade
        $this->app->singleton('eloquent-schema-org', function () {
            return new EloquentSchemaOrg();
        });
    }
}
