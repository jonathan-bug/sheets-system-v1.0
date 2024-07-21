<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Month;
use Illuminate\Support\Carbon;

class MonthController extends Controller
{
    public function index() {
        try {
            $months = Month::paginate(5);
            return view('pages.months.index')->with('months', $months);
        }catch(\Exception) {
            return view('pages.months.index')->with('months', null);
        }
    }
    public function insert() {
        return view('pages.months.insert');
    }
    public function update($id) {
        $month = Month::find($id);
        return view('pages.months.update')->with('month', $month);
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
            $validated['last'] = Carbon::now()->format('Y-m-d H:i:s');
            Month::create($validated)->save();
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
