<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table= 'author';
    protected $fillable=['name','username', 'password','email'];
    public $timestamps = false;
    public function story(){

    	return $this->hasMany(Story::class,'id','id_author');

    }
}
