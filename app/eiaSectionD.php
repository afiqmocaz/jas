<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eiaSectionD extends Model
{
    protected $table = 'eia_section_d';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
