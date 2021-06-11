<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveManageCOntroller extends Controller
{
    public function leaveManage()
    {

            $notifications = Application::orderBy('id','desc')->paginate(6);

            if (isset($_GET['name'])) {
                $name = $_GET['name'];
                // dd($name);
                $user = User::where('name', $name)->first();
                $user_id = $user->id;

                // dd($toDate);

                $notifications = Application::where('user_id', $user_id)->paginate(6);
            }

            return view('backend.content.leaveManage',compact('notifications'));

    }
}
