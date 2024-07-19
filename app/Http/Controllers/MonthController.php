<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MonthController extends Controller
{
    public function index() {
        return view('pages.months.index');
    }
    public function insert() {
        return view('pages.months.insert');
    }
    public function update($id) {
        return view('pages.months.update');
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
            return $validated;

            Session::flash('success', true);
        }catch(\Exception) {
            Session::flash('success', false);
        }
    }
    public function delete($id) {}
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
            return $validated;
            Session::flash('success', true);
        }catch(\Exception) {

            Session::flash('success', false);
        }
    }
}
