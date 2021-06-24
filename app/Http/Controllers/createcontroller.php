<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class createcontroller extends Controller
{
    public function create(Request $request){

        $validator = $request->validate([
            'fullname'=>'required|min:4',
            'emailid'=> 'required|min:8|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|min:8',
        ]);
        
        $email = $request['emailid'];
        $name = $request['fullname'];
        $password = $request['password'];
        
        // $user = new User();
        if(DB::table('users')->where('email',$email)->exists()){
            return back()->withErrors('Email Already Exists');
        }else{
            DB::insert('insert into users(name,email,password) values (?,?,?)',[$name,$email,$password]);
            return back()->with('message','User Created Successfully Try Login');
        }
      
        
        

    }
}
