<?php

Route::get('/index',['as'=>'index','uses'=>'PostsController@index']);


Route::get('/home','PostsController@index')->name('home');
Route::get('create',['as'=>'create','uses'=>'PostsController@create']);

Route::get('posts/{post}','PostsController@show');
Route::get('posts/tags/{tag}','TagsController@index');


Route::post('/posts','PostsController@store');

Route::post('/posts','PostsController@store');

Route::post('/posts/{post}/comments','CommentController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');

Route::get('/logout',['as'=>'logout','uses'=>'SessionController@logout']);

Route::get('profile/{person}', 'ImagesController@profilePicture');

