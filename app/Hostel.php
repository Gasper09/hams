<?php

namespace App;

use App\Block;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }
 
}
