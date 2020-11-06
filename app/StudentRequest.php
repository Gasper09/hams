<?php

namespace App;

use App\Student;

use Illuminate\Database\Eloquent\Model;

class StudentRequest extends Model
{
    protected $fillable = ['student_id', 'level'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function allocation()
    {
        return $this->hasOne(allocation::class, 'id');
    }

    public function scopeActive($query) {
      
        return $query->where('status', 1);
        
      }
  
       public function scopeInactive($query) {
        
        return $query->where('status', 0);
        
      }
}
