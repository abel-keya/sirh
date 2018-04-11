<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Leave;
use Auth;
use Carbon\Carbon;

class LeaveController extends Controller
{
	public function index()
	{	  
		$leaves = Leave::whereEmployeeId(Auth::user()->id)->orderBy('created_at', 'desc')->get();

		foreach ($leaves as $leave) { 
			$start_of_leave = Carbon::parse($leave->start_of_leave);
			$end_of_leave  = Carbon::parse($leave->end_of_leave);

			$leave['duration'] = $start_of_leave->diffInDays($end_of_leave).' days';

		}

		return view('main.leave.past-requests', compact('leaves'));
	}

	public function all()
	{	  
		$leaves = Leave::orderBy('created_at', 'desc')->get();

		foreach ($leaves as $leave) { 
			$start_of_leave = Carbon::parse($leave->start_of_leave);
			$end_of_leave  = Carbon::parse($leave->end_of_leave);

			$leave['duration'] = $start_of_leave->diffInDays($end_of_leave).' days';
		}

		return view('main.leave.all', compact('leaves'));
	}


	public function request()
	{	   
		return view('main.leave.request', compact('leave'));
	}

	public function postrequest(Request $request)
	{   
		$this->validate($request, [
    		'start_of_leave'    => 'required',
            'end_of_leave'      => 'required', 
            'reason'     		=> 'required|min:3|max:10000', 
        ]);

        $start_of_leave         = $request->input('start_of_leave'); 
        $start_of_leave         = new carbon($start_of_leave);

        $end_of_leave           = $request->input('end_of_leave'); 
        $end_of_leave           = new carbon($end_of_leave); 

    	$reason 				= $request->input('reason');
    	$comments 				= $request->input('comments');

	    Leave::create([
	    	'employee_id' 		=> Auth::user()->id,
	    	'start_of_leave' 	=> $start_of_leave, 
	    	'end_of_leave' 		=> $end_of_leave,   
	    	'status' 			=> 0, 
	    	'reason' 			=> $reason,
	    	'comments' 			=> $comments,
	    ]);

	    return redirect('/leaves/view/')->with('success', 'Leave request has been made successfully!');
	}

	public function confirmdelete($leave_id)
    {	
    	$leave = Leave::whereId($leave_id)->first();

    	return view('main.leave.delete', compact('leave'));
    }

    public function delete($leave_id)
    {	
    	$leave = Leave::whereId($leave_id)->first()->delete();

    	return redirect('/leaves/view/')->with('success', 'Leave successfully deleted!');
    }

    public function respond($leave_id)
    {	
    	$leave = Leave::whereId($leave_id)->first();

    	return view('main.leave.respond', compact('leave'));
    }

    public function postrespond(Request $request, $leave_id)
	{   
		$this->validate($request, [
    		'status'    		=> 'required',
            'comments'      	=> 'required|min:3|max:10000', 
        ]);

		$status         		= $request->input('status');
		$comments         		= $request->input('comments');

        Leave::whereId($leave_id)->first()->update([
        	'status'			=> $status,
        	'comments'			=> $comments
        ]); 

	    return redirect('/leaves/all/')->with('success', 'Leave request responded to successfully!');
	}
}
