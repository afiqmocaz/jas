<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaCert extends Model
{
    protected $table='eia_certs';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profile()
    {
        return $this->belongsTo('App\eiaSectionA');
    }
}
