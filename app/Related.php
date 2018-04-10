<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $table='relates';

    public function questions()
    {
    	return $this->hasMany('App\ExamApcs');
    } 


    
}
