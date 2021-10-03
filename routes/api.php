<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * For authentication
 */
Route::post('sanctum/token', [AuthController::class, 'auth'])->name('auth');

/**
 * Authenticated Route
 */
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('sanctum/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('sanctum/me', [AuthController::class, 'me'])->name('me');
    
    Route::delete('accounts/{uuid}', [AccountController::class, 'destroy'])->name('account.destroy');
    Route::put('accounts/{uuid}', [AccountController::class, 'update'])->name('account.update');
    Route::post('accounts', [AccountController::class, 'store'])->name('account.store');
    Route::get('accounts/{uuid}', [AccountController::class, 'show'])->name('account.show');
    Route::get('accounts', [AccountController::class, 'index'])->name('account.index');
    
    Route::delete('banks/{uuid}', [BankController::class, 'destroy'])->name('bank.destroy');
    Route::put('banks/{uuid}', [BankController::class, 'update'])->name('bank.update');
    Route::post('banks', [BankController::class, 'store'])->name('bank.store');
    Route::get('banks/{uuid}', [BankController::class, 'show'])->name('bank.show');
    Route::get('banks', [BankController::class, 'index'])->name('bank.index');
    
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
    
    Route::delete('transactions/{uuid}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::put('transactions/{uuid}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::post('transactions', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('transactions/{uuid}', [TransactionController::class, 'show'])->name('transaction.show');
    Route::get('transactions', [TransactionController::class, 'index'])->name('transaction.index');
    
    Route::post('transactions/file', [TransactionController::class, 'uploadTransactions'])->name('transaction.store.file');
});


