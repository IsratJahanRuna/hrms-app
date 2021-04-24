<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class signInController extends Controller
{
    public function signIn()
    {
        return view('backend.partial.signIn');
    }



    public function logIn()
    {
        return view('backend.content.logIn');
    }

//authentication

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

         return redirect()->intended('/');
        }



        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
