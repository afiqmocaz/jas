<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{

	protected $table = 'applicants';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function apcsappas() {
    return $this->hasMany('App\ApcsApp', 'user_id');
}
}
