<?php

use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::controller(InvitationController::class)
    ->name('invitation.')
    ->prefix('invitation')
    ->group(function () {
        Route::get('/accept/{token}', 'accept')->name('accept');
        Route::get('/reject/{token}', 'reject')->name('reject');
    });