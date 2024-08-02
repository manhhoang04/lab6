<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//CRUD user
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

//Route trang thông tin user
Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
    //Cập nhật thông tin user
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');
    //Cập nhật password
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::post('/user/change-password', [UserController::class, 'postChangePassword'])->name('user.postChangePassword');
});
Route::middleware(['auth', 'check.active'])->group(function () {
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
    //Cập nhật thông tin user
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');
    //Cập nhật password
    Route::get('/user/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::post('/user/change-password', [UserController::class, 'postChangePassword'])->name('user.postChangePassword');
    
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
        Route::put('/admin/users/{user}/toggle', [AdminController::class, 'toggleActive'])->name('admin.toggleActive');
    });
});
