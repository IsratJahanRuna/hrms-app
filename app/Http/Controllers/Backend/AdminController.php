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
        $allEmployees = Employee::where('status', 'active')->get();
        $totalEmployee = $allEmployees->count();
        // dd($totalEmployee);

        $allDepartments = Department::all();
        $totalDepartment = $allDepartments->count();

        $allAttendances = Attendance::where('created_at',now()->format('Y-m-d'))->get();
        $totalAttendance = $allAttendances->count();

        $allLeaves = Application::where('status', 'accepted')->get();
        $totalLeave = $allLeaves->count();

        return view('backend.partial.adminDashboard',compact('totalEmployee','totalDepartment','totalAttendance','totalLeave'));
    }


    // public function check(Request $request){

    //     $user = User::where('email',$request->input('email'))->first();

    //     if(!$user){
    //         //not found email
    //     }

    //     if(!Hash::check($request->input('password'), $user->password)){
    //         //message password dose't
    //     }


    //     //Adtace;;
    //     //user_id in_time out_time


    //     Addtance::create([
    //         user_id=>auth()->user()->id,
    //         in_time=> now(),
    //     ])

    // }
}
