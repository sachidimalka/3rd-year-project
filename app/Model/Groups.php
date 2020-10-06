<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'student_group';
    public $incrementing = false;
    
     public function student()
    {
        return $this->hasMany('App\Model\Student', 'group_id', 'id');
    }
    
    public function event()
    {
        return $this->hasMany('App\Model\Event', 'student_group', 'id');
    }


}