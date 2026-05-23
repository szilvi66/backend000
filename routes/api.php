<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentApiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AutoApiController;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\OfferApiController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/upload-profile-image', [UserController::class, 'uploadProfileImage']);

    Route::get('/my-comments', [ProfileApiController::class, 'myComments']);
    Route::delete('/my-comments/{comment}', [ProfileApiController::class, 'destroyMyComment']);
    Route::post('/change-password', [ProfileApiController::class, 'changePassword']);
});

Route::get('/autok', [AutoApiController::class, 'index']);
Route::get('/autok/{auto}', [AutoApiController::class, 'show']);
Route::get('/featured-cars', [AutoApiController::class, 'featured']);

Route::get('/autok/{auto}/comments', [CommentApiController::class, 'index']);
Route::middleware('auth:api')->post('/autok/{auto}/comments', [CommentApiController::class, 'store']);

Route::post('/offers/{auto}', [OfferApiController::class, 'store']);

Route::post('/admin/login', [AdminApiController::class, 'login']);
Route::get('/admin/stats', [AdminApiController::class, 'stats']);

Route::middleware('admin.api')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminApiController::class, 'dashboard']);
    Route::get('/users', [AdminApiController::class, 'users']);

    Route::get('/cars', [AdminApiController::class, 'cars']);
    Route::post('/cars', [AdminApiController::class, 'storeCar']);
    Route::patch('/cars/{auto}', [AdminApiController::class, 'updateCar']);
    Route::delete('/cars/{auto}', [AdminApiController::class, 'destroyCar']);

    Route::get('/comments', [AdminApiController::class, 'comments']);
    Route::patch('/comments/{comment}/approve', [AdminApiController::class, 'approveComment']);
    Route::patch('/comments/{comment}/reject', [AdminApiController::class, 'rejectComment']);
    Route::delete('/comments/{comment}', [AdminApiController::class, 'destroyComment']);
});

Route::get('/autok/{auto}/comments', [CommentApiController::class, 'index']);
Route::middleware('auth:api')->post('/autok/{auto}/comments', [CommentApiController::class, 'store']);