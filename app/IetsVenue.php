<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsVenue extends Model
{
    protected $table='iets_venues';

    public function ietsschedules()
    {
    	return $this->hasMany('App\IetsSchedule', 'App\IetsIvSchedule');
    } 
}
