<?php

namespace App\Utility\Strategy;

use App\Utility\Strategy\IConfigurable;
use Illuminate\Support\Facades\DB;

class Calculable {
    public IConfigurable $configuration;
    
    public function changeConfiguration(IConfigurable $configuration) {
        $this->configuration = $configuration;
    }

    public function apply($month) {
        return $this->configuration->performCalculation($this->get($month));
    }
    
    private function get($month) {
        $employees = DB::table('employees')
                       ->get();

        for($i = 0; $i < $employees->count(); $i++) {
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
            
            $extra_day_hour = DB::table('hours')
                                ->select('hour')
                                ->where('employee_dui', '=', $employees[$i]->dui)
                                ->where('month_id', '=', $month)
                                ->where('ty', '=', 1)
                                ->sum('hour');
            $extra_night_hour = DB::table('hours')
                                  ->select('hour')
                                  ->where('employee_dui', '=', $employees[$i]->dui)
                                  ->where('month_id', '=', $month)
                                  ->where('ty', '=', 2)
                                  ->sum('hour');
            $night_hour = DB::table('hours')
                            ->select('hour')
                            ->where('employee_dui', '=', $employees[$i]->dui)
                            ->where('month_id', '=', $month)
                            ->where('ty', '=', 3)
                            ->sum('hour');

            $bonuses = DB::table('bonuses')
                         ->select('mont')
                         ->where('employee_dui', '=', $employees[$i]->dui)
                         ->where('month_id', '=', $month)
                         ->where('mont', '>=', 0)
                         ->sum('mont');
            $no_bonuses = DB::table('bonuses')
                            ->select('mont')
                            ->where('employee_dui', '=', $employees[$i]->dui)
                            ->where('month_id', '=', $month)
                            ->where('mont', '<', 0)
                            ->sum('mont');

            $annuals = DB::table('annuals')
                         ->select('id')
                         ->where('employee_dui', '=', $employees[$i]->dui)
                         ->where('month_id', '=', $month);

            $employee = (array)$employees[$i];
            $employee['salary'] = $salary;
            $employee['extra_day_hour'] = $extra_day_hour;
            $employee['extra_night_hour'] = $extra_night_hour;
            $employee['night_hour'] = $night_hour;
            $employee['bonuses'] = $bonuses;
            $employee['no_bonuses'] = $no_bonuses;

            if($annuals->count() != 0) {
                $employee['annuals'] = true;
            }else {
                $employee['annuals'] = false;
            }

            $employees[$i] = (object)$employee;
        }
        
        return $employees;
    }
}

?>
