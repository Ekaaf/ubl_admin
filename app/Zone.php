<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Zone extends Model
{
    protected $table = 'zones';   


    public function territorries(){
		return $this->hasMany('App\Territorry');
	}
}


