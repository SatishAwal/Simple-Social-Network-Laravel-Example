<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
class SessionController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest', ['except' => 'logout']);
	}

	public function create(){

		return view('sessions.create');

	}


	public function store(){
    	//Attempt to authenticate

		if(! auth()->attempt(request(['email','password'])))
		{
			return back()->withErrors([
				'message'=>'Incorrect email or password'
				]);
		}    	


		return redirect()->home();

	}

	
	public function logout(){

    auth()->logout();

    return redirect('login');
}
}
