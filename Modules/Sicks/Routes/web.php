<?php

use Illuminate\Support\Facades\Route;
use Modules\Sicks\Http\Controllers\LoginController;
use Modules\Sicks\Http\Controllers\SicksController;
use Modules\Sicks\Http\Controllers\RequestsController;

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

Route::middleware('auth')->prefix('admin/sicks')->group(function() {
    Route::controller(SicksController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read sicks'])->name('sicks.index');
        Route::post('/', 'store')->middleware(['permisson:create sicks'])->name('sicks.store');
        Route::post('/show', 'show')->middleware(['permisson:read sicks'])->name('sicks.show');
        Route::put('/', 'update')->middleware(['permisson:update sicks'])->name('sicks.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete sicks'])->name('sicks.destroy');
    });
    Route::resources([
        'requests'=> RequestsController::class,

    ]);
    Route::get('login',[LoginController::class,'index']);

});