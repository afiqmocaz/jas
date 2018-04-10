<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaExamTitle extends Model
{
    protected $table='eia_exam_titles';

    public function eiaschedules()
    {
    	return $this->hasMany('App\EiaSchedule');
    } 
}
