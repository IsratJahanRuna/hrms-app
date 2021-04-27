<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class PersonalDetailsController extends Controller
{
    public function personalDetails()
    {

        $employee = Employee::with(['employeeDetail'])->where('user_id',auth()->user()->id)->sole();
        // dd($employee);

        return view("backend.content.personalDetails",compact('employee'));
    }

}
