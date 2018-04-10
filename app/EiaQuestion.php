<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaQuestion extends Model
{
    protected $table = 'eia_questions';

    public function eiarelated()
    {
    	return $this->belongsTo('App\EiaRelated');
    }
}
