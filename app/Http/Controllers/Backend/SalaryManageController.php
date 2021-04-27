<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryManageController extends Controller
{
    public function salaryManage()
    {
        $salaries = Salary::all();
        return view('backend.content.salaryManage',compact('salaries'));
    }

    public function salaryCreate(Request $request)
    {
        Salary::create([
            'employment'=>$request->employment,
            'amount'=>$request->amount,
            'month'=>$request->month,
            'bonus'=>$request->bonus,
            ]);

            return redirect()->back();
    }
}
