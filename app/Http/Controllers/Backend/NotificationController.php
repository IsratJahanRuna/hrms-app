<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function notification()
    {
        $notifications = Application::where('status','!=','accept')->get();
        return view('backend.content.notification',compact('notifications'));
    }
    public function applicationAccept($id)
    {
        // $application = Employee::with(['employeeDetail'])->where('user_id',auth()->user()->id)->sole();
        // $departments=Department::all();


        $notifications = Application::find($id);

        if(request('status') == 'decline'){
            $notifications->update(['status'=>'decline']);
            return redirect()->back();
        }

     return view('backend.content.applicationAccept',compact('notifications'));

    }


}
