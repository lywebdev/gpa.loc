<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function() {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('loginForm');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
});

Route::group([
    'prefix' => 'api',
    'as' => 'api.'
], function() {
    Route::group([
        'prefix' => 'imager',
        'as' => 'imager.'
    ], function() {
        Route::post('upload', [\App\Http\Controllers\Admin\Api\ImagerController::class, 'upload'])->name('upload');
        Route::post('delete', [\App\Http\Controllers\Admin\Api\ImagerController::class, 'delete'])->name('delete');
        Route::post('set-preview', [\App\Http\Controllers\Admin\Api\ImagerController::class, 'setPreview'])->name('setPreview');
    });
});


Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::get('fix-tree', [\App\Http\Controllers\Admin\HomeController::class, 'fixTree']);

Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
], function() {
    Route::resource('categories', \App\Http\Controllers\Admin\Blog\CategoryController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\Blog\PostController::class);
});

Route::resource('entrants', \App\Http\Controllers\Admin\Entrant\EntrantController::class);
