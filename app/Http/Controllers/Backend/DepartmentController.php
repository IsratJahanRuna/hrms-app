<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function departmentManage()
    {

     $departments=Department::orderBy('id','desc')->paginate(5);
     return view('backend.content.departmentManage',compact('departments'));

    }

    public function departmentCreate(Request $request)
    {

        $request->validate([
            'department' => 'required | unique:departments',
            'email' => 'required | email | unique:departments',
            'contact' => 'required | min:11| max:11 | unique:departments',
        ]);


        Department::create([
            'department'=>$request->department,
            // 'designation'=>$request->designation,
            'email'=>$request->email,
            'contact'=>$request->contact]);

            return redirect()->back()->with('success', 'Department added successfully');
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
