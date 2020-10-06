<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    public $incrementing = false;
    
    public function groups()
    {
      return $this->belongsTo('App\Model\Groups', 'student_group');
    }


}
