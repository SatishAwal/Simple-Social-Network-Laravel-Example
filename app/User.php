<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

   
    protected $fillable = [
    'name', 'email', 'password',
    ];


    protected $hidden = [
    'password', 'remember_token',
    ];

    public function posts(){

        return $this->hasMany(Post::class);

    }


    public function publish($post){

       // $this->posts()->save($post);//Method 1

        
        //Method 2
        $this->posts()->create([
            'title'=>request('title'),
            'body'=>request('body'),
            'user_id'=>auth()->id()

            ]);

        //end of method 2//
    /* Start of method 3
        Post::create([
    'title'=>request('title'),
    'body'=>request('body'),
    'user_id'=>auth()->user()->id   //Remember to set Fillable option in POST.php
    ]);
    

    End of Method 3*/
}
}
