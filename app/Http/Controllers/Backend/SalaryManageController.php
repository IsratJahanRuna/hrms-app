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

    public function accountDetails()
    {
        $employee = Employee::where('user_id',auth()->user()->id)->get();
// dd($employee);
        $salaries = Salary::where('employee_id',auth()->user()->employee->id)->get();
        // dd($salaries);
        return view('backend.content.accountDetails',compact('salaries','employee'));
    }



    public function salaryCreate(Request $request)
    {
        // $employee = Employee::with('employeeDetail')->first();
        // dd($employee);
        $user = Employee::with('employeeDetail')->get();
        // dd($user);

        if(Carbon::parse($request->input('month'))->format('Y-m') !== now()->subMonth()->format('Y-m')){
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
