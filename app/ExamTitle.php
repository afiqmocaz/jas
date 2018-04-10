<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamTitle extends Model
{
    //

    protected $table='exam_titles';

    public function schedules()
    {
    	return $this->hasMany('App\Schedule');
    } 
}
