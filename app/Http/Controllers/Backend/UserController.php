<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logIn()
    {

        return view('backend.content.logIn');
    }

    //login
    public function authenticate(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin');
            }

            elseif (auth()->user()->role == 'employee') {
                return redirect()->route('employee');
            }
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.'
        ]);
    }

    //logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('logIn')->with('success', 'Logout Successful.');
    }

}
