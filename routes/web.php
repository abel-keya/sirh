<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/',            			
	['uses' => 'HomeController@index', 'as' => 'login',])
		->middleware(['web']);

Route::post('login',       			
	['uses' => 'Auth\LoginController@login'])
			->middleware(['web']);

Route::get('/forgot/password',   	
	['uses' => 'Auth\LoginController@forgotpassword'])
			->middleware(['auth']);

Route::get('/logout',       		
	['uses' => 'Auth\LoginController@logout'])
			->middleware(['auth']);

Route::get('/dashboard',    		
	['uses' => 'Dashboard\DashboardController@index'])
			->middleware(['auth']);

Route::get('/my-account/view',    		
	['uses' => 'Auth\UsersController@index'])
			->middleware(['auth']);

Route::get('/my-account/edit',    		
	['uses' => 'Auth\UsersController@edit'])
			->middleware(['auth']);

Route::post('my-account/update',        
	['uses' => 'Auth\UsersController@update'])
			->middleware(['auth']);

// department routes
Route::group(['middleware' => ['role:administrator', 'auth']], function()
{
	Route::get('/departments/view',    		
		['uses' => 'Dashboard\DepartmentController@index']);

	Route::get('/department/create',    	
		['uses' => 'Dashboard\DepartmentController@create']);

	Route::post('/department/create',     	
		['uses' => 'Dashboard\DepartmentController@postcreate']);

	Route::get('/department/edit/{department_id}',    		
		['uses' => 'Dashboard\DepartmentController@edit']);

	Route::post('/department/update/{department_id}',     	
		['uses' => 'Dashboard\DepartmentController@update']);

	Route::get('/department/delete/{department_id}', 
		['uses' => 'Dashboard\DepartmentController@confirmdelete']);

	Route::post('/department/delete/{department_id}',     	
		['uses' => 'Dashboard\DepartmentController@delete']);
});

 
Route::group(['middleware' => ['role:manager', 'auth']], function()
{	
	// employee routes
	Route::get('/employees/view',    		
		['uses' => 'Dashboard\EmployeeController@index']);

	Route::get('/employee/create',    	    
		['uses' => 'Dashboard\EmployeeController@create']);

	Route::post('/employee/create',     	
		['uses' => 'Dashboard\EmployeeController@postcreate']);

	Route::get('/employee/edit/{employee_id}',     
		['uses' => 'Dashboard\EmployeeController@edit']);

	Route::post('/employee/update/{employee_id}',  
		['uses' => 'Dashboard\EmployeeController@update']);

	Route::get('/employee/delete/{employee_id}',   
		['uses' => 'Dashboard\EmployeeController@confirmdelete']);

	Route::post('/employee/delete/{employee_id}',  
		['uses' => 'Dashboard\EmployeeController@delete']);


	// performance appraisal routes
	Route::get('/performanceappraisals/view',    		
		['uses' => 'Dashboard\PerformanceAppraisalController@index']);

	Route::get('/performanceappraisal/create',    	    
		['uses' => 'Dashboard\PerformanceAppraisalController@create']);

	Route::post('/performanceappraisal/create',     	
		['uses' => 'Dashboard\PerformanceAppraisalController@postcreate']);

	Route::get('/performanceappraisal/edit/{performanceappraisal_id}',     
		['uses' => 'Dashboard\PerformanceAppraisalController@edit']);

	Route::post('/performanceappraisal/update/{performanceappraisal_id}',  
		['uses' => 'Dashboard\PerformanceAppraisalController@update']);

	Route::get('/performanceappraisal/delete/{performanceappraisal_id}',   
		['uses' => 'Dashboard\PerformanceAppraisalController@confirmdelete']);

	Route::post('/performanceappraisal/delete/{performanceappraisal_id}',  
		['uses' => 'Dashboard\PerformanceAppraisalController@delete']);

});

Route::group(['middleware' => ['role:manager', 'auth']], function()
{	
	// attendances routes
	Route::get('/attendances/all',    		
		['uses' => 'Dashboard\AttendanceController@all']);

});

Route::group(['middleware' => ['role:employee', 'auth']], function()
{	
	// attendances routes
	Route::get('/attendances/view',    		
		['uses' => 'Dashboard\AttendanceController@index']);

	Route::get('/attendance/create',    	
		['uses' => 'Dashboard\AttendanceController@create']);

	Route::post('/attendance/create',     	
		['uses' => 'Dashboard\AttendanceController@postcreate']);
});

Route::group(['middleware' => ['role:manager', 'auth']], function()
{	
	// leave routes
	Route::get('/leaves/all',    		
		['uses' => 'Dashboard\LeaveController@all']);

	Route::get('/leave/respond/{leave_id}',
		['uses' => 'Dashboard\LeaveController@respond']);

	Route::post('/leave/respond/{leave_id}',    	
		['uses' => 'Dashboard\LeaveController@postrespond']);

});

Route::group(['middleware' => ['role:employee', 'auth']], function()
{	
	// leave routes
	Route::get('/leaves/view',    		
		['uses' => 'Dashboard\LeaveController@index']);

	Route::get('/leave/request',    	
		['uses' => 'Dashboard\LeaveController@request']);

	Route::post('/leave/request',     	
		['uses' => 'Dashboard\LeaveController@postrequest']);

	Route::get('/leave/delete/{leave_id}',  
		['uses' => 'Dashboard\LeaveController@confirmdelete']);

	Route::post('/leave/delete/{leave_id}',  
		['uses' => 'Dashboard\LeaveController@delete']);
});


