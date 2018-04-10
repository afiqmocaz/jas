<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uploads;
class Rubric extends Model
{
    protected $table = 'rubrics';
    
    public function upload(){
        return $this->hasOne('App\Uploads', 'id', 'upload_id');
    }
}
