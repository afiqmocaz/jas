<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaVenue extends Model
{
    protected $table='eia_venues';

    public function eiaschedules()
    {
    	return $this->hasMany('App\EiaSchedule', 'App\EiaIvSchedule');
    }
}
