<?php

namespace Acme\PageReview;

use Illuminate\Support\ServiceProvider;

class PageReviewServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'pagereview');

        $this->app['router']->namespace('Acme\\PageReview\\Controllers')
        ->middleware(['web'])
        ->group(function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pagereview.php', 'pagereview');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['pagereview'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__.'/../config/pagereview.php' => config_path('pagereview.php'),
        ], 'pagereview.config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/acme'),
        ], 'pagereview.views');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
