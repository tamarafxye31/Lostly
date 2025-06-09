<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

// Welcome Page Route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes (for guests only)
Route::prefix('admin')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout Route
Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Admin Protected Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/users', function () {
        return view('admin.users');
    });
    
    Route::get('/items', function () {
        return view('admin.items');
    });
});

// API Routes
Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    
    Route::get('/items', [ItemController::class, 'index']);
    Route::put('/items/{id}', [ItemController::class, 'update']);
    Route::delete('/items/{id}', [ItemController::class, 'destroy']);
});