<?php

use HakimAsrori\Lopi\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('path'))
    ->middleware(config('auth.middlewares'))
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('my-dashboard.index');

        Route::get('/{resource}', [DashboardController::class, 'resourceIndex'])->name('my-dashboard.resource.index');
        Route::get('/{resource}/create', [DashboardController::class, 'resourceCreate'])->name('my-dashboard.resource.create');
        Route::get('/{resource}/{record}/edit', [DashboardController::class, 'resourceEdit'])->name('my-dashboard.resource.edit');
    });
