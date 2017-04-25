<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // comments belong to post
    public function post() {
    	return $this->belongsTo('App\Post');
    }
}
