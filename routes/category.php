<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)
    ->middleware(['auth', 'banned'])
    ->name('categories.')
    ->prefix('categories')
    ->group(function () {
        Route::post('/', 'store')->name('store');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });