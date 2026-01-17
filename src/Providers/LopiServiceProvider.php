<?php

namespace HakimAsrori\Lopi\Providers;

use HakimAsrori\Lopi\LopiManager;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\{Package, PackageServiceProvider};

class LopiServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/lopi.php', 'lopi');

        $this->app->singleton('lopi', function ($app) {
            return new LopiManager($app);
        });

        $this->app->register(LopiComponentProvider::class);
    }

    public function configurePackage(Package $package): void
    {
        $package->name('lopi')->hasConfigFile();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'lopi');

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/lopi.php' => config_path('lopi.php'),
            ], 'lopi-config');

            $this->publishes([
                __DIR__ . '/../../resources/views' => resource_path('views/vendor/lopi'),
            ], 'lopi-views');

            $this->publishes([
                __DIR__ . '/../../resources/assets' => public_path('vendor/lopi'),
            ], 'lopi-assets');
        }

        $this->app->make('lopi')->discover();

        view()->share('lopi', $this->app->make('lopi'));
    }
}
