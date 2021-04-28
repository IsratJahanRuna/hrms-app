<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryManageController extends Controller
{
    public function salaryManage()
    {
        $employee = Employee::with('employeeDetail')->get();

        $salaries = Salary::all();
        return view('backend.content.salaryManage',compact('salaries','employee'));
    }



    public function salaryCreate(Request $request)
    {
        // $employee = Employee::with('employeeDetail')->first();
        // dd($employee);

        if(Carbon::parse($request->input('month'))->format('Y-m') !== now()->format('Y-m')){
            return redirect()->route('salaryManage')->with('error','Salary had already given ad.');

        }

        $alreadyExist = Salary::where('employee_id',$request->employee_id)->whereDate('month',now()->format('Y-m'))->exists();

        if($alreadyExist){

             return redirect()->route('salaryManage')->with('error','Salary had already given.');

        }
        else{
            Salary::create([
                'employee_id'=>$request->employee_id,
                'employment'=>$request->employment,
                'amount'=>$request->amount,
                'month'=>$request->month,
                'bonus'=>$request->bonus,
                ]);

                return redirect()->back()->with('success','Salary updated.');

    }
}
}
