<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
], function() {
    Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('{slug}', [\App\Http\Controllers\BlogController::class, 'post'])->name('post');
});


Route::group([
    'prefix' => 'distance-education',
    'as' => 'distanceEducation.'
], function() {
    Route::get('covid-information', [\App\Http\Controllers\DistanceEducation\MainController::class ,'covidPage'])->name('covid');
});
