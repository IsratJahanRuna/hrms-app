<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin()
    {

        return view('backend.partial.adminMaster');
    }


    // public function check(Request $request){

    //     $user = User::where('email',$request->input('email'))->first();

    //     if(!$user){
    //         //not found email
    //     }

    //     if(!Hash::check($request->input('password'), $user->password)){
    //         //message password dose't
    //     }


    //     //Adtace;;
    //     //user_id in_time out_time


    //     Addtance::create([
    //         user_id=>auth()->user()->id,
    //         in_time=> now(),
    //     ])

    // }
}
