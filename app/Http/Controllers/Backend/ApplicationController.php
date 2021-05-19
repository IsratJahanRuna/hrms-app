<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationAccepted;
use App\Models\Application;
use App\Models\Department;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\Promise\all;

class ApplicationController extends Controller
{
    public function application()
    {
        $application = Employee::with(['employeeDetail'])->where('user_id',auth()->user()->id)->sole();
        $departments=Department::all();
        $applications=Application::all();
        return view('backend.content.application',compact('applications','departments','application'));
    }

    public function applicationCreate(Request $request)
    {
        // $department = Department::find($request->department_id);

       $userLeave=Employee::where('user_id',auth()->user()->id)->first();
        $balance=false;
        $start = Carbon::parse($request->from);
            $end =  Carbon::parse($request->to);
            $days = $end->diffInDays($start)+1;

       if($request->type=='Casual Leave')
       {
           if((int)$userLeave->total_casual_leave>=(int)$days)
           {
            $balance=true;
           }

       }
       if($request->type=='Sick Leave')
       {
           if((int)$userLeave->total_sick_leave>=(int)$days)
           {
            $balance=true;
           }

       }
       if($request->type=='Annual Leave')
       {
           if((int)$userLeave->total_annual_leave>=(int)$days)
           {
            $balance=true;
           }

       }

       if($balance)
       {

        $application = Application::where('user_id', auth()->user()->id)->first();
        // dd($application);

// dd($application->created_at);
    // if( $application->created_at != Carbon::today()->toDateString())
    // {
    //     return redirect()->back()->with('message','Your today/s slot is full.');
    // }
    // else{
        $request->validate([
            'type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'about' => 'required',
        ]);

        Application::create([
            'user_id' => auth()->user()->id,
            // 'email'=>$request->email,
            'department_id'=>$request->department_id,
            'type'=>$request->type,
            'from'=>$request->from,
            'to'=>$request->to,
            'about'=>$request->about,
            ]);

            return redirect()->back()->with('success','Your application has been submitted.');
     }
       return redirect()->back()->with('message','You don\'t have enough Leave');
    // }

    }



//     public function handleStatus(Request $request,$id){

//         $notifications = Application::find($id);
//         // dd($notifications);
//         // dd($request->all());

//          $employee = Employee::where('user_id',$request->input('user_id'))->first();



//          if($notifications->type == 'Casual Leave'){

//             // dd($request->from, $request->to);
//             $start = Carbon::parse($request->from);
//             $end =  Carbon::parse($request->to);
//             // dd($start,$end);


//              $days = $end->diffInDays($start);
//             //  dd($days);x`
//             dd($employee->total_casual_leave - $days);
//             $employee->update([
//                 'total_casual_leave'=> $employee->total_casual_leave - $days
//             ]);
//          }
//          if($notifications->type == 'Sick Leave'){
//             $start = Carbon::parse($request->from);
//             $end =  Carbon::parse($request->to);
//             $days = $end->diffInDays($start);
//             $employee->update([
//                 'total_sick_leave'=> $employee->total_sick_leave - $days
//             ]);
//          }
//          if($notifications->type == 'Annual Leave'){
//             $start = Carbon::parse($request->from);
//             $end =  Carbon::parse($request->to);
//             $days = $end->diffInDays($start);
//             $employee->update([
//                 'total_annual_leave'=> $employee->total_annual_leave - $days
//             ]);
//          }


//             // $notifications->update([
//             //     'status'=>'accept'
//             //     ]);

// //send email to user
// // dd($employee);
// Mail::to($employee->employeeDetail->email)->send(new ApplicationAccepted($notifications));

//      return redirect()->route('notification')->with('success','Leave application accepted');

//     }

public function handleStatusDecline($id)
{
    $notifications = Application::find($id);

    // $notifications->update([
    //     'reason' => $request->input('reason'),
    //     'status'=>'decline'
    //     ]);

    //     return redirect()->route('notification')->with('success','Leave application not accepted');
    return view('backend.content.applicationDecline',compact('notifications'));

}



}
