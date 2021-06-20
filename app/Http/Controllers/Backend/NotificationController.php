<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationAccepted;
use App\Mail\ApplicationDeclined;
use App\Models\Application;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function notification()
    {
        $notifications = Application::where('status','=','pending')->orderBy('id','desc')->paginate(8);
        return view('backend.content.notification',compact('notifications'));
    }

    public function leaveDetails()
    {
        $notifications = Application::where('user_id','=',auth()->user()->id)->paginate(6);
        return view('backend.content.leaveDetails',compact('notifications'));
    }

    public function applicationAccept($id)
    {
        // $application = Employee::with(['employeeDetail'])->where('user_id',auth()->user()->id)->sole();
        // $departments=Department::all();


        $notifications = Application::find($id);




            // return view('backend.content.applicationDecline',compact('notifications'));
            $notifications->update(['status'=>'accepted']);

            $notifications = Application::find($id);
            // dd($notifications);
            // dd($request->all());

             $employee = Employee::where('user_id',$notifications->user_id)->first();



             if($notifications->type == 'Casual Leave'){

                // dd($request->from, $request->to);
                $start = Carbon::parse($notifications->from);
                $end =  Carbon::parse($notifications->to);
                // dd($start,$end);


                 $days = $end->diffInDays($start);
                //  dd($days);x`
                // dd($employee->total_casual_leave - $days);
                $employee->update([
                    'total_casual_leave'=> $employee->total_casual_leave - $days,

                ]);
                $notifications->update([
                    'total' => $days + 1,
                ]);
             }
             if($notifications->type == 'Sick Leave'){
                $start = Carbon::parse($notifications->from);
                $end =  Carbon::parse($notifications->to);
                $days = $end->diffInDays($start);
                $employee->update([
                    'total_sick_leave'=> $employee->total_sick_leave - $days,

                ]);
                $notifications->update([
                    'total' => $days + 1,
                ]);
             }
             if($notifications->type == 'Annual Leave'){
                $start = Carbon::parse($notifications->from);
                $end =  Carbon::parse($notifications->to);
                $days = $end->diffInDays($start);
                $employee->update([
                    'total_annual_leave'=> $employee->total_annual_leave - $days,

                ]);
                $notifications->update([
                    'total' => $days + 1,
                ]);
             }
             Mail::to($employee->employeeDetail->email)->send(new ApplicationAccepted($notifications));
            return redirect()->back()->with('message','Leave application accepted');


    //  return view('backend.content.applicationDecline',compact('notifications'));

    }

    public function applicationDecline(Request $request, $id)
    {


        $notifications = Application::find($id);

        $employee = Employee::where('user_id',$notifications->user_id)->first();

        $notifications->update([
            'status'=>'declined',
            'reason'=>$request->reason,
        ]);
        Mail::to($employee->employeeDetail->email)->send(new ApplicationDeclined($notifications));
        return redirect()->route('notification')->with('success','Leave application not accepted');
    }

    public function employeeNotification()
    {
        return view('backend.content.employeeNotification');
    }


}
