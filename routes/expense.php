<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'banned'])
    ->controller(ExpenseController::class)
    ->name('expenses.')
    ->prefix('expenses')
    ->group(function () {
        Route::post('/', 'store')->name('store');
        Route::delete('/{expense}', 'destroy')->name('destroy');
        Route::patch('/{payment}/payment', 'payment')->name('payment');

    });
