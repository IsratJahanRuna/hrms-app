<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function departmentManage()
    {

     $departments=Department::all();
     return view('backend.content.departmentManage',compact('departments'));

    }

    public function departmentCreate(Request $request)
    {
        Department::create([
            'department'=>$request->department,
            // 'designation'=>$request->designation,
            'email'=>$request->email,
            'contact'=>$request->contact]);

            return redirect()->back();
    }
}
