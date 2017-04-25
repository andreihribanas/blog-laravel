<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // link tags to post model
    public function posts() {
    	return $this->belongsToMany('App\Post', 'post_tag');
    }
}
