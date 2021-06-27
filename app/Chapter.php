<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table='chapter';
    protected $fillable=['name_chap','number_chap','content', 'id_story'];
	public $timestamps = false;
    public function story()
    {
    	return $this->hasOne(Story::class,'id','id_story');
    }
}
