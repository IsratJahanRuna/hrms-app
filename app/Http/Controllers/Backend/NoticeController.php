<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function notice(){

        return view('backend.content.noticeManage');
    }

    public function noticeCreate(Request $request){

        $request->validate([
            'date' => 'required',
            'notice' => 'required',

        ]);

        Notice::create([
            'date'=>$request->date,
            'notice'=>$request->notice,
            ]);

            return redirect()->back()->with('success', 'Notice uploaded successfully');
    }

}
