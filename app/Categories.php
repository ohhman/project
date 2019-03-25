<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	//function __construct(){
	//	$this->categoriesID;
	
	//}
	public function categoriesID(){
		return $this->hasMany('App\Relations','id','category_id');
		 
	
	}

}
