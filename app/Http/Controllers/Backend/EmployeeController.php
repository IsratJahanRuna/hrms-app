<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Notice;

class EmployeeController extends Controller
{
    public function employee()
    {
        $today=date("Y-m-d",strtotime(now()));
        $notice=Notice::where('date',$today)
        ->get();

        return view('backend.partial.employeeDashboard', compact('notice'));
    }
    // public function employeeDetails()
    // {

    //     return view('backend.content.employeeDetails');
    // }

}
