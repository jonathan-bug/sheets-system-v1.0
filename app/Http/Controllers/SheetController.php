<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Utility\Calculable2024;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SheetController extends Controller
{
    public function index() {
        if(session('month') === null) {
            return redirect()->back();
        }
        
        $calculable = new Calculable2024();
        $sheets = collect($calculable->apply(session('month')->id));

        return view('pages.sheets.index')->with('sheets', $sheets);
    }

    public function export() {
        $calculable = new Calculable2024();
        $sheets = collect($calculable->apply(session('month')->id));

        if(session('month') === null) {
            return redirect()->back();
        }
        
        $pdf = PDF::loadView('pages.export.index', [
            'sheets' => $sheets,
            'today' => today()->format('Y/m/d')
        ]);

        //$calculable->configuration->updateCalculable($sheets);
        
        return $pdf->stream();
    }
}
