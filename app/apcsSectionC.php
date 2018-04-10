<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionC extends Model
{
    protected $table = 'apcs_section_cs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
