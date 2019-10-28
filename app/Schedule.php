<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    public function speaker()
    {
    	return $this->hasOne('App\Speaker');
    }
}
