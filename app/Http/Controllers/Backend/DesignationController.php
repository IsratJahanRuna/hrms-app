<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    public function designationManage()
    {
        return view('backend.content.designationManage');
    }
}
