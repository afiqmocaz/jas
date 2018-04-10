<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $table='venues';

    public function schedules()
    {
    	return $this->hasMany('App\Schedule', 'App\IvSchedule');
    } 
}
