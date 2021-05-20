<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employee()
    {


        return view('backend.partial.employeeDashboard');
    }
    // public function employeeDetails()
    // {

    //     return view('backend.content.employeeDetails');
    // }

}
