<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ExamCandidate;
class EiaSchedule extends Model
{
    public function eiaexamtitle()
    {
    	return $this->belongsTo('App\EiaExamTitle');
    }

    public function eiavenue()
    {
    	return $this->belongsTo('App\EiaVenue');
    }
    
    public function examCandidates(){
        return $this->hasMany('App\ExamCandidate', 'schedule_id', 'id');
    }
    
}
