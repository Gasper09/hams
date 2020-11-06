<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class year extends Model
{
    protected $guarded = [];

    public function allocations()
    {
        return $this->hasOne(allocations::class);
    }
}
