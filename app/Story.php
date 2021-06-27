<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table= 'story';
    protected $fillable=['name','image', 'content','status','count','id_genre','id_author','id_category'];
	public $timestamps = false;
   
    public function author()
    {
    	return $this->hasOne(Author::class, 'id','id_author');
    }
    public function genre()
    {
    	return $this->hasOne(Genre::class, 'id','id_genre');
    }
    public function category()
    {
    	return $this->hasOne(Category::class, 'id','id_category');
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'id_story','id');
    }
    public function story_detail()
    {
    	return $this->hasMany(Story_detail::class, 'id_story','id');
    }
}
