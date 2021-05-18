<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Holiday;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class HolidaySetupController extends Controller
{
    public function holidaySetup()
    {
        $holidays = Holiday::paginate(8);
        return view('backend.content.holidaySetup', compact('holidays'));
    }
    public function holidayCreate(Request $request)
    {
        $request->validate([
            'date'=>'required | unique:holidays',
        ]);

        DB::beginTransaction();
        try {
            Holiday::create([
                'title' => $request->title,
                'date' => $request->date,
                'day' => $request->day,
            ]);

            $employees = Employee::all();
            foreach ($employees as $employee) {
                Attendance::create([
                    'user_id' => $employee->user_id,
                    'created_at' => $request->date,
                    'status' => 'holiday',
                ]);
            }
        }
        catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', $e->getMessage());
        }

        DB::commit();
        return redirect()->back()->with('message', "Holiday is added");
    }
}
