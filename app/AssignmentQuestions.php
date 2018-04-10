<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentQuestions extends Model
{
    protected $table = 'assignment_question';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function general()
    {
        return $this->belongsTo(EiaAssignment::class, 'general_assignment_id');
    }

    public function specific()
    {
        return $this->belongsTo(EiaAssignment::class, 'specific_assignment_id');
    }
}
