<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eiaSectionF extends Model
{
    protected $table = 'eia_section_fs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
