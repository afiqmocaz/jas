<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionB extends Model
{
    protected $table = 'apcs_section_bs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
