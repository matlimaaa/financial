<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('posts/{uuid}', [PostController::class, 'destroy'])->name('post.destroy');
Route::put('posts/{uuid}', [PostController::class, 'update'])->name('post.update');
Route::post('posts', [PostController::class, 'store'])->name('post.store');
Route::get('posts/{uuid}', [PostController::class, 'show'])->name('post.show');
Route::get('posts', [PostController::class, 'index'])->name('post.index');

Route::delete('users/{uuid}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('users/{uuid}', [UserController::class, 'update'])->name('user.update');
Route::post('users', [UserController::class, 'store'])->name('user.store');
Route::get('users/{uuid}', [UserController::class, 'show'])->name('user.show');
Route::get('users', [UserController::class, 'index'])->name('user.index');

Route::delete('employees/{uuid}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::put('employees/{uuid}', [EmployeeController::class, 'update'])->name('employee.update');
Route::post('employees', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employees/{uuid}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');