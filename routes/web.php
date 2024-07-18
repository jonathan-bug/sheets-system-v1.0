<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;

Route::get('/', [DashboardController::class, 'index'])
     ->name('dashboard');

// views
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/employees/insert', [EmployeeController::class, 'insert'])->name('employees.insert');
Route::get('/employees/update/{dui}', [EmployeeController::class, 'update'])->name('employees.update');

// endpoints
Route::get('/api/employees/{dui}', [EmployeeController::class, 'get'])->name('api.employees.get');
Route::post('/api/employees', [EmployeeController::class, 'post'])->name('api.employees.post');
Route::delete('/api/employees/{dui}', [EmployeeController::class, 'delete'])->name('api.employees.delete');
Route::put('/api/employees', [EmployeeController::class, 'put'])->name('api.employees.put');
