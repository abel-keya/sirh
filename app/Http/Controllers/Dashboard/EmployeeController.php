<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Role;

class EmployeeController extends Controller
{
    public function index()
    {	
    	$employees = User::get();

    	return view('main.employees.view', compact('employees'));
    }

    public function create()
    {	
    	$departments 	= Department::get();

    	$roles			= Role::get();

    	return view('main.employees.create', compact('departments', 'roles'));
    }

    public function postcreate(Request $request)
    { 	  
    	$this->validate($request, [
    		'name'      		=> 'required|min:3|max:255',
            'email'     		=> 'required|min:3|max:255', 
            'password'     		=> 'required|min:3|max:255',
            'department_id'     => 'required',
            'role_id'     		=> 'required',
        ]);
 
    	$name 			= $request->input('name');
    	$email 			= $request->input('email');
    	$password 		= $request->input('password');
    	$department_id  = $request->input('department_id');
    	$role_id  		= $request->input('role_id');

    	$user = User::create([
    		'name' 			=> $name,
    		'email' 		=> $email,
    		'password' 		=> $password,
    		'department_id' => $department_id
    	]);

        $adminRole             = Role::whereName('administrator')->first();
        $managerRole           = Role::whereName('manager')->first();
        $employeeRole          = Role::whereName('employee')->first();

    	$selectedRole       = Role::whereId($role_id)->first();
        if($selectedRole->name === "administrator")
        {
            $user->assignRole($adminRole);
            $user->assignRole($managerRole);
            $user->assignRole($employeeRole);
        } elseif($selectedRole->name === "manager") { 
            $user->assignRole($managerRole);
            $user->assignRole($employeeRole);
        } else {
            $user->assignRole($employeeRole);
        } 

    	return redirect('/employees/view/')->with('success', 'Employee successfully created!');
    }

    public function edit($employee_id)
    {	
    	$employee = User::whereId($employee_id)->first();

    	$departments 	= Department::get();

    	$roles			= Role::get();

    	return view('main.employees.edit', compact('employee', 'departments', 'roles'));
    }

    public function update(Request $request, $employee_id)
    {	 
    	$this->validate($request, [
    		'name'      		=> 'required|min:3|max:255',
            'email'     		=> 'required|min:3|max:255', 
            'password'     		=> 'required|min:3|max:255',
            'department_id'     => 'required', 
        ]);
 
    	$name 			= $request->input('name');
    	$email 			= $request->input('email');
    	$password 		= $request->input('password');
    	$department_id  = $request->input('department_id');

    	$employee = User::whereId($employee_id)->first();

    	$employee->update([
    		'name' 			=> $name,
    		'email' 		=> $email,
    		'password' 		=> $password,
    		'department_id' => $department_id
    	]);

    	return redirect('/employees/view/')->with('success', 'Employee successfully updated!');
    }

    public function confirmdelete($employee_id)
    {	
    	$employee = User::whereId($employee_id)->first();

    	return view('main.employees.delete', compact('employee'));
    }

    public function delete($employee_id)
    {	
    	$employee = User::whereId($employee_id)->first()->delete();

    	return redirect('/employees/view/')->with('success', 'Employee successfully deleted!');
    }
}
