<?php

namespace App;
use App\StudentRequest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

 class Student extends Model
 {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'full_name', 'email', 'password','reg_no', 'disability', 'gender_id', 'sponsor', 'phone_number', 'image', 
    // ];

    protected $guarded = [];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function request()
    {
        return $this->hasOne(StudentRequest::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function allocation(){
        return $this->hasOne(allocations::class, 'id');
    }

    
 }


