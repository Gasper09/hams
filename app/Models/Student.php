<?php

///namespace App\Models;

use Illuminate\Database\Eloquent\Model;
namespace App;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Student extends Model
{
    use Notifiable;
    use HasRoles;
    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password','reg_no', 'disability', 'gender_id', 'sponsor', 'phone_number', 'image', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
