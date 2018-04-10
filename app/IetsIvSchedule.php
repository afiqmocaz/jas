<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsIvSchedule extends Model
{
    public function ietsvenue()
    {
    	return $this->belongsTo('App\IetsVenue');
    }
}
