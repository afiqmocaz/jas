<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eiaSectionA extends Model
{
    
    protected $table = 'eia_section_as';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
