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
use Modules\Countries\Http\Controllers\CitiesController;
use Modules\Countries\Http\Controllers\CountriesController;

app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/countries')->group(function() {
    Route::controller(CountriesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read countries'])->name('countries.index');
        Route::post('/', 'store')->middleware(['permisson:create countries'])->name('countries.store');
        Route::post('/show', 'show')->middleware(['permisson:read countries'])->name('countries.show');
        Route::put('/', 'update')->middleware(['permisson:update countries'])->name('countries.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete countries'])->name('countries.destroy');
    });
});
Route::middleware('auth')->prefix('admin/cities')->group(function() {
    Route::controller(CitiesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read cities'])->name('cities.index');
        Route::post('/', 'store')->middleware(['permisson:create cities'])->name('cities.store');
        Route::post('/show', 'show')->middleware(['permisson:read cities'])->name('cities.show');
        Route::put('/', 'update')->middleware(['permisson:update cities'])->name('cities.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete cities'])->name('cities.destroy');
    });
});