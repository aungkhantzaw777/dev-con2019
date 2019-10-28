<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $guarded = [];

    public function speaker()
    {
    	return $this->hasOne('App\Speaker');
    }
}
