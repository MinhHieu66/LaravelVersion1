<?php

use App\Http\Controllers\Ajax\LocationController;
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
Route::group(['prefix' => 'user'], function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('create', [UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('store', [UserController::class, 'store'])->name('user.store')->middleware('admin');
});

/* AJAX */
Route::get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('admin');

Route::get('admin', [AuthController::class, 'index'])->name('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
