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

        $request->validate([
            'department' => 'required | unique:departments',
            'email' => 'required | email | unique:departments',
            'contact' => 'required | unique:departments',
        ]);


        Department::create([
            'department'=>$request->department,
            // 'designation'=>$request->designation,
            'email'=>$request->email,
            'contact'=>$request->contact]);

            return redirect()->back();
    }
    public function departmentEdit($id)
    {

     $user = Department::find($id);
     // dd($user);
     return view('backend.content.editDepartment',compact('user'));

    }
    public function departmentUpdate(Request $request,$id)
    {
     // dd($request->all());
     $user = Department::find($id);


     $user->update([
        //    'department'=>$request->input('department'),
           'contact'=>$request->input('contact'),
           'email'=>$request->input('email'),

     ]);

     return redirect()->route('departmentManage')->with('success','Details Updated Successfully');
    }
}
