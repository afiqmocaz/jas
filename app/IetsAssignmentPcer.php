<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsAssignmentPcer extends Model
{
    //
    protected $table = 'ietsuserassignment';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function general()
    {
        return $this->belongsTo(IetsAssignmentPcer::class, 'pcer_id');
    }
}
