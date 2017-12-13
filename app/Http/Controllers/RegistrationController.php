<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests\RegistrationForm;
use App\User;
use App\Mail\Welcome;


class RegistrationController extends Controller
{
	public function create(){
		return view('registration.create');

	}
	public function store(){

		$this->validate(request(),[
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|max:10|confirmed']);
        
		$user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
            ]);

        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        session()->flash('message','Thanks for registering'); 

		return redirect()->home();
		

		//$user=User::create(request(['name','email','password']));//yesle garda sigin error aayeko thiyo
		
	}
}
