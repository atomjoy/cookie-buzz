<?php

namespace CookieBuzz;

use Illuminate\Support\ServiceProvider;

class CookieBuzzServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'cookie-buzz');

        // Facade shortcut accesor class binding
        $this->app->singleton('cookie-buzz', function ($app) {
            return new CookieBuzz($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureLoads();
        $this->configurePublishing();
    }

    /**
     * Configure the loads offered by the application.
     *
     * @return void
     */
    protected function configureLoads()
    {
        // Register theme, views, namespace cookie-buzz::banner.default
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'cookie-buzz');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'cookie-buzz');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang');
    }

    /**
     * Configure the publishable resources offered by the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        // Overwrite data
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('cookie-buzz.php'),
            ], ['lara', 'cookie-buzz-config']);

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/cookie-buzz')
            ], 'cookie-buzz-views');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/cookie-buzz')
            ], 'cookie-buzz-public');

            $this->publishes([
                __DIR__ . '/../lang' => base_path('lang/vendor/cookie-buzz'),
            ], 'cookie-buzz-lang');
        }
    }
}
