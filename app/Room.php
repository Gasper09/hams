<?php

namespace App;

use App\bed;
use App\Block;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function beds(){
        return $this->hasMany(Beds::class);
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }

    public function allocation(){
        return $this->hasOne(allocations::class);
    }

    public function request(){
        return $this->hasOne(StudentRequest::class);
    }
 
    
}
