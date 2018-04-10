<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsSchedule extends Model
{
     public function ietsexamtitle()
    {
    	return $this->belongsTo('App\IetsExamTitle');
    }

    public function ietsvenue()
    {
    	return $this->belongsTo('App\IetsVenue');
    }
}
