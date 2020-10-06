<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    public $incrementing = false;
    
    public function attendance()
    {
        return $this->hasMany('App\Model\Attendance', 'student_id', 'id');
    }
    public function groups()
    {
      return $this->belongsTo('App\Model\Groups', 'group_id');
    }


}
