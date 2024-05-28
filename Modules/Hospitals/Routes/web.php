<?php

use Illuminate\Support\Facades\Route;
use Modules\Hospitals\Http\Controllers\HospitalsController;

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


app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/hospitals')->group(function() {
    Route::controller(HospitalsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read hospitals'])->name('hospitals.index');
        Route::post('/', 'store')->middleware(['permisson:create hospitals'])->name('hospitals.store');
        Route::post('/show', 'show')->middleware(['permisson:read hospitals'])->name('hospitals.show');
        Route::put('/', 'update')->middleware(['permisson:update hospitals'])->name('hospitals.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete hospitals'])->name('hospitals.destroy');
    });
    Route::resources([
        'doctors'=>
    ]);
});