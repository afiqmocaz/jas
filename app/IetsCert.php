<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IetsCert extends Model
{
    protected $table='iets_certs';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profile()
    {
        return $this->belongsTo('App\ietsSectionA');
    }
}
