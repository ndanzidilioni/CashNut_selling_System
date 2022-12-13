<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposits extends Model
{
    //
    protected $with = ['User'];
    public function User(){
        return $this->belongsTo(User::class);   
     }
}

