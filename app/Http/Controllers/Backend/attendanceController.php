<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class attendanceController extends Controller
{
    public function attendance( Request $request)
    {

        $user = User::where('email',$request->input('email'))->first();


        if($user && $user->role == 'admin')
        {
            return redirect()->route('logIn')->with('error','You are not applicable for attendance.');
        }

        if(!$user)
        {
            return redirect()->route('logIn')->with('error','Email does not match.');
        }
        if(!Hash::check($request->input('password'), $user->password))
        {
            return redirect()->route('logIn')->with('error','Password does not match.');
        }

        $alreadyExist = Attendance::where('user_id',$user->id)->whereDate('in_time',now()->format('Y-m-d'))->exists();
// dd(Attendance::where('user_id',$user->id)->whereDate('in_time',now()->format('Y-m-d'))->whereNull('out_time')->exists());
       if($alreadyExist){
           if(Attendance::where('user_id',$user->id)->whereDate('in_time',now()->format('Y-m-d'))->whereNull('out_time')->exists())
           {
            if((int)date(Carbon::now()->format('H'))>=18)
            {
            Attendance::where('user_id',$user->id)->whereDate('in_time',now()->format('Y-m-d'))->update([
                'out_time' => now(),
                'status' => 'Present'
            ]);
            return redirect()->route('logIn')->with('success','Your Check-Out Done.');

           }else{
            return redirect()->route('logIn')->with('error','You can\'t check-out before 6pm');
           }

            }
            else{
            return redirect()->route('logIn')->with('error','You have already checked-out for today.');
           }

       }
       else{
        Attendance::create([
            'user_id'=> $user->id,
            'in_time'=> now(),
        ]);
       }




               return redirect()->route('logIn')->with('success','Your Check-In done.');
    }
}
