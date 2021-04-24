<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalDetailsController extends Controller
{
    public function personalDetails()
    {
        return view("backend.content.personalDetails");
    }

}
