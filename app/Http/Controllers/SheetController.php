<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function index() {
        return view('pages.sheets.index');
    }
}
