<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// middleware
use App\Http\Middleware\checkOwnerMiddleware;
use App\Http\Middleware\checkAdminMiddleware;
use App\Http\Middleware\userMiddleware;

// AUTH
Route::get('/login', [AuthController::class, 'loginPage']);
Route::get('/register', [AuthController::class, 'registerPage']);

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);



// USER
Route::get('/', [UserController::class, 'index']);
Route::get('/wishlist', [UserController::class, 'showWishlist'])->middleware(userMiddleware::class);
Route::get('/profile', [UserController::class, 'showProfile'])->middleware(userMiddleware::class);;
Route::get('/product/{id}', [UserController::class, 'productDetail']);



// ADMIN
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(checkAdminMiddleware::class);
Route::get('/admin/property', [AdminController::class, 'showProperty'])->middleware(checkAdminMiddleware::class);
Route::get('/admin/users', [AdminController::class, 'showUser'])->middleware(checkAdminMiddleware::class);


// OWNER

Route::get('/owner/dashboard', [OwnerController::class, 'index'])->middleware(checkOwnerMiddleware::class);
Route::get('/owner/add', [OwnerController::class, 'tambahData'])->middleware(checkOwnerMiddleware::class);
Route::get('/owner/edit/{id}', [OwnerController::class, 'editData'])->middleware(checkOwnerMiddleware::class);

