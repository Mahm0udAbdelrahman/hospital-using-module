<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyFatoorahController;
use Modules\Subscriptions\Http\Controllers\PackagesController;
use Modules\Subscriptions\Http\Controllers\SubscriptionsController;

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

Route::middleware('auth')->prefix('admin/subscriptions')->group(function() {
    Route::controller(SubscriptionsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read subscriptions'])->name('subscriptions.index');
        Route::post('/', 'store')->middleware(['permisson:create subscriptions'])->name('subscriptions.store');
        Route::post('/show', 'show')->middleware(['permisson:read subscriptions'])->name('subscriptions.show');
        Route::put('/', 'update')->middleware(['permisson:update subscriptions'])->name('subscriptions.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete subscriptions'])->name('subscriptions.destroy');
    });



    Route::get('/payment/callback', [MyFatoorahController::class, 'checkout'])->name('admin.payment.callback');
});



Route::middleware('auth')->prefix('admin/packages')->group(function() {
    Route::controller(PackagesController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read packages'])->name('packages.index');
        Route::post('/', 'store')->middleware(['permisson:create packages'])->name('packages.store');
        Route::post('/show', 'show')->middleware(['permisson:read packages'])->name('packages.show');
        Route::put('/', 'update')->middleware(['permisson:update packages'])->name('packages.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete packages'])->name('packages.destroy');
    });

});