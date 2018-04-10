<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ietsSectionC extends Model
{
    protected $table = 'iets_section_cs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
