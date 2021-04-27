<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Department;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function application()
    {
        $departments=Department::all();
        $applications=Application::all();
        return view('backend.content.application',compact('applications','departments'));
    }

    public function salaryCreate(Request $request)
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
