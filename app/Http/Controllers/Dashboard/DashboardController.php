<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;

class DashboardController extends Controller
{
    public function index()
    {	
    	$count_users 		= User::count();

    	$count_departments 	= Department::count();

    	return view('main.dashboard.dashboard', compact('count_users', 'count_departments'));
    }
}
