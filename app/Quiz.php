<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'eiaquizzes';

    public function eiarelated()
    {
    	return $this->belongsTo('App\EiaRelated');
    }
}
