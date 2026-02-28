<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ExpenseController;
USE App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//show colocation creation form
Route::get('/colocations', function () {
    return view('colocation.colocationCreate');
})->name('colocation');

//store colocation data in database
Route::post('/colocations', [ColocationController::class, 'store'])
    ->name('colocation.store');

//show colocation after creation
Route::get('/colocations/{colocation}', function ($colocation) {
    return view('colocation.colocationShow', compact('colocation'));
})->name('colocation.show');

Route::get('/colocations', [ColocationController::class, 'list'])
    ->name('colocation.list');

Route::get('/colocations/{colocation}', [ColocationController::class, 'index'])
    ->name('colocation.colocationShow');

// Accepter l'invitation
Route::get('/invitation/accept/{token}', [InvitationController::class, 'accept'])->name('invitation.accept');

// Refuser l'invitation
Route::get('/invitation/reject/{token}', [InvitationController::class, 'reject'])->name('invitation.reject');

Route::patch('/colocations/{colocation}/cancel', [ColocationController::class, 'cancel'])
    ->name('colocation.cancel');

Route::post('/colocations/{colocation}/invite', [ColocationController::class, 'invite'])
    ->name('colocation.invite');

// store of expense 
Route::post('/expenses', [ExpenseController::class, 'store'])
    ->name('expenses.store');

//delete of user retirer from colocation
Route::delete('/colocations/{colocation}/users/{user}', [ColocationController::class, 'removeUser'])
    ->name('colocation.removeUser');

//delete of expense
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])
    ->name('expenses.destroy');

//show all expenses of user
    Route::get('/userDashboard', [UserController::class, 'listAllExpenses'])
        ->name('user.expenses');
// show colocation details and also the categories of this colocation
Route::get('/colocations/{id}', [ColocationController::class, 'show'])->name('colocations.show');
//gestion des categories
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

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

Route::middleware(['auth', 'isAdmin'])->group(function () {
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
