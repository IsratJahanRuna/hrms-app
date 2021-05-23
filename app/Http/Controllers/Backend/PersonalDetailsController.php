<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class PersonalDetailsController extends Controller
{
    public function personalDetails()
    {
        $employee = Employee::where('user_id',auth()->user()->id)->first();
        //  dd($employee->total_sick_leave);

        $totalLeave= 36 - ($employee->total_sick_leave + $employee->total_annual_leave + $employee->total_casual_leave);
// dd($totalLeave);
        $attendanceCount = Attendance::where('user_id',auth()->user()->id)
        ->where(function($query){
           $query->where('status','holiday')
            ->orWhere('status','Present');
        })->whereMonth('created_at',now()->subMonth()->format('m'))
        ->count('id');
        // dd($attendanceCount);

        $attendanceCount =  $attendanceCount + $totalLeave;
        $totalAbsent = 30 - $attendanceCount;

        $employee = Employee::with(['employeeDetail'])->where('user_id',auth()->user()->id)->sole();
        // dd($employee);

        return view("backend.content.personalDetails",compact('employee','totalAbsent'));
    }

}
