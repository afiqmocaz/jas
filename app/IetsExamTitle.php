<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsExamTitle extends Model
{
    protected $table='iets_exam_titles';

    public function ietsschedules()
    {
    	return $this->hasMany('App\IetsSchedule');
    }
}
