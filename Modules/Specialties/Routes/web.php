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


use Illuminate\Support\Facades\Route;
use Modules\Specialties\Http\Controllers\SpecialtiesController;
use Modules\Specialties\Http\Controllers\SubspecialtiesController;

app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/specialties')->group(function () {
    Route::controller(SpecialtiesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read specialties'])->name('specialties.index');
        Route::post('/', 'store')->middleware(['permisson:create specialties'])->name('specialties.store');
        Route::post('/show', 'show')->middleware(['permisson:read specialties'])->name('specialties.show');
        Route::put('/', 'update')->middleware(['permisson:update specialties'])->name('specialties.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete specialties'])->name('specialties.destroy');
    });
});


Route::middleware('auth')->prefix('admin/subspecialties')->group(function () {
    Route::controller(SubspecialtiesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read subspecialties'])->name('subspecialties.index');
        Route::post('/', 'store')->middleware(['permisson:create subspecialties'])->name('subspecialties.store');
        Route::post('/show', 'show')->middleware(['permisson:read subspecialties'])->name('subspecialties.show');
        Route::put('/', 'update')->middleware(['permisson:update subspecialties'])->name('subspecialties.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete subspecialties'])->name('subspecialties.destroy');
    });
});