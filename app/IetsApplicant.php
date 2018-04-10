<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsApplicant extends Model
{
    protected $table = 'iets_applicants';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ietsappas() {
    return $this->hasMany('App\IetsApp', 'user_id');
}
}
