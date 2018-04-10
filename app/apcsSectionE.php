<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionE extends Model
{
    protected $table = 'apcs_section_es';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
