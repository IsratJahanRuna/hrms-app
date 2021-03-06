<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function attendanceRecord()
    {

        // $attendances = Attendance::where('status', '!=', 'holiday')->get();

        // foreach($attendances as $data){
        // $in_time = Carbon::parse($data->in_time);
        //  $out_time = Carbon::parse($data->out_time);

        // $totalDuration =  $in_time->diff($out_time)->format('%H');
        // // dd($totalDuration);
        // }
        $attendance = Attendance::where('status', '!=', 'holiday')->orderBy('id','desc')->paginate(6);




        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            // dd($name);
            $user = User::where('name', $name)->first();
            // $user_id = $user->id;

            if(isset($user)){
                $user_id = $user->id;
            }
            else{
                $user_id = 1234567;
            }
            // dd($toDate);

            $attendance = Attendance::where('status', '!=', 'holiday')->where('user_id', $user_id)->paginate(6);
        }


        return view('backend.content.attendanceRecord', compact('attendance'));
    }

    public function employeeAttendance()
    {
        $attendance = Attendance::where('user_id', auth()->user()->id)->where('status', '!=', 'holiday')->paginate(7);

        // $attendanceCount = Attendance::where('user_id',auth()->user()->id)->where('status','=','absent')->get();
        // $count = $attendanceCount->count();
        if (isset($_GET['from_date'])) {
            $fromDate = date('Y-m-d', strtotime($_GET['from_date']));
            $toDate = date('Y-m-d', strtotime($_GET['to_date']));

            // dd($toDate);

            $attendance = Attendance::where('user_id', auth()->user()->id)->where('status', '!=', 'holiday')->whereBetween('created_at', [$fromDate, $toDate])->paginate(6);
        }

        return view('backend.content.employeeAttendance', compact('attendance'));
    }

    public function report()
    {
        $attendance = Attendance::where('status', '!=', 'holiday')->get();
        // dd($attendance->created_at  date('Y-m-d H:m:s', strtotime($_GET['from_date'])));

        // $allAttendance = Attendance::all();
        // foreach( $attendance as $request){
        // $EmployeeName = $request->attendanceUser->name;
        // }
        if (isset($_GET['name']) && isset($_GET['from_date'])) {
            $name = $_GET['name'];
            // dd($name);
            $user = User::where('name', 'like', '%' . $name . '%')->first();
// dd($user);
            if(isset($user)){
            $user_id = $user->id;
        }
        else{
            $user_id = 1234567;
        }
        // if (isset($_GET['from_date'])) {
                $fromDate = date('Y-m-d', strtotime($_GET['from_date']));
                $toDate = date('Y-m-d', strtotime($_GET['to_date']));

                if ($fromDate > $toDate){
                    return redirect()->back()->with('message','Invalid date selection.');
                }
                // dd($user_id);

                // dd($toDate);

                // dd($attendance );

                    $attendance = Attendance::where('status', '!=', 'holiday')->where('user_id', $user_id)->whereBetween('in_time', [$fromDate, $toDate])->get();
                    // dd(Attendance::where('status', '!=', 'holiday')->where('user_id', $user_id)->whereBetween('created_at', [$fromDate, $toDate])->get());

                    // $attendance = Attendance::where('created_at','>=',$fromDate)->where('status', '!=', 'holiday')->where('user_id', $user_id)->where('created_at','<=',$toDate)->get();
                    // dd($attendance);
                    // }





                    // dd($attendance);
                    return view('backend.content.report', compact('attendance', 'fromDate', 'toDate'));

    }

    return view('backend.content.report',compact('attendance'));
}
}
