<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    public $incrementing = false;
    
     public function student()
    {
        return $this->belongsTo('App\Model\Student', 'student_id');
    }


}
