<?php

use Illuminate\Support\Facades\Route;
use Modules\Hospitals\Http\Controllers\SicksController;
use Modules\Hospitals\Http\Controllers\DoctorsController;
use Modules\Hospitals\Http\Controllers\RequestsController;
use Modules\Hospitals\Http\Controllers\HospitalsController;
use Modules\Hospitals\Http\Controllers\LoginController;

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
        'doctors'=> DoctorsController::class,
        'sicks'=> SicksController::class,
        'requests'=> RequestsController::class,
      
    ]);
    Route::get('login',[LoginController::class,'index']);

});