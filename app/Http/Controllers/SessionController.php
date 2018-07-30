<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

     public function login()
    {
    	# code...
if (!auth()->attempt(request(['email','password']))) {
	return back()->withError([

      'massage'=>"Email or password not coorect",
		]);
}
    	

    	return back(); 




    }

    public function logout()
    {
    	# code...
    	auth()->logout();
    	return back(); 



    }
   
}
