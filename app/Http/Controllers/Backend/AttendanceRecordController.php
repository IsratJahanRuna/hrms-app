<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function attendanceRecord(){
        $attendance = Attendance::all();
        return view('backend.content.attendanceRecord',compact('attendance'));
    }
}
