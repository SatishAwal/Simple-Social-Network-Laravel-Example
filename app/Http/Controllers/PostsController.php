<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\User;
class PostsController extends Controller
{

  public function __construct(){
    //Only signedIn users can create a post//
    $this->middleware('auth')->except(['index','show']);

  }

  public function index(){
    
    $posts=Post::latest()
    ->filter(request(['month','year']))
    ->get();
   // $archives= Post::archives();
    return view('posts.index',compact('posts'));
  }

//Route Model Binding Used in show() //

  public function show(Post $post){
   return view('posts.show',compact('post'));
 }

 public function create(){
   return view('posts.create');
 }

 public function store(){
  $this->validate(request(),[
   'title'=>'required',
   'body'=>'required'
   ]);

/*   Start of method 1
    auth()->user()->publish(
    new Post(request(['title','body'])));
    End of Method 1 */


  //Method 2
    auth()->user()->publish(request(['title','body']));

  //end of method 2

  //Method 3
  /*Post::create([
    'title'=>request('title'),
    'body'=>request('body'),
    'user_id'=>auth()->user()->id   //Remember to set Fillable option in POST.php
    ]);
    En of Method 3    */
session()->flash('message','Your post has been published');

    return redirect('index');
  }

}
