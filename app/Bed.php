<?php

namespace App;
use App\Room;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $guarded = [];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function mattress(){
        return $this->hasOne(Mattress::class);
    }

    public function allocation(){
        return $this->hasOne(allocations::class);
    }
}
