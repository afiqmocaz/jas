<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EiaAssignment extends Model
{
    protected $table='eia_assignments';

     public function specific()
    {
        return $this->hasMany(AssignmentQuestions::class, 'specific_assignment_id');
    }

    public function general()
    {
        return $this->hasMany(AssignmentQuestions::class, 'general_assignment_id');
    }

     public function general2()
    {
        return $this->hasMany(EIAUpload::class, 'assignment_id');
    }
}
