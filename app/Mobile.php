<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    

    public function clients()
    {
        return $this->hasMany('App\Mobile');
        
    }

    
    

    public function users()
    {
        return $this->belongsToMany('App\Client');
    }
   
}
