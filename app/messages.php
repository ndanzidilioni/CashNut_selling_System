<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //
  
protected $with = ['user'];

    public function User(){
        return $this->belongsTo(User::class);   
     }
}
