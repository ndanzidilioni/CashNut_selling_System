<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password',
    ];

    //protected $with = ['Profile','Location'];


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

    protected $with = ['profile','bankDetails'];
    
  
    Public function Location(){
        return $this->hasOne(Location::class);
    }

    
    public function roles(){
        return $this->belongsToMany(Role::class);   
     }

      Public function bankDetails(){
        return $this->hasone(bankDetails::class);
    }

      Public function businessInfo(){
        return $this->hasone(businessInfo::class);
    }

          Public function paswdStatus(){
        return $this->hasone(paswdStatus::class);
      //  return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
    }
    
    Public function profile(){
        return $this->hasone(profile::class);
    }

     Public function deposits(){
        return $this->hasone(deposits::class);
    }

     Public function messages(){
        return $this->hasone(messages::class);
    }

    Public function totalkilos(){
        return $this->hasone(totalkilos::class);
    }
}

