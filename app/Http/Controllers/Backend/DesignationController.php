<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function designationManage()
    {
        $designations=Designation::all();
        return view('backend.content.designationManage',compact('designations'));
    }

    public function designationCreate(Request $request)
    {
        $request->validate([
            'designation' => 'required | unique:designations',

        ]);

        Designation::create([
            'designation'=>$request->designation,
            ]);

            return redirect()->back();
    }

    public function designationEdit($id)
    {
     $designations=Designation::all();
     $user = Designation::find($id);
     // dd($user);
     return view('backend.content.editDesignation',compact('user','designations'));

    }
    public function designationUpdate(Request $request,$id)
    {
     // dd($request->all());
     $user = Designation::find($id);


     $user->update([
        //    'designation'=>$request->input('designation'),
           'status'=>$request->input('status'),

     ]);

     return redirect()->route('designationManage')->with('success','Details Updated Successfully');
    }
}
