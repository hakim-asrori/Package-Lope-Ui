<?php

namespace HakimAsrori\Lopi\Providers;

use Illuminate\Support\Facades\Blade;
use HakimAsrori\Lopi\Services\{AlertCvaService, BadgeCvaService, ButtonCvaService, DialogCvaService};
use Spatie\LaravelPackageTools\{Package, PackageServiceProvider};

class LopiComponentProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void {}

    public function register()
    {
        $this->app->singleton(AlertCvaService::class, fn() => AlertCvaService::new());
        $this->app->singleton(BadgeCvaService::class, fn() => BadgeCvaService::new());
        $this->app->singleton(ButtonCvaService::class, fn() => ButtonCvaService::new());
        $this->app->singleton(DialogCvaService::class, fn() => DialogCvaService::new());
    }

    public function boot()
    {
        Blade::anonymousComponentPath(
            __DIR__ . '/../../resources/views/components',
            'lopi'
        );
        Blade::anonymousComponentPath(
            __DIR__ . '/../../resources/views/livewire',
            'lopi-livewire'
        );
    }
}
