<?php

namespace App;


class Comment extends Model
{
    public function post(){

    	return $this->belongsTo(Post::class);

    }

    public function user(){	
    						//$commments->post->user;

		return $this->belongsTo(User::class);

	}

    protected $fillable = [
        'user_id','body', 'post_id',
    ];
}
