<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaIvSchedule extends Model
{
    public function eiavenue()
    {
    	return $this->belongsTo('App\EiaVenue');
    }
}
