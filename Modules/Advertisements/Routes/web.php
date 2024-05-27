<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Modules\Advertisements\Http\Controllers\AdvertisementsController;
use Illuminate\Support\Facades\Route;
app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/advertisements')->group(function() {
    Route::controller(AdvertisementsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read advertisements'])->name('advertisements.index');
        Route::post('/', 'store')->middleware(['permisson:create advertisements'])->name('advertisements.store');
        Route::post('/show', 'show')->middleware(['permisson:read advertisements'])->name('advertisements.show');
        Route::put('/', 'update')->middleware(['permisson:update advertisements'])->name('advertisements.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete advertisements'])->name('advertisements.destroy');
    });
});