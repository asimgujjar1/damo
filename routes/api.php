<?php


use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login.user');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category-store', [CategoryController::class, 'store']);
    Route::post('product-store', [ProductController::class, 'store']);
    Route::post('product-show', [ProductController::class, 'show']);
    Route::post('product-update', [ProductController::class, 'update']);
    Route::post('product-delete', [ProductController::class, 'delete']);
});
