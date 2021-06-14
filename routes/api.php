<?php

use App\Http\Controllers\Api\EmployeeController;
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

Route::put('employees/{uuid}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('employees/{uuid}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::post('employees', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employees/{uuid}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('employees', [EmployeeController::class, 'index'])->name('employee.index');