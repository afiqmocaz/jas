<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizSession extends Model
{
    protected $table = 'quiz_session';
 public function User(){
        return $this->belongsTo('App\User');
    }
}
