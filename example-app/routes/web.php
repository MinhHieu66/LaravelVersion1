<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* BACKEND ROUTE */
Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('admin');

/* USER */
Route::get('user/index', [UserController::class, 'index'])->name('user.index')->middleware('admin');

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');