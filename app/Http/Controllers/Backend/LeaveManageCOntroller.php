<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class LeaveManageCOntroller extends Controller
{
    public function leaveManage()
    {

            $notifications = Application::where('status','=','accept')->get();
            return view('backend.content.leaveManage',compact('notifications'));

    }
}