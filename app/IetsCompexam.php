<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IetsModul;

class IetsCompexam extends Model
{
    //

     public function quizModul(){
        return $this->hasOne('App\IetsModul','id','module');
    }
}
