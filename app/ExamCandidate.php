<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
use App\User;
use App\IvSchedule;
class ExamCandidate extends Model
{
     protected $table='exam_candidates';
    
    public function examSchedules(){
        return $this->hasMany('App\Schedule','id', 'schedule_id');
    }
    public function uploads(){
        return $this->hasMany('App\Uploads', 'exam_candidate_id');
    }
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    
    public function ivSchedule(){
        return $this->hasOne('App\IvSchedule','exam_candidate','id');
    }
}
