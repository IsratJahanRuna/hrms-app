<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employee()
    {

        return view('backend.partial.employeeDashboard');
    }
    public function employeeDetails()
    {
        $employees=Employee::paginate(5);
        return view('backend.content.employeeDetails', compact('employees'));
    }
}
