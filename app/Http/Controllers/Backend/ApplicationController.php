<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

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
        Application::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'department'=>$request->department,
            'type'=>$request->type,
            'from'=>$request->from,
            'to'=>$request->to,
            'about'=>$request->about,
            ]);

            return redirect()->back();
    }

}
