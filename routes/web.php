<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Member;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

require __DIR__ . '/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('password.confirm');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('profile/reset-password', [ProfileController::class, 'changePassword'])->name('profile.reset-password')->middleware('password.confirm');
    Route::post('profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    Route::group(['middleware' => [Member::class]], function () {
        Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::post('attendances', [AttendanceController::class, 'store'])->name('attendances.store');
        Route::get('attendances/records', [AttendanceController::class, 'records'])->name('attendances.records');
    });

    // User routes
    Route::group(['middleware' => [Admin::class]], function () {
        Route::get('users/{user}/reports', [UsersController::class, 'reports'])->name('users.reports');
        Route::resource('users', UsersController::class);
        Route::get('reports/monthly', [ReportsController::class, 'index'])->name('reports.monthly');
    });
});
