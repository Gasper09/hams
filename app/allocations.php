<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class allocations extends Model
{
    protected $guarded = [];

    public function studentRequest()
    {
        return $this->belongsTo(StudentRequest::class, 'id');
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

      public function bed(){
        return $this->belongsTo(Bed::class);
    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    
}
