<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::paginate(5);
        return view('pages.employees.index')->with('employees', $employees);
    }
}
