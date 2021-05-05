<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
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

        // $attendanceCount = Attendance::where('user_id',auth()->user()->id)->where('status','=','absent')->get();
        // $count = $attendanceCount->count();
        // dd($count);

        // $salary = Salary::all();
        // foreach($salary as $salary)
        // {
            // $amount = $salary->amount;

        // dd($amount);
        // $oneDaySalary = $amount / 30;
        // dd($oneDaySalary);

        // $salary_deduction = $count * $oneDaySalary;
        // dd($salary_deduction);


        return view('backend.content.accountDetails',compact('salaries','employee'));
    }



    public function salaryCreate(Request $request)
    {
        // $employee = Employee::with('employeeDetail')->first();
        // dd($employee);
        $user = Employee::with('employeeDetail')->get();
        // dd($user);

        if(Carbon::parse($request->input('month'))->format('Y-m') !== now()->subMonth()->format('Y-m')){
            return redirect()->route('salaryManage')->with('error','You can not give advance & previous salary');

        }


        // if(Carbon::parse($request->input('month'))->format('Y-m') == now()->format('Y-m')){
        //     return redirect()->route('salaryManage')->with('error','You can not give advance salary');

        // }

        $alreadyExist = Salary::where('employee_id',$request->employee_id)->whereDate('month',now()->format('Y-m'))->exists();

        if($alreadyExist){

             return redirect()->route('salaryManage')->with('error','Salary had already given.');

        }
        else{

            $employee = Employee::find($request->employee_id);
            //  dd($employee->total_sick_leave);

            $totalLeave= 36 - ($employee->total_sick_leave + $employee->total_annual_leave + $employee->total_casual_leave);

            $salary = $employee->salary;
            $attendanceCount = Attendance::where('user_id',$request->employee_id)->where('status','=','Present')->count('id');

            $attendanceCount =  $attendanceCount + $totalLeave;
            $totalAbsent = 22 - $attendanceCount;

            $per_day_salary =  $salary / 22;

            $payable_salary = $salary - ($per_day_salary * $totalAbsent);


            Salary::create([
                'employee_id'=>$request->employee_id,
                'employment'=>$request->employment,
                'amount'=>$payable_salary,
                'month'=>$request->month,
                'bonus'=>$request->bonus,
                ]);

             return redirect()->back()->with('success','Salary updated.');

    }
}
}
