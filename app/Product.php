<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categoriesID(){
    	return $this->hasMany('App\Relations','products_id','id');



    }

}
