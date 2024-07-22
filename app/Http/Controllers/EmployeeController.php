<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Employee;
use App\Utility\Loader;

class EmployeeController extends Controller
{
    public function index() {
        try {
            Loader::load();
            $employees = Employee::paginate(5);
            return view('pages.employees.index')->with('employees', $employees);
        }catch(\Exception) {
            return view('pages.employees.index')->with('employees', null);
        }
    }

    public function delete($dui) {
        try {
            Employee::destroy($dui);
            Session::flash('success', true);
        }catch(\Exception) {
            Session::flash('success', false);
        }

        return redirect(route('employees'));
    }

    public function insert() {
        return view('pages.employees.insert');
    }

    public function update($dui) {
        try {
            $employee = Employee::find($dui);
            return view('pages.employees.update')->with('employee', $employee);
        }catch(\Exception) {
            return view('pages.employees.update');
        }
    }

    public function post(Request $request) {
        $validated = Validator::make($request->all(), [
            'dui' => ['required'],
            'first_name' => ['required'],
            'second_name' => ['required'],
            'first_lastname' => ['required'],
            'second_lastname' => ['required'],
            'birth_date' => ['required'],
            'entry_date' => ['required']
        ], [
            'dui' => 'Debes ingresar un DUI',
            'first_name' => 'Debes ingresar un primer nombre',
            'second_name' => 'Debes ingresar un segundo nombre',
            'first_lastname' => 'Debes ingresar un primer apellido',
            'second_lastname' => 'Debes ingresar un segundo apellido',
            'birth_date' => 'Debes ingresar una fecha de nacimiento',
            'entry_date' => 'Debes ingresar una fecha de ingreso'
        ])->validate();
        
        try {
            $date = new Carbon($validated['entry_date']);
            $date->addYear(1);
            $validated['calculated_date'] = $date->format('Y-m-d');
            Employee::create($validated)->save();
            
            Session::flash('success', true);
            return redirect(route('employees'));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('employees'));
        }

    }

    public function put(Request $request) {
        $validated = Validator::make($request->all(), [
            'dui' => ['required'],
            'first_name' => ['required'],
            'second_name' => ['required'],
            'first_lastname' => ['required'],
            'second_lastname' => ['required'],
            'birth_date' => ['required'],
            'entry_date' => ['required']
        ], [
            'dui' => 'Debes ingresar un DUI',
            'first_name' => 'Debes ingresar un primer nombre',
            'second_name' => 'Debes ingresar un segundo nombre',
            'first_lastname' => 'Debes ingresar un primer apellido',
            'second_lastname' => 'Debes ingresar un segundo apellido',
            'birth_date' => 'Debes ingresar una fecha de nacimiento',
            'entry_date' => 'Debes ingresar una fecha de ingreso'
        ])->validate();
        
        try {
            $employee = Employee::find($validated['dui']);

            // if the entry date is not equal them update the calculated date
            // with the new entry date
            if($employee->entry_date != $validated['entry_date']) {
                $date = new Carbon($validated['entry_date']);
                $date->addYear(1);
                $validated['calculated_date'] = $date->format('Y-m-d');
                $employee->update($validated);
            }else {
                $employee->update($validated);
            }
            Session::flash('success', true);
            return redirect(route('employees'));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('employees'));
        }
    }
}
