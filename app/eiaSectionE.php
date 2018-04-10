<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eiaSectionE extends Model
{
    protected $table = 'eia_section_es';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
