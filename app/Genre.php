<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table= 'genre';
    protected $fillable=['name'];
	public $timestamps = false;
    
    public function story(){

    	return $this->hasMany(Story::class,'id','id_genre');

    }
}
