<?php

use HakimAsrori\Lopi\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('lopi.path'))
    ->middleware(config('lopi.auth.middlewares'))
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('lopi.index');

        Route::get('/{resource}', [DashboardController::class, 'resourceIndex'])->name('lopi.resource.index');
        Route::get('/{resource}/create', [DashboardController::class, 'resourceCreate'])->name('lopi.resource.create');
        Route::get('/{resource}/{record}/edit', [DashboardController::class, 'resourceEdit'])->name('lopi.resource.edit');
    });
