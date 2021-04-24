<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function attendanceRecord(){
        return view('backend.content.attendanceRecord');
    }
}
