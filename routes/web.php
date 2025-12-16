<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;









Route::get('/', [IndexController::class, 'showIndex'])->name('index');
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/changepassword', [AuthController::class, 'changePassword'])->name('changepassword');

 
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/admin/posko', [DashboardController::class, 'showDataPosko'])->name('posko');
    Route::post('/admin/posko-store', [DashboardController::class, 'store'])->name('posko.store');
Route::post('admin/posko-update/{id}', [DashboardController::class, 'update'])->name('posko-update');
        

    



});