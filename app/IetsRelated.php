<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsRelated extends Model
{
    protected $table='iets_relates';
	
	
     public function ietsquestions()
    {
    	return $this->hasMany('App\ExamIets','ietsrelated_id');
    }  
}
