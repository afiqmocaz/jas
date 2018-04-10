<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function examtitle()
    {
    	return $this->belongsTo('App\ExamTitle');
    }

    public function venue()
    {
    	return $this->belongsTo('App\Venue');
    }
   
    public function examCandidates(){
        return $this->hasMany('App\ExamCandidate', 'schedule_id', 'id');
    }
}
