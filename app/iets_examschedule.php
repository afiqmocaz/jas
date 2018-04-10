<?php

namespace App;
use App\UserExamDetails;

use Illuminate\Database\Eloquent\Model;

class iets_examschedule extends Model
{
    //
	 protected $table = 'iets_examschedule';
	 protected $dates = ['exam_date'];
	 
	
	public function iets_examschedule()
  {
      return $this->belongsTo('App\UserExamDetails');
  }
	
	
	
}
