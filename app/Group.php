<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    function getPages(){
    	return $this->hasMany('App\Page');
    }
}
