<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|min:3|max:255',
            'password'  => 'required|min:8|max:255'
        ]); 

        if(Auth::attempt($request->only(['email','password'])))
        {   
            return redirect('dashboard');
        } else {
            return redirect()->back()->with('error','Incorrent credentials, please try again.');
        }
    }

    public function forgotpassword()
    {     
        return redirect()->back()->with('error','Kindly contact the Administrator to change your password!');
    }

    public function logout(Request $request)
    {  
        Auth::logout();

        return redirect('/');
    }
}
