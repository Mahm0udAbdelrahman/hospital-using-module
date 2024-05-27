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
use Modules\Blogs\Http\Controllers\BlogsController;
use Modules\Blogs\Http\Controllers\SectionsController;

app()->make('router')->aliasMiddleware('permisson', \Spatie\Permission\Middlewares\PermissionMiddleware::class);

Route::middleware('auth')->prefix('admin/blogs')->group(function() {
    Route::controller(BlogsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read blogs'])->name('blogs.index');
        Route::get('/creat', 'create')->middleware(['permisson:create blogs'])->name('blogs.create');
        Route::post('/', 'store')->middleware(['permisson:create blogs'])->name('blogs.store');
        Route::post('/show/{id}', 'show')->middleware(['permisson:read blogs'])->name('blogs.show');
        Route::get('/edit/{id}', 'edit')->middleware(['permisson:edit blogs'])->name('blogs.edit');
        Route::put('/{id}', 'update')->middleware(['permisson:update blogs'])->name('blogs.update');
        Route::delete('/{id}', 'destroy')->middleware(['permisson:delete blogs'])->name('blogs.destroy');
    });
});



Route::middleware('auth')->prefix('admin/sections')->group(function() {
    Route::controller(SectionsController::class)->group(function () {
        Route::get('/', 'index')->middleware(['permisson:read sections'])->name('sections.index');
        Route::post('/', 'store')->middleware(['permisson:create sections'])->name('sections.store');
        Route::post('/show', 'show')->middleware(['permisson:read sections'])->name('sections.show');
        Route::put('/', 'update')->middleware(['permisson:update sections'])->name('sections.update');
        Route::delete('/', 'destroy')->middleware(['permisson:delete sections'])->name('sections.destroy');
    });
});