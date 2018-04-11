<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use Auth;
use Carbon\Carbon; 

class AttendanceController extends Controller
{
    public function index()
    {	  
    	$attendances = Attendance::whereEmployeeId(Auth::user()->id)->orderBy('created_at', 'desc')->get();

    	foreach ($attendances as $attendance) { 
    		$check_in_time = Carbon::parse($attendance->check_in);
    		$check_out_time  = Carbon::parse($attendance->check_out);
 			
 			if($check_in_time->diffInHours($check_out_time)==0)
 			{ 
 				$attendance['duration'] = $check_in_time->diffInMinutes($check_out_time).' minutes';
 			} else {
 				$attendance['duration'] = $check_in_time->diffInHours($check_out_time) .' hours';
 			}
    		
    	}

    	return view('main.attendances.view', compact('attendances'));
    }

    public function all()
    {	  
    	$attendances = Attendance::orderBy('created_at', 'desc')->get();

    	foreach ($attendances as $attendance) { 
    		$check_in_time = Carbon::parse($attendance->check_in);
    		$check_out_time  = Carbon::parse($attendance->check_out);
 			
 			if($check_in_time->diffInHours($check_out_time)==0)
 			{ 
 				$attendance['duration'] = $check_in_time->diffInMinutes($check_out_time).' minutes';
 			} else {
 				$attendance['duration'] = $check_in_time->diffInHours($check_out_time) .' hours';
 			}
    		
    	}

    	return view('main.attendances.all', compact('attendances'));
    }


    public function create()
    {	 
    	$attendance = Attendance::whereEmployeeId(Auth::user()->id)->whereCheckOut(null)->first();

    	return view('main.attendances.create', compact('attendance'));
    }

    public function postcreate(Request $request)
    {   
    	//check if user ought to check in or check out 
    	$attendance = Attendance::whereEmployeeId(Auth::user()->id)->whereCheckOut(null)->first();

    	$now 			= Carbon::now();

	    $now->toTimeString();

    	if($attendance)
    	{
    		$attendance->update([
    			'check_out' 		=> $now,
    		]);

    		$message = 'You have checked out successfully!';
    	} else {
    		$user 			= Auth::user()->id; 

	    	$checkin_time = Carbon::today();
            $checkin_time->addHours(8);

	    	if(Carbon::parse($checkin_time)->lt($now))
	    	{
	    		$lateness_status = 1;
	    	} else {
	    		$lateness_status = 0;
	    	}
	    	
	    	Attendance::create([
	    		'employee_id' 	    => $user,
	    		'check_in' 			=> $now,   
	    		'lateness_status' 	=> $lateness_status,
	    	]);

	    	$message = 'You have checked in successfully!';
    	} 

    	return redirect('/attendances/view/')->with('success', $message);
    }
}
