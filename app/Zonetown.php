<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Zonetown extends Model
{
    protected $table = 'zone_town'; 

    public function town(){
		return $this->belongsTo('App\Town');

	}

	// public function territorry(){
	// 	return $this->belongsTo('App\Territorry');
	// }  
}


