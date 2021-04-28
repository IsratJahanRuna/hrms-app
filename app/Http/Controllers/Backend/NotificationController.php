<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function notification()
    {
        $notifications = Application::all();
        return view('backend.content.notification',compact('notifications'));
    }


}
