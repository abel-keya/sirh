<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {	
    	$departments = Department::get();

    	return view('main.department.view', compact('departments'));
    }

    public function create()
    {	  
    	return view('main.department.create');
    }

    public function postcreate(Request $request)
    { 
    	$this->validate($request, [
    		'name'      		=> 'required|min:3|max:255' 
        ]);

    	$name = $request->input('name');

    	Department::create([
    		'name' => $name
    	]);

    	return redirect('/departments/view/')->with('success', 'Department successfully created!');
    }

    public function edit($department_id)
    {	
    	$department = Department::whereId($department_id)->first();

    	return view('main.department.edit', compact('department'));
    }

    public function update(Request $request, $department_id)
    {	 
    	$this->validate($request, [
    		'name'      		=> 'required|min:3|max:255' 
        ]);
 
    	$name = $request->input('name');

    	$department = Department::whereId($department_id)->first();

    	$department->update([
    		'name' => $name
    	]);

    	return redirect('/departments/view/')->with('success', 'Department successfully updated!');
    }

    public function confirmdelete($department_id)
    {	
    	$department = Department::whereId($department_id)->first();

    	return view('main.department.delete', compact('department'));
    }

    public function delete($department_id)
    {	
    	$department = Department::whereId($department_id)->first()->delete();

    	return redirect('/departments/view/')->with('success', 'Department successfully deleted!');
    }
}
