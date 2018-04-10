<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ietsSectionE extends Model
{
    protected $table = 'iets_section_es';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
