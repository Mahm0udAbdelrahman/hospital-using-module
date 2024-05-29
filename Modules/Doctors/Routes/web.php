<?php

use Illuminate\Support\Facades\Route;
use Modules\Doctors\Http\Controllers\LoginController;
use Modules\Doctors\Http\Controllers\SicksController;
use Modules\Doctors\Http\Controllers\DoctorsController;
use Modules\Doctors\Http\Controllers\RequestsController;

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

Route::middleware('auth')->prefix('admin/doctors')->group(function() {
    Route::controller(DoctorsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read doctors'])->name('doctors.index');
        Route::post('/', 'store')->middleware(['permisson:create doctors'])->name('doctors.store');
        Route::post('/show', 'show')->middleware(['permisson:read doctors'])->name('doctors.show');
        Route::put('/', 'update')->middleware(['permisson:update doctors'])->name('doctors.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete doctors'])->name('doctors.destroy');
    });
    Route::resources([
        'sicks'=> SicksController::class,
        'requests'=> RequestsController::class,

    ]);
    Route::get('login',[LoginController::class,'index']);

});