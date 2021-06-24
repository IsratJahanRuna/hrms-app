<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {
        $today=date("Y-m-d",strtotime(now()));

        $allEmployees = Employee::where('status', 'active')->get();
        $totalEmployee = $allEmployees->count();
        // dd($totalEmployee);

        $allDepartments = Department::all();
        $totalDepartment = $allDepartments->count();

        $allAttendances = Attendance::whereDate('in_time',now()->format('Y-m-d'))->get();
        $totalAttendance = $allAttendances->count();


        $allLeaves = Application::where('status', 'accepted')->whereDate('from','<=',$today)
                    ->whereDate('to','>=',$today)->get();
        $totalLeave = $allLeaves->count();
// dd($totalLeave);
        return view('backend.partial.adminDashboard',compact('totalEmployee','totalDepartment','totalAttendance','totalLeave'));
    }



}
