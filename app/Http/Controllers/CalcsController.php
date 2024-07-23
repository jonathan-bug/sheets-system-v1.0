<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utility\Calculable2024;

class CalcsController extends Controller
{
    public function index() {
        $calc = new Calculable2024();
        
        return $calc->apply(session('month')->id);
    }
}
