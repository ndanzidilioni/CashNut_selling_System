<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    Public function User(){
        return $this->belongsToMany(User::class);
    }
}
