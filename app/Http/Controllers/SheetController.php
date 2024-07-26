<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility\Calculable2024;

class SheetController extends Controller
{
    public function index() {
        $calculable = new Calculable2024();
        $sheets = collect($calculable->apply(session('month')->id));

        if(session('month') === null) {
            return redirect()->back();
        }

        return view('pages.sheets.index')->with('sheets', $sheets);
    }
}
