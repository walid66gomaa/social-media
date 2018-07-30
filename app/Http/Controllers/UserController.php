<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;  


use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;
use DB;

class UserController extends Controller
{
    //
    public function create()
    {
    	# code...
    	 return view('user.regester');


    }
   

    //
    public function store()
    {
    	# code...

    	$user=new User;
    	$user->name=request('name');
    	$user->password=bcrypt(request('password')) ;
    	$user->email=request('email');

    	$user->save();
      $user->roles()->attach(Role::where('name','user')->first());

    	auth()->login($user);


    	return back(); 




    }

    public function profile()
    {
        return view('user.profile');
    }

    

    public function setting()
    {
         return view('user.setting');
    }


   
    public function editProfile()
    {   

      // $password = bcrypt('secredddt');
      

     // $password = Hash::make('m');;
     //      DB::table('users')
     //     ->where('id',9)
     //     ->update(['password'=>$password ]);

     //     echo $password;
       
     if(Hash::check(request('password'),Auth::user()->password)) {


            
           if (request('confPass')===request('newPass') && request('confPass')!="") {
           $password = Hash::make(request('newPass'));
          DB::table('users')
         ->where('id',Auth::user()->id)
         ->update(['password'=>$password]);
           }
          


          if (request('email')!=Auth::user()->email) {
      
         DB::table('users')
         
         ->where('id',Auth::user()->id)
         ->update(['email'=>request('email')]);
            
           }




              if (request('name')!=Auth::user()->name) {
      
         DB::table('users')
         
         ->where('id',Auth::user()->id)
         ->update(['name'=>request('name')]);
            
           }
        return back();

         }




        else {
       
           return back()->with('message','there is some thing error may be password not correct ');
         }

      
       
    }
   
}
