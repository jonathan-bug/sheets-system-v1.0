<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use App\Models\Month;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Utility\Loader;

class HourController extends Controller
{
    public function index($dui) {
        try {
            if(Loader::load()) {
                $hours = Hour::where('employee_dui', $dui)
                             ->where('month_id', session('month')->id)
                             ->paginate(5);
                return view('pages.hours.index')->with('hours', $hours)->with('dui', $dui);
            }else {
                return redirect()->back();
            }
        }catch(\Exception) {
            return view('pages.hours.index')->with('hours', []);
        }
    }

    public function insert($dui) {
        return view('pages.hours.insert')->with('dui', $dui)->with('id', session('month')->id);
    }

    public function update($id) {
        $hour = Hour::find($id);
        return view('pages.hours.update')->with('hour', $hour);
    }

    public function post(Request $request) {
        $validated = Validator::make($request->all(), [
            'employee_dui' => ['required'],
            'month_id' => ['required'],
            'hour' => ['required', 'numeric']
        ], [
            'hour.required' => 'Debes ingresar las horas extras',
            'hour.numeric' => 'Las horas deben ser numericas',
            'month_id.required' => 'Debes ingresar un mes',
            'month_id.numeric' => 'El mes debe ser numerico'
        ])->validate();

        try {
            Hour::create($validated)->save();
            Session::flash('success', true);
            return redirect(route('hours', $validated['employee_dui']));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('hours', $validated['employee_dui']));
        }
    }

    public function delete($id) {
        try {
            Hour::destroy($id);
            Session::flash('success', true);
            return redirect()->back();
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect()->back();
        }
    }

    public function put(Request $request) {
        $validated = Validator::make($request->all(), [
            'id' => ['required'],
            'employee_dui' => ['required'],
            'hour' => ['required', 'numeric']
        ], [
            'hour.required' => 'Debes ingresar las horas extras',
            'hour.numeric' => 'Las horas extras deben ser numericas'
        ])->validate();
        
        try {
            $hour = Hour::find($validated['id']);
            $hour->update($validated);
            Session::flash('success', true);
            return redirect(route('hours', $validated['employee_dui']));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('hours', $validated['employee_dui']));
        }
    }
}
