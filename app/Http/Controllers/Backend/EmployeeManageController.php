<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeManageController extends Controller
{
   public function employeeManage()
   {

    $departments=Department::all();
    $designations=Department::all();
    $employees=Employee::paginate(5);

    return view('backend.content.employeeManage',compact('employees','departments','designations'));

   }

   public function employeeCreate(Request $request)
   {


    // dd($request->all());
    $file_name='';
    // step:1 check req has file

    if($request->hasFile('picture'))
    {
        // file is valid?

        $file=$request->file('picture');
        if($file->isvalid());
        {
            // generate unique file name

            $file_name=date('Ymdhms').'.'.$file->getClientOriginalExtension();

            // store image local directory

            $file->storeAs('photo',$file_name);
        }
    }

    $request->validate([
        'name'=>'required',
        'email'=>'required | email | unique:users',
        'department_id'=>'required',
        // 'password'=>'required | min:6',
    ]);


    $users = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt('123456')
    ]);

       Employee::create([
           'user_id'=>$users->id,
           'file' => $file_name,
        //    'name'=>$request->name,
           'department_id' => $request->department_id,
           'designation'=>$request->designation,
        //    'email'=>$request->email,
           'contact'=>$request->contact,
           'address'=>$request->address,
        //    'status' =>$request->status,
        //    'password'=>bcrypt($request->password)
           ]);

           return redirect()->back()->with('success','Employee Registration Successful');
   }

   public function employeeDelete($id)
   {
    // dd($id);
       //first get the product
       $employees = Employee::find($id);


       //then delete it
       $employees->delete();

       return redirect()->back();
   }
}
