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
        $employee = Employee::with('employeeDetail')->where('status','active')->get();

        $salaries = Salary::with('employee')->orderBy('id','desc')->paginate(6);

        return view('backend.content.salaryManage',compact('salaries','employee'));
    }

    public function accountDetails()
    {
        $employee = Employee::where('user_id',auth()->user()->id)->get();
        // dd($employee);
        $salaries = Salary::where('employee_id',auth()->user()->id)->get();
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

        $alreadyExist = Salary::where('employee_id',$request->employee_id)
        ->where('month',now()->subMonth()->format('Y-m'))->exists();
// dd($request->employee_id);
        if($alreadyExist){

             return redirect()->route('salaryManage')->with('error','Salary had already given.');

        }
        else{

            $employee = Employee::where('user_id',$request->employee_id)->first();
            //  dd($employee->total_sick_leave);

            $totalLeave= 36 - ($employee->total_sick_leave + $employee->total_annual_leave + $employee->total_casual_leave);

            $salary = $employee->salary;

            $attendance = Attendance::where('user_id',$request->employee_id)->first();
            // dd($attendance->in_time);


            // $in_time = date("H:i",strtotime($attendance->in_time));

            // $out_time = date("H:i",strtotime($attendance->out_time));

            // $total_time = $out_time -  $in_time;

            // dd( $total_time);

            // $in_time = Carbon::parse($attendance->in_time);
            // $out_time = Carbon::parse($attendance->out_time);

            // $totalDuration =  $in_time->diff($out_time)->format('%H');
            // // dd($totalDuration);

            // $halfAttendanceCount = 0;

            // if( $totalDuration < 8){

            //     $halfAttendanceCount = Attendance::where('user_id',$request->employee_id)
            // ->Where('status','Present')->whereMonth('created_at',now()->subMonth()->format('m'))
            // ->count('id');
            // }


            $attendanceCount = Attendance::where('user_id',$request->employee_id)
            ->where(function($query){
               $query->where('status','holiday')
                ->orWhere('status','Present');
            })->whereMonth('created_at',now()->subMonth()->format('m'))
            ->count('id');
            // dd($attendanceCount);
            $attendanceCount =  $attendanceCount + $totalLeave;
            $totalAbsent = 30 - $attendanceCount;

            $per_day_salary =  $salary / 30;


            $payable_salary = $salary - ($per_day_salary * $totalAbsent);
            $request->validate([
                'employee_id' => 'required',
                'employment' => 'required',
                'month' => 'required',
                'bonus' => 'required',
            ]);


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
