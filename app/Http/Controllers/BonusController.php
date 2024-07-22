<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Bonus;
use App\Models\Month;
use App\Utility\Loader;

class BonusController extends Controller
{
    public function index($dui) {
        try {
            if(Loader::load()) {
                $bonuses = Bonus::where('employee_dui', $dui)
                                ->where('month_id', session('month')->id)
                                ->paginate(5);
                return view('pages.bonus.index')->with('bonuses', $bonuses)->with('dui', $dui);
            }else {
                return redirect()->back();
            }
        }catch(\Exception) {
            return view('pages.bonus.index')->with('bonuses', []);
        }
    }

    public function insert($dui) {
        return view('pages.bonus.insert')->with('dui', $dui);
    }

    public function update($id) {
        try {
            $bonus = Bonus::find($id);
            return view('pages.bonus.update')->with('bonus', $bonus);
        }catch(\Exception) {
            return view('pages.bonus.update')->with('bonus', null);
        }
    }

    public function post(Request $request) {
        $validated = Validator::make($request->all(), [
            'employee_dui' => ['required'],
            'month_id' => ['required'],
            'mont' => ['required', 'numeric'],
            'reason' => ['required']
        ], [
            'mont.required' => 'Debes ingresar un monto',
            'mont.numeric' => 'El monto debe ser numerico',
            'reason.required' => 'Debes ingresar un motivo'
        ])->validate();

        try {
            Bonus::create($validated)
                 ->save();
            Session::flash('success', true);
            return redirect(route('bonus', $validated['employee_dui']));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('bonus', $validated['employee_dui']));
        }
    }

    public function delete($id) {
        try {
            Bonus::destroy($id);
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
            'mont' => ['required', 'numeric'],
            'reason' => ['required', 'string']
        ], [
            'mont.required' => 'Debes ingresar un monto',
            'mont.numeric' => 'El monto debe ser numerico',
            'reason.required' => 'Debes ingresar un motivo'
        ])->validate();

        try {
            $bonus = Bonus::find($validated['id']);
            $bonus->update($validated);

            Session::flash('success', true);
            return redirect(route('bonus', $validated['employee_dui']));
        }catch(\Exception) {
            Session::flash('success', false);
            return redirect(route('bonus', $validated['employee_dui']));
        }
    }
}
