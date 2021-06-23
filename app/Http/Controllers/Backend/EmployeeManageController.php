<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeRegistration;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeManageController extends Controller
{
    public function employeeManage()
    {

        $departments = Department::all();
        $designations = Designation::all();
        $employees = Employee::where('status','active')->orderBy('id','desc')->paginate(3);

        return view('backend.content.employeeManage', compact('employees', 'departments', 'designations'));
    }

    public function search(Request $request)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $search = $request->search;
        if ($search) {
            $employees = Employee::where('employee_id', 'like', '%' . $search . '%')->paginate(5);
            // ->orWhere('category','like','%'.$search.'%')
        } else {
            $employees = Employee::paginate(3);
        }

        // where(name=%search%)
        $title = "Search result";
        return view('backend.content.employeeManage', compact('employees', 'search', 'departments', 'designations'));
    }


    public function employeeCreate(Request $request)
    {
        $employee = Employee::paginate(5);

        // dd($request->all());
        $file_name = '';
        // step:1 check req has file

        if ($request->hasFile('picture')) {
            // file is valid?

            $file = $request->file('picture');
            if ($file->isvalid()); {
                // generate unique file name

                $file_name = date('Ymdhms') . '.' . $file->getClientOriginalExtension();

                // store image local directory

                $file->storeAs('photo', $file_name);
            }
        }

        $request->validate([
            'name' => 'required',
            'employee_id' => 'required | unique:employees',
            'email' => 'required | email | unique:users',
            'department_id' => 'required',
            'designation_id' => 'required',

        ]);


        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123456')
        ]);

        $emp= Employee::create([
            'user_id' => $users->id,
            'file' => $file_name,
            //    'name'=>$request->name,
            'department_id' => $request->department_id,
            'designation_id' => $request->designation_id,
            //    'email'=>$request->email,
            'employee_id' => $request->employee_id,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address,
            //    'status' =>$request->status,
            //    'password'=>bcrypt($request->password)
        ]);


        //send email to user
        Mail::to($users->email)->send(new EmployeeRegistration($emp));

        return redirect()->back()->with('success', 'Employee Registration Successful');
    }

    public function employeeDelete($id)
    {
        // dd($id);
        //first get the product
        // $employees = Employee::find($id);
        $users = User::find($id);


        //then delete it
        // $employees->delete();
        $users->delete();

        return redirect()->back()->with('message', 'Employee has been deleted');
    }

    public function employeeEdit($id)
    {

        $user = Employee::with('employeeDetail')->find($id);
        $designations = Designation::all();
        // dd($user);
        return view('backend.content.edit', compact('user', 'designations'));
    }
    public function employeeUpdate(Request $request, $id)
    {
        // dd($request->all());
        $user = Employee::find($id);

        $user->employeeDetail()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $user->update([
            //   'file'=>$request->input('picture'),
            'designation_id' => $request->input('designation_id'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),

        ]);


        return redirect()->route('employeeManage')->with('success', 'Employee Updated Successfully');
    }

    public function employees()
    {

        $departments = Department::all();
        $designations = Designation::all();
        $employees = Employee::where('status','active')->orderBy('id','desc')->paginate(4);

        return view('backend.content.employees', compact('employees', 'departments', 'designations'));
    }
    public function searchEmployee(Request $request)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $search = $request->search;
        if ($search) {
            $employees = Employee::where('employee_id', 'like', '%' . $search . '%')->paginate(6);
            // ->orWhere('category','like','%'.$search.'%')
        } else {
            $employees = Employee::paginate(6);
        }

        // where(name=%search%)
        $title = "Search result";
        return view('backend.content.employees', compact('employees', 'search', 'departments', 'designations'));
    }

}
