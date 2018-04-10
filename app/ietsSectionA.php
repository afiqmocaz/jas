<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ietsSectionA extends Model
{
   protected $table = 'iets_section_as';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
