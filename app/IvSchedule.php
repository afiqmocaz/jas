<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IvSchedule extends Model
{
    
    protected $guarded = array();
    protected $dates = ['date'];
    
    public function venue()
    {
    	return $this->belongsTo('App\Venue');
    }
}
