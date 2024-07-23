<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalcsController extends Controller
{
    public function index() {
        // employees
        $employees = DB::table('employees')
                       ->get();

        for($i = 0; $i < $employees->count(); $i++) {
            // salary
            $salary = DB::table('salaries')
                        ->select('salary')
                        ->where('employee_dui', '=', $employees[$i]->dui)
                        ->orderByDesc('last')
                        ->first();
            
            // hours
            $hours = DB::table('hours')
                       ->select('hour')
                       ->where('employee_dui', '=', $employees[$i]->dui)
                       ->where('month_id', '=', session('month')->id)
                       ->sum('hour');

            // bonus
            $bonuses = DB::table('bonuses')
                         ->select('mont')
                         ->where('employee_dui', '=', $employees[$i]->dui)
                         ->where('month_id', '=', session('month')->id)
                         ->sum('mont');

            $employee = (array)$employees[$i];
            $employee['salary'] = $salary->salary;
            $employee['hours'] = $hours;
            $employee['bonuses'] = $bonuses;

            $employees[$i] = (object)$employee;
        }
        
        return $employees;
    }
}
