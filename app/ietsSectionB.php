<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ietsSectionB extends Model
{
    protected $table = 'iets_section_bs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
