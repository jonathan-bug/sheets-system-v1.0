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
            $salary = null;
            
            try {
                $salary = DB::table('salaries')
                            ->select('salary')
                            ->where('employee_dui', '=', $employees[$i]->dui)
                            ->orderByDesc('last')
                            ->first()->salary;
            }catch(\Exception) {
                $salary = 0;
            }
            
            // hours
            $extra_day_hour = DB::table('hours')
                                ->select('hour')
                                ->where('employee_dui', '=', $employees[$i]->dui)
                                ->where('month_id', '=', session('month')->id)
                                ->where('ty', '=', 1)
                                ->sum('hour');
            $extra_night_hour = DB::table('hours')
                                  ->select('hour')
                                  ->where('employee_dui', '=', $employees[$i]->dui)
                                  ->where('month_id', '=', session('month')->id)
                                  ->where('ty', '=', 2)
                                  ->sum('hour');
            $night_hour = DB::table('hours')
                            ->select('hour')
                            ->where('employee_dui', '=', $employees[$i]->dui)
                            ->where('month_id', '=', session('month')->id)
                            ->where('ty', '=', 3)
                            ->sum('hour');

            // bonus
            $bonuses = DB::table('bonuses')
                         ->select('mont')
                         ->where('employee_dui', '=', $employees[$i]->dui)
                         ->where('month_id', '=', session('month')->id)
                         ->where('mont', '>=', 0)
                         ->sum('mont');
            $no_bonuses = DB::table('bonuses')
                            ->select('mont')
                            ->where('employee_dui', '=', $employees[$i]->dui)
                            ->where('month_id', '=', session('month')->id)
                            ->where('mont', '<', 0)
                            ->sum('mont');

            // calc every value
            $employee = (array)$employees[$i];
            $employee['salary'] = $salary;
            $employee['extra_day_hour'] = $extra_day_hour;
            $employee['extra_night_hour'] = $extra_night_hour;
            $employee['night_hour'] = $night_hour;
            $employee['bonuses'] = $bonuses;
            $employee['no_bonuses'] = $no_bonuses;

            $employees[$i] = (object)$employee;
        }
        
        return $employees;
    }
}
