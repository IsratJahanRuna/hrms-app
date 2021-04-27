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
        Designation::create([
            'designation'=>$request->designation,
            ]);

            return redirect()->back();
    }

    public function designationEdit($id)
    {

     $user = Designation::find($id);
     // dd($user);
     return view('backend.content.editDesignation',compact('user'));

    }
    public function designationUpdate(Request $request,$id)
    {
     // dd($request->all());
     $user = Designation::find($id);


     $user->update([
           'designation'=>$request->input('designation'),
           'status'=>$request->input('status'),

     ]);

     return redirect()->route('designationManage')->with('success','Details Updated Successfully');
    }
}
