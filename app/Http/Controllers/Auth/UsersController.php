<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use App\Department;

class UsersController extends Controller
{
    public function index(Request $request)
    {	
    	$user = Auth::user()->first();

    	return view('main.account.account', compact('user'));
    }

    public function edit(Request $request)
    {	
    	$user = Auth::user()->first();

        $departments    = Department::get();

        $roles          = Role::get();

    	return view('main.account.account-edit', compact('user', 'departments', 'roles'));
    } 

    public function update(Request $request)
    {	  
    	$this->validate($request, [
    		'name'      		=> 'required|min:3|max:255',
            'email'     		=> 'required|min:3|max:255', 
        ]);

    	$user_id 		= $request->input('user_id');
    	$name 			= $request->input('name');
    	$email 			= $request->input('email');
    	$password 		= $request->input('password');
    	$password_check = $request->input('password_check');
 		
 		$user = User::whereId($user_id)->first();  

    	$user->update([
    		'name'		=> $name,
    		'email'		=> $email, 
    	]);
 

    	if(!$password_check) 
    	{	
    		$this->validate($request, [
	    		'password'  => 'required|min:8|max:255'
	        ]);

    		$user->update([
	    		'password'		=> bcrypt($password)
	    	]);
    	}
 
    	return view('main.account.account', compact('user'))->with('success', 'Account details successfully updated!');
    } 
}
