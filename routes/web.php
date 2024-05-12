<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ServiceAdminRequestsController;

Route::fallback(function () {
    return view('notfound');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');;
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('edit-profile');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/requests', [ServiceAdminRequestsController::class, 'index'])->name('admin-requests.index');
    Route::get('/admin/requests/accept', [ServiceAdminRequestsController::class, 'accept'])->name('admin-requests.accept');
    Route::get('/admin/requests/reject', [ServiceAdminRequestsController::class, 'reject'])->name('admin-requests.reject');
    Route::put('/admin/requests/{request_id}/accept', [ServiceAdminRequestsController::class, 'acc'])->name('admin-requests.acc');
    Route::put('/admin/requests/{request_id}/reject', [ServiceAdminRequestsController::class, 're'])->name('admin-requests.re');
});
Route::get('/admin/home', [DashboardController::class, 'admin'])->name('admin-home');
Route::get('/user/home/{id}', [DashboardController::class, 'user'])->name('user-home');
Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::get('/services/search', [ServiceController::class, 'search'])->name('services.search');
Route::resource('categories', CategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('requests', ServiceRequestController::class);

