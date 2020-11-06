<?php

namespace App;

use App\Room;
use App\Hostel;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $guarded = [];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function hostel(){
        return $this->belongsTo(Hostel::class);
    }
 
}
