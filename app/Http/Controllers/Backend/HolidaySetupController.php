<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidaySetupController extends Controller
{
    public function holidaySetup()
    {
        $holidays = Holiday::all();
        return view('backend.content.holidaySetup',compact('holidays'));
    }
    public function holidayCreate(Request $request)
    {
        Holiday::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'day'=>$request->day,
            ]);

            return redirect()->back();
    }
}
