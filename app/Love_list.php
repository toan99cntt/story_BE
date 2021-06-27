<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Love_list extends Model
{
    protected $table='love_list';
    protected $fillable=['id_story','id_employer'];
    public $timestamps = false;
    public function story()
    {
    	return $this->hasOne(Story::class, 'id','id_story');
    }
    public function employer()
    {
    	return $this->hasOne(Employer::class, 'id','id_employer');
    }
}
	