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
use Modules\Sms\Http\Controllers\SmsController;

app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/sms')->group(function () {
    Route::controller(SmsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read sms'])->name('sms.index');
        Route::post('/', 'store')->middleware(['permisson:create sms'])->name('sms.store');
        Route::post('/show', 'show')->middleware(['permisson:read sms'])->name('sms.show');
        Route::put('/', 'update')->middleware(['permisson:update sms'])->name('sms.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete sms'])->name('sms.destroy');
    });
});
