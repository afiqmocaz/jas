<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentCategory extends Model
{
    protected $table = 'payment_categories';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
