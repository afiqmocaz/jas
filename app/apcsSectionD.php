<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionD extends Model
{
    protected $table = 'apcs_section_ds';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
