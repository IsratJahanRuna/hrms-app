<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

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

        // dd($request->all());

        Application::create([
            'user_id' => auth()->user()->id,
            // 'email'=>$request->email,
            'department_id'=>$request->department_id,
            'type'=>$request->type,
            'from'=>$request->from,
            'to'=>$request->to,
            'about'=>$request->about,
            ]);

            return redirect()->back();
    }



    public function handleStatus (Request $request,$id){

        $notifications = Application::find($id);

            $notifications->update([
                'accept_from'=>$request->input('accept_from'),
                'accept_to'=>$request->input('accept_to'),
                'status'=>'accept'
                ]);
            return redirect()->route('notification')->with('success','Leave application accepted');

    }





}
