<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    protected $table = 'advs';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function cats() 
    {
    	return $this->hasMany('App\Category');
    }
    
    /*
    public function cats()
    {
    	return $this->belongsTo('App\Category');
    }
    */
}
