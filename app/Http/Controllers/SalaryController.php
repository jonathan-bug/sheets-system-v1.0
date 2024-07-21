<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function index($dui) {
        try {
            //$salaries = Employee::find($dui)->salaries;
            $salaries = Salary::where('employee_dui', $dui)->paginate(5);
            return view('pages.salaries.index')->with('dui', $dui)->with('salaries', $salaries);
        }catch(\Exception $err) {
            //return view('pages.salaries.index')->with('dui', $dui)->with('salaries', null);
            return $err->getMessage();
        }
    }

    public function insert($dui) {
        return view('pages.salaries.insert')->with('dui', $dui);
    }

    public function post(Request $request) {
        $validated = Validator::make($request->all(), [
            'salary' => ['required', 'numeric'],
            'employee_dui' => ['required']
        ], [
            'salary.required' => 'Debes ingresar un salario',
            'salary.numeric' => 'El salario debe ser un monto',
        ])->validate();
        
        try {
            Salary::create($validated)->save();
            Session::flash('success', true);
            return redirect(route('salaries', $validated['employee_dui']));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('salaries', $validated['employee_dui']));
        }
    }

    public function delete($id) {
        $salary = Salary::find($id);
        $dui = $salary->employee_dui;
        
        try {
            $salary->delete();

            Session::flash('success', true);
            return redirect(route('salaries', $dui));
        }catch(\Exception) {
            Session::flash('success', true);
            return redirect(route('salaries', $dui));
        }
    }

    public function update($id) {
        $salary = Salary::find($id);
        return view('pages.salaries.update')->with('salary', $salary);
    }

    public function put(Request $request) {
        $validated = Validator::make($request->all(), [
            'id' => ['required'],
            'salary' => ['required', 'numeric']
        ], [
            'salary.required' => 'Debes ingresar un salario',
            'salary.numeric' => 'El salario debe ser un monto'
        ])->validate();
        
        try {
            $salary = Salary::find($validated['id']);
            $salary->update($validated);
            Session::flash('success', true);
            return redirect(route('salaries', $salary->employee_dui));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('salaries', $salary->employee_dui));
        }
    }
}
