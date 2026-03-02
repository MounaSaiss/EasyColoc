<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/colocation.php';
require __DIR__ . '/expense.php';
require __DIR__ . '/category.php';
require __DIR__ . '/invitation.php';
require __DIR__ . '/admin.php';
