<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\SalaryController;

Route::get('/', [DashboardController::class, 'index'])
     ->name('dashboard');

// employees
Route::get('/employees', [EmployeeController::class, 'index'])
     ->name('employees');
Route::get('/employees/insert', [EmployeeController::class, 'insert'])
     ->name('employees.insert');
Route::get('/employees/update/{dui}', [EmployeeController::class, 'update'])
     ->name('employees.update');

Route::get('/api/employees/{dui}', [EmployeeController::class, 'get'])
     ->name('api.employees.get');
Route::post('/api/employees', [EmployeeController::class, 'post'])
     ->name('api.employees.post');
Route::delete('/api/employees/{dui}', [EmployeeController::class, 'delete'])
     ->name('api.employees.delete');
Route::put('/api/employees', [EmployeeController::class, 'put'])
     ->name('api.employees.put');

// months
Route::get('/months', [MonthController::class, 'index'])
     ->name('months');
Route::get('/months/insert', [MonthController::class, 'insert'])
     ->name('months.insert');
Route::get('/months/update/{id}', [MonthController::class, 'update'])
     ->name('months.update');

Route::get('/api/months/{id}', [MonthController::class, 'get'])
     ->name('api.months.get');
Route::post('/api/months', [MonthController::class, 'post'])
     ->name('api.months.post');
Route::delete('/api/months/{id}', [MonthController::class, 'delete'])
     ->name('api.months.delete');
Route::put('/api/months', [MonthController::class, 'put'])
     ->name('api.months.put');

// salary
Route::get('/salaries/{dui}', [SalaryController::class, 'index'])
     ->name('salaries');
Route::get('/salaries/insert/{dui}', [SalaryController::class, 'insert'])
     ->name('salaries.insert');
Route::get('/salaries/update/{id}', [SalaryController::class, 'update'])
     ->name('salaries.update');

Route::get('/api/salaries/get/{id}');
Route::post('/api/salaries/post', [SalaryController::class, 'post'])
     ->name('api.salaries.post');
Route::delete('/api/salaries/delete/{id}', [SalaryController::class, 'delete'])
     ->name('api.salaries.delete');
Route::put('/api/salaries/put', [SalaryController::class, 'put'])
     ->name('api.salaries.put');
