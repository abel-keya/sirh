<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PerformanceAppraisal;
use App\User;
use Carbon\Carbon;
use Auth;

class PerformanceAppraisalController extends Controller
{
    public function index()
    {	
    	$performanceappraisals = PerformanceAppraisal::get();
 
    	$rating = [	'Not Applicable', 
    				'Unacceptable', 
    				'Needs Improvement', 
    				'Satisfactory', 
    				'More Than Satisfactory', 
    				'Exceptional'];


    	//iterate to give the ratings an approriate meaning based on the above rating array
    	foreach ($performanceappraisals as $performanceappraisal) {
    		$performanceappraisal->position_expertise_rating = $rating[$performanceappraisal->position_expertise_rating];

    		$performanceappraisal->approach_to_work_rating = $rating[$performanceappraisal->approach_to_work_rating];

    		$performanceappraisal->quality_of_work_rating = $rating[$performanceappraisal->quality_of_work_rating];

    		$performanceappraisal->communication_skills_rating = $rating[$performanceappraisal->communication_skills_rating];
 
    		$performanceappraisal->interpersonal_skills_rating = $rating[$performanceappraisal->interpersonal_skills_rating];

    		//round up the overall rating to get respective rating item 
    		$performanceappraisal->overall_rating = $rating[ceil($performanceappraisal->overall_rating)];
    	}

    	return view('main.performanceappraisals.view', compact('performanceappraisals'));
    }

    public function create()
    {	
    	$employees 	= User::get();

    	$managers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'manager');
            }
        )->get();

    	return view('main.performanceappraisals.create', compact('employees', 'managers'));
    }

    public function postcreate(Request $request)
    { 	 
    	$this->validate($request, [
    		'employee_id'      				=> 'required',
            'evaluation_period_from'     	=> 'required', 
            'evaluation_period_to'     		=> 'required',
            'position_description'     		=> 'required|min:3|max:100000',
            'position_expertise'     		=> 'required|min:3|max:100000',
            'position_expertise_rating'     => 'required',
            'approach_to_work'     			=> 'required|min:3|max:100000',
            'approach_to_work_rating'     	=> 'required',
            'quality_of_work'     			=> 'required|min:3|max:100000',
            'quality_of_work_rating'     	=> 'required',
            'communication_skills'     		=> 'required|min:3|max:100000',
            'communication_skills_rating'   => 'required',
            'interpersonal_skills'     		=> 'required|min:3|max:100000',
            'interpersonal_skills_rating'   => 'required',  
        ]);
 
    	$employee_id 					= $request->input('employee_id');

    	$evaluation_period_from           = $request->input('evaluation_period_from'); 
        $evaluation_period_from           = new carbon($evaluation_period_from);

        $evaluation_period_to           = $request->input('evaluation_period_to'); 
        $evaluation_period_to           = new carbon($evaluation_period_to); 

    	$position_description 			= $request->input('position_description');
    	$position_expertise 			= $request->input('position_expertise');
    	$position_expertise_rating 		= $request->input('position_expertise_rating');
    	$approach_to_work 				= $request->input('approach_to_work');
    	$approach_to_work_rating 		= $request->input('approach_to_work_rating');
    	$quality_of_work 				= $request->input('quality_of_work');
    	$quality_of_work_rating 		= $request->input('quality_of_work_rating');
    	$communication_skills 			= $request->input('communication_skills');
    	$communication_skills_rating 	= $request->input('communication_skills_rating');
    	$interpersonal_skills 			= $request->input('interpersonal_skills');
    	$interpersonal_skills_rating 	= $request->input('interpersonal_skills_rating');
    	$other_performance_factors 		= $request->input('other_performance_factors'); 

    	$overall_rating 				= ($position_expertise_rating + 
    										$approach_to_work_rating + 
    										$quality_of_work_rating + 
    										$communication_skills_rating + 
    										$interpersonal_skills_rating) / 5;

    	$performance_appraisal = PerformanceAppraisal::create([
    		'employee_id' 					=> $employee_id,
    		'evaluation_period_from' 		=> $evaluation_period_from,
    		'evaluation_period_to' 			=> $evaluation_period_to,
    		'position_description' 			=> $position_description,
    		'position_expertise' 			=> $position_expertise,
    		'position_expertise_rating' 	=> $position_expertise_rating,
    		'approach_to_work' 				=> $approach_to_work,
    		'approach_to_work_rating' 		=> $approach_to_work_rating,
    		'quality_of_work'				=> $quality_of_work,
    		'quality_of_work_rating' 		=> $quality_of_work_rating,
    		'communication_skills' 			=> $communication_skills,
    		'communication_skills_rating' 	=> $communication_skills_rating,
    		'interpersonal_skills' 			=> $interpersonal_skills,
    		'interpersonal_skills_rating' 	=> $interpersonal_skills_rating,
    		'other_performance_factors' 	=> $other_performance_factors,
    		'overall_rating' 				=> $overall_rating,
    		'manager_id' 					=> Auth::user()->id
    	]);

    	return redirect('/performanceappraisals/view/')->with('success', 'Performance Appraisal successfully created!');
    }

    public function edit($performanceappraisal_id)
    {	
    	$employees 	= User::get();

    	$managers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'manager');
            }
        )->get();

        $performanceappraisal = PerformanceAppraisal::whereId($performanceappraisal_id)->first();

    	return view('main.performanceappraisals.edit', compact('employees', 'managers', 'performanceappraisal'));
    }

    public function update(Request $request, $performanceappraisal_id)
    {	 
    	$this->validate($request, [ 
            'evaluation_period_from'     	=> 'required', 
            'evaluation_period_to'     		=> 'required',
            'position_description'     		=> 'required|min:3|max:100000',
            'position_expertise'     		=> 'required|min:3|max:100000',
            'position_expertise_rating'     => 'required',
            'approach_to_work'     			=> 'required|min:3|max:100000',
            'approach_to_work_rating'     	=> 'required',
            'quality_of_work'     			=> 'required|min:3|max:100000',
            'quality_of_work_rating'     	=> 'required',
            'communication_skills'     		=> 'required|min:3|max:100000',
            'communication_skills_rating'   => 'required',
            'interpersonal_skills'     		=> 'required|min:3|max:100000',
            'interpersonal_skills_rating'   => 'required' 
        ]);
 
    	$evaluation_period_from           = $request->input('evaluation_period_from'); 
        $evaluation_period_from           = new carbon($evaluation_period_from);

        $evaluation_period_to           = $request->input('evaluation_period_to'); 
        $evaluation_period_to           = new carbon($evaluation_period_to); 

    	$position_description 			= $request->input('position_description');
    	$position_expertise 			= $request->input('position_expertise');
    	$position_expertise_rating 		= $request->input('position_expertise_rating');
    	$approach_to_work 				= $request->input('approach_to_work');
    	$approach_to_work_rating 		= $request->input('approach_to_work_rating');
    	$quality_of_work 				= $request->input('quality_of_work');
    	$quality_of_work_rating 		= $request->input('quality_of_work_rating');
    	$communication_skills 			= $request->input('communication_skills');
    	$communication_skills_rating 	= $request->input('communication_skills_rating');
    	$interpersonal_skills 			= $request->input('interpersonal_skills');
    	$interpersonal_skills_rating 	= $request->input('interpersonal_skills_rating');
    	$other_performance_factors 		= $request->input('other_performance_factors'); 

    	$overall_rating 				= ($position_expertise_rating + 
    										$approach_to_work_rating + 
    										$quality_of_work_rating + 
    										$communication_skills_rating + 
    										$interpersonal_skills_rating) / 5;

 		$performanceappraisal = PerformanceAppraisal::whereId($performanceappraisal_id)->first();

		$performanceappraisal->update([ 
    		'evaluation_period_from' 		=> $evaluation_period_from,
    		'evaluation_period_to' 			=> $evaluation_period_to,
    		'position_description' 			=> $position_description,
    		'position_expertise' 			=> $position_expertise,
    		'position_expertise_rating' 	=> $position_expertise_rating,
    		'approach_to_work' 				=> $approach_to_work,
    		'approach_to_work_rating' 		=> $approach_to_work_rating,
    		'quality_of_work'				=> $quality_of_work,
    		'quality_of_work_rating' 		=> $quality_of_work_rating,
    		'communication_skills' 			=> $communication_skills,
    		'communication_skills_rating' 	=> $communication_skills_rating,
    		'interpersonal_skills' 			=> $interpersonal_skills,
    		'interpersonal_skills_rating' 	=> $interpersonal_skills_rating,
    		'other_performance_factors' 	=> $other_performance_factors,
    		'overall_rating' 				=> $overall_rating
    	]);

    	return redirect('/performanceappraisals/view/')->with('success', 'Performance Appraisal successfully updated!');
    }

    public function confirmdelete($performanceappraisal_id)
    {	
    	$performanceappraisal = PerformanceAppraisal::whereId($performanceappraisal_id)->first();

    	return view('main.performanceappraisals.delete', compact('performanceappraisal'));
    }

    public function delete($performanceappraisal_id)
    {
    	$performanceappraisal = PerformanceAppraisal::whereId($performanceappraisal_id)->first()->delete();

    	return redirect('/performanceappraisals/view/')->with('success', 'Performance Appraisal successfully deleted!');
    }
}
