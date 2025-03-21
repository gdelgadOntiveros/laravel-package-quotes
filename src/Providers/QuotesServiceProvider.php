<?php

namespace Gdelgadontiveros\LaravelPackageQuotes\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class QuotesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/quotes.php','quotes'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->configureRateLimiting();

        // load routes for package
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'quotes');

        // Publish method
        $this->publishesPaths();

    }

    /**
     * Configure the rate limiters for the application.
     */
    // protected function configureRateLimiting(): void
    // {
    //     RateLimiter::for('api', function (Request $request) {
    //         return Limit::perMinute( config('quotes.request_max') );
    //     });
    // }

    /**
     * Publish paths.
     */
    protected function publishesPaths(): void
    {
        // publish path config
        $this->publishes([
            __DIR__ . '/../config/quotes.php' => config_path('quotes.php'),
        ], 'quotes');

        // rutas
        $this->publishes([
            __DIR__ . '/../routes/web.php' => base_path('routes/quotes.php'),
        ], 'quotes-routes');

        // vista
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/quotes'),
        ], 'quotes-views');

        // assets
        $this->publishes([
            __DIR__ . '/../../dist' => public_path('vendor/quotes'),
        ], 'quotes-ui');

        // test
        $this->publishes([
            __DIR__ . '/../../tests/Feature' => base_path('tests/Feature'),
        ], 'quotes-tests');

    }
}
