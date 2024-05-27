<?php

use Modules\Subscribers\Http\Controllers\SubscribersController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/subscribers')->group(function() {
    Route::controller(SubscribersController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read subscribers'])->name('subscribers.index');

        Route::post('/', 'store')->middleware(['permisson:create subscribers'])->name('subscribers.store');
        Route::post('/show', 'show')->middleware(['permisson:read subscribers'])->name('subscribers.show');
        Route::put('/', 'update')->middleware(['permisson:update subscribers'])->name('subscribers.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete subscribers'])->name('subscribers.destroy');
    });
});