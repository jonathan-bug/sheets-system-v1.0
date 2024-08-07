<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility\Loader;
use Illuminate\Support\Facades\DB;
use App\Utility\Calculable2024;

class DashboardController extends Controller
{
    public function index() {
        Loader::load();

        if(session('month') != null) {
            $calculable = new Calculable2024();
            $sheets = collect($calculable->apply(session('month')->id));
            
            $v_emp_afp = $sheets->sum('v_emp_afp');
            $v_emp_isss = $sheets->sum('v_emp_isss');
            $v_pat_afp = $sheets->sum('v_pat_afp');
            $v_pat_isss = $sheets->sum('v_pat_isss');
            $v_count = $sheets->count();
            $v_salary_total = $sheets->sum('salary');
            $v_extra_day_hour = $sheets->sum('extra_day_hour');
            $v_extra_night_hour = $sheets->sum('extra_night_hour');
            $v_night_hour = $sheets->sum('night_hour');
            $v_months_count = DB::table('months')->count();
            
            return view('pages.dashboard.index')->with('v_emp_afp', $v_emp_afp)
                                                ->with('v_emp_isss', $v_emp_isss)
                                                ->with('v_pat_afp', $v_pat_afp)
                                                ->with('v_pat_isss', $v_pat_isss)
                                                ->with('v_count', $v_count)
                                                ->with('v_salary_total', $v_salary_total)
                                                ->with('v_extra_day_hour', $v_extra_day_hour)
                                                ->with('v_extra_night_hour', $v_extra_night_hour)
                                                ->with('v_night_hour', $v_night_hour)
                                                ->with('v_months_count', $v_months_count);
        }else {
            return view('pages.dashboard.index')->with('v_emp_afp', null);
        }
        
    }

    public function values() {
        Loader::load();
        $calculable = new Calculable2024();
        $sheets = collect($calculable->apply(session('month')->id));

        $values = [
            'v_emp_afp' => $sheets->sum('v_emp_afp'),
            'v_emp_isss' => $sheets->sum('v_emp_isss'),
            'v_pat_afp' => $sheets->sum('v_pat_afp'),
            'v_pat_isss' => $sheets->sum('v_pat_isss')
        ];

        return $values;
    }
}
