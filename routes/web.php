<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/chats/{blog}', 'show')->name('show-blog');

    Route::get('/{key}', 'legalStuff')
        ->name('legal-stuff')
        ->whereIn('key', [
            'about-us',
            'privacy-policy',
            'terms-of-use',
            'disclaimer',
            'contact-us',
        ]);

    Route::get('/{category}', 'filterByCategory')->name('byCategory');
    Route::get('/', 'index')->name('landingPage');
});
