<?php

use App\Http\Controllers\ColocationController;
use Illuminate\Support\Facades\Route;

Route::controller(ColocationController::class)
    ->middleware(['auth', 'banned'])
    ->prefix('colocations')
    ->name('colocations.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{colocation}', 'show')->name('show');
        Route::patch('/{colocation}/cancel', 'cancel')->name('cancel');
        Route::patch('/{colocation}/leave', 'leave')->name('leave');
        Route::post('/{colocation}/invite', 'invite')->name('invite');
        Route::delete('/{colocation}/users/{user}', 'removeUser')->name('removeUser');
    });