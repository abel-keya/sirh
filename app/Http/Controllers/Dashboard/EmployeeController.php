<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Role;
use Carbon\Carbon;

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
            'nationality'     	=> 'required',
            'date_of_birth'     => 'required',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'id_number'         => 'required',
            'mobile_number'     => 'required',
            'next_of_kin'       => 'required',
            'next_of_kin_id_no' => 'required',
            'address'           => 'required',
            'employment_status' => 'required',
            'linkedin_url'      => 'required' 
        ]);
 
    	$name 			    = $request->input('name');
    	$email 			    = $request->input('email');
    	$password 		    = $request->input('password');
    	$department_id      = $request->input('department_id');
    	$role_id  		    = $request->input('role_id');

        $nationality        = $request->input('nationality');

        $date_of_birth      = $request->input('date_of_birth'); 
        $date_of_birth      = new carbon($date_of_birth); 

        $gender             = $request->input('gender');
        $marital_status     = $request->input('marital_status');
        $id_number          = $request->input('id_number');
        $mobile_number      = $request->input('mobile_number');
        $next_of_kin        = $request->input('next_of_kin');
        $next_of_kin_id_no  = $request->input('next_of_kin_id_no');
        $address            = $request->input('address');
        $employment_status  = $request->input('employment_status');
        $linkedin_url       = $request->input('linkedin_url'); 

    	$user = User::create([
    		'name' 			    => $name,
    		'email' 		    => $email,
    		'password' 		    => bcrypt($password),
    		'department_id'     => $department_id,
            'nationality'       => $nationality,
            'date_of_birth'     => $date_of_birth,
            'gender'            => $gender,
            'marital_status'    => $marital_status,
            'id_number'         => $id_number,
            'mobile_number'     => $mobile_number,
            'next_of_kin'       => $next_of_kin,
            'next_of_kin_id_no' => $next_of_kin_id_no,
            'address'           => $address,
            'employment_status' => $employment_status,
            'linkedin_url'      => $linkedin_url,
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
            'name'              => 'required|min:3|max:255',
            'email'             => 'required|min:3|max:255', 
            'password'          => 'required|min:3|max:255',
            'department_id'     => 'required',
            'nationality'       => 'required',
            'date_of_birth'     => 'required',
            'gender'            => 'required',
            'marital_status'    => 'required',
            'id_number'         => 'required',
            'mobile_number'     => 'required',
            'next_of_kin'       => 'required',
            'next_of_kin_id_no' => 'required',
            'address'           => 'required',
            'employment_status' => 'required',
            'linkedin_url'      => 'required' 
        ]);
 
    	$name              = $request->input('name');
        $email              = $request->input('email');
        $password           = $request->input('password');
        $department_id      = $request->input('department_id');
        $role_id            = $request->input('role_id');

        $nationality        = $request->input('nationality');

        $date_of_birth      = $request->input('date_of_birth'); 
        $date_of_birth      = new carbon($date_of_birth); 

        $gender             = $request->input('gender');
        $marital_status     = $request->input('marital_status');
        $id_number          = $request->input('id_number');
        $mobile_number      = $request->input('mobile_number');
        $next_of_kin        = $request->input('next_of_kin');
        $next_of_kin_id_no  = $request->input('next_of_kin_id_no');
        $address            = $request->input('address');
        $employment_status  = $request->input('employment_status');
        $linkedin_url       = $request->input('linkedin_url'); 

    	$employee = User::whereId($employee_id)->first();

    	$employee->update([
    		'name'                => $name,
            'email'             => $email,
            'password'          => bcrypt($password),
            'department_id'     => $department_id,
            'nationality'       => $nationality,
            'date_of_birth'     => $date_of_birth,
            'gender'            => $gender,
            'marital_status'    => $marital_status,
            'id_number'         => $id_number,
            'mobile_number'     => $mobile_number,
            'next_of_kin'       => $next_of_kin,
            'next_of_kin_id_no' => $next_of_kin_id_no,
            'address'           => $address,
            'employment_status' => $employment_status,
            'linkedin_url'      => $linkedin_url,
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
