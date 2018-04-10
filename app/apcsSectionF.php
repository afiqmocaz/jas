<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apcsSectionF extends Model
{
    protected $table = 'apcs_section_fs';

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
