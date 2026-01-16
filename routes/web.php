<?php

use Illuminate\Support\Facades\{File, Route};
use HakimAsrori\Lopi\Http\Controllers\DashboardController;

Route::prefix(config('lopi.path'))
    ->middleware(config('lopi.auth.middlewares'))
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('lopi.index');

        Route::get('/{resource}', [DashboardController::class, 'resourceIndex'])->name('lopi.resource.index');
        Route::get('/{resource}/create', [DashboardController::class, 'resourceCreate'])->name('lopi.resource.create');
        Route::get('/{resource}/{record}/edit', [DashboardController::class, 'resourceEdit'])->name('lopi.resource.edit');
    });

Route::get('/lopi-assets/{path}', function ($path) {
    $fullPath = __DIR__ . '/../resources/dist/' . $path;

    if (!File::exists($fullPath)) {
        abort(404);
    }

    $file = File::get($fullPath);
    $type = File::mimeType($fullPath);

    return response($file)->header('Content-Type', $type);
})->where('path', '.*')->name('lopi.assets');
