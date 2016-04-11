<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }
    public function postSignUp(Request $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
       if(Auth::attempt(['email' => $request['email'],
           'password' => $request['password']
       ]))
       {
           return redirect()->route('dashboard');
       }
        return redirect()->back();
    }
}
