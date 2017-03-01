<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rorder extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function ads()
    {
    	return $this->belongsTo('App\Adv');
    }
}
