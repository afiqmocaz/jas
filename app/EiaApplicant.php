<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaApplicant extends Model
{
    protected $table = 'eia_applicants';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function eiaappas() {
    return $this->hasMany('App\EiaApp', 'user_id');
}
}
