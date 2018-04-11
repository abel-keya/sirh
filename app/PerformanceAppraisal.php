<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceAppraisal extends Model
{
    protected $fillable = [	'employee_id',  
    						'evaluation_period_from', 
    						'evaluation_period_to', 
    						'position_description', 
    						'position_expertise', 
    						'position_expertise_rating', 
    						'approach_to_work', 
    						'approach_to_work_rating', 
    						'quality_of_work', 
    						'quality_of_work_rating', 
    						'communication_skills', 
    						'communication_skills_rating', 
    						'interpersonal_skills', 
    						'interpersonal_skills_rating', 
    						'other_performance_factors', 
    						'overall_rating',
    						'manager_id'
    						];

    public function employee()
    {
        return $this->belongsTo('App\User','employee_id');
    }

    public function manager()
    {
        return $this->belongsTo('App\User','manager_id');
    }
}
