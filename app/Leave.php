<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [	'employee_id',  
    						'start_of_leave', 
    						'end_of_leave', 
    						'status', 
    						'reason',
    						'comments'
    						];

    public function employee()
    {
        return $this->belongsTo('App\User','employee_id');
    }
 
}
