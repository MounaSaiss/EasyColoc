<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ColocationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/colocations', function () {
    return view('colocation.colocationCreate');
})->name('colocation');

Route::post('/colocations', [ColocationController::class, 'store'])
    ->name('colocation.store');

Route::middleware(['auth', 'banned'])->group(function () {
    Route::get('/userDashboard', function () {
        return view('user.userDashboard');
    })->name('user.dashboard');

    Route::get('/adminDashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');
});

Route::get('/adminDashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'banned', 'isAdmin'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/users/{user}/ban', [UserController::class, 'ban'])->name('admin.users.ban');
    Route::post('/admin/users/{user}/unban', [UserController::class, 'unban'])->name('admin.users.unban');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

