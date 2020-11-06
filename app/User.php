<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//     public function setPasswordAttribute($password)
// {   
//     $this->attributes['password'] = bcrypt($password);
// }
        public function scopeUsers($query)
        {
            return $query->where([['id', '!=', Auth::id()], ['id', '!=', '1']]);
        }

        public function student()
        {
           return $this->hasOne(Student::class, 'user_id');
        }

        public function studentRequest()
        {
           return $this->hasOne(StudentRequest::class, 'id');
        }

        public function getRoleAttribute()
        {
            return title_case(str_replace('_', ' ', $this->getRoleNames()->first()));
        }
}
