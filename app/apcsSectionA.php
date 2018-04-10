<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionA extends Model
{
    // public function country()
    // {
    // 	return $this->belongsTo('App\Country');
    // }
    protected $table = 'apcs_section_as';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
