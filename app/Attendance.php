<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [	'employee_id',  
    						'check_in', 
    						'check_out', 
    						'lateness_status',  
    						];

    public function employee()
    {
        return $this->belongsTo('App\User','employee_id');
    }
 
}
