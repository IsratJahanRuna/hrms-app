<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function attendanceRecord()
    {
        $attendance = Attendance::where('status', '!=', 'holiday')->get();
        return view('backend.content.attendanceRecord', compact('attendance'));
    }

    public function employeeAttendance()
    {
        $attendance = Attendance::where('user_id', auth()->user()->id)->get();

        // $attendanceCount = Attendance::where('user_id',auth()->user()->id)->where('status','=','absent')->get();
        // $count = $attendanceCount->count();
        return view('backend.content.employeeAttendance', compact('attendance'));
    }

    public function report()
    {
        $attendance = Attendance::where('status', '!=', 'holiday')->get();


        if (isset($_GET['from_date'])) {
            $fromDate = date('Y-m-d', strtotime($_GET['from_date']));
            $toDate = date('Y-m-d', strtotime($_GET['to_date']));

            // dd($toDate);

            $attendance = Attendance::where('status', '!=', 'holiday')->whereBetween('created_at',[$fromDate,$toDate])->get();
        }



        // dd($attendance);
        return view('backend.content.report', compact('attendance'));
    }
}
