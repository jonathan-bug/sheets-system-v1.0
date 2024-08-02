<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Month;
use App\Models\Employee;
use App\Models\Annual;
use Illuminate\Support\Carbon;
use App\Utility\Loader;

class MonthController extends Controller
{
    public function index() {
        try {
            Loader::load();
            $months = Month::paginate(5);
            return view('pages.months.index')->with('months', $months);
        }catch(\Exception) {
            return view('pages.months.index')->with('months', null);
        }
    }
    public function insert() {
        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        
        return view('pages.months.insert')->with('months', $months);
    }
    public function update($id) {
        $month = Month::find($id);
        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        
        return view('pages.months.update')->with('month', $month)->with('months', $months);
    }

    public function get($id) {}
    
    public function post(Request $request) {
        $validated = Validator::make($request->all(), [
            'month' => ['required'],
            'year' => ['required']
        ], [
            'month' => 'Debes ingresar un mes',
            'year' => 'Debes ingresar un año'
        ])->validate();

        try {
            // add new month
            $validated['last'] = Carbon::now()->format('Y-m-d H:i:s');
            $month = Month::create($validated);
            $month->save();
            
            // all the employees
            $employees = Employee::all();

            // check if the calculated date is bigger than today
            forEach($employees as $employee) {
                // if it is bigger then add new annuals
                if(today() > new Carbon($employee->calculated_date)) {
                    // add annuals
                    Annual::create([
                        'employee_dui' => $employee->dui,
                        'month_id' => $month->id
                    ])->save();

                    // update employee calculated date
                    $employee->calculated_date = (new Carbon(today()))->addYear(1)->format('Y-m-d');
                    $employee->save();
                }
            }

            // load new month
            Loader::reload();
            
            Session::flash('success', true);
            return redirect(route('months'));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('months'));
        }
    }
    public function delete($id) {
        try {
            Month::find($id)->delete();
            Session::flash('success', true);
            session(['month' => null]);
            return redirect(route('months'));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('months'));
        }
    }
    
    public function put(Request $request) {
        $validated = Validator::make($request->all(), [
            'id' => ['required'],
            'month' => ['required'],
            'year' => ['required']
        ], [
            'id' => 'Debes ingresar un id',
            'month' => 'Debes ingresar un mes',
            'year' => 'Debes ingresar un año'
        ])->validate();

        try {
            $month = Month::find($validated['id']);
            $month->update($validated);
            Loader::reload();
            
            Session::flash('success', true);
            return redirect(route('months'));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('months'));
        }
    }

    public function current($id) {
        try {
            $lastMonth = Month::find($id);
            session(['month' => $lastMonth]);
            Session::flash('month_success', true);
            return redirect()->back();
        }catch(\Exception) {
            Session::flash('month_success', false);
            return redirect()->back();
        }
    }
}
