<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility\Loader;

class DashboardController extends Controller
{
    public function index() {
        Loader::load();
        return view('pages.dashboard.index');
    }
}
