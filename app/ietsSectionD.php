<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ietsSectionD extends Model
{
    protected $table = 'iets_section_ds';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
