<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table='category';
	protected $fillable= ['name','status'];
	public $timestamps = false;
	public function story()
	{
		return $this->hasMany(Story::class,'id', 'id_category');
	}	
}
