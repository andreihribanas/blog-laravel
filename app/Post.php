<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	// link categories to posts
	public function category() {
    	return $this->belongsTo('App\Category');
	} 

	// link tags to posts
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}

	// post has many comments
	public function comments() {
		return $this->hasMany('App\Comment');
	}

}
