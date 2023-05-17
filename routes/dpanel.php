<?php

use App\Http\Controllers\Dpanel\BlogController;
use App\Http\Controllers\Dpanel\CategoryController;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Dpanel')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('category', CategoryController::class)->only('index', 'store', 'update');
    Route::resource('blog', BlogController::class)->except('show');
});
Route::get('/logout', [\DD4You\Dpanel\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::resource('global-settings', \DD4You\Dpanel\Http\Controllers\GlobalSettingController::class)->only('index', 'store');
