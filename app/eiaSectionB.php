<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eiaSectionB extends Model
{
    protected $table = 'eia_section_bs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
