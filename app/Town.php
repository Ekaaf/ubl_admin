<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Town extends Model
{
    protected $table = 'towns';   

 	public function zonetowns(){
        return $this->hasMany('App\Zonetown','town_id');
    }
}

