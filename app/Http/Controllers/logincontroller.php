<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Cookie;
use Redirect;
class logincontroller extends Controller
{
    public function check(Request $request){
    $validatedata = $request->validate([
        'username' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'password' => 'required',
    ]);
       $email = $request['username'];
       $password = $request['password'];
       if(DB::table('users')->where([
        'email'=>$email,
        'password'=>$password,
       ])->exists()){
        // $minutes = 60;
        // $response = new Response('login_det');
        // $response->withCookie(cookie('email',$email,$minutes));
        #return redirect('dashboard');       
    //    $minutes = 1;
    //    $response = new Response('hello');
    //    $response->withCookie(cookie('email',$email,$minutes));
    //    $response->withCookie(cookie('password',$password,$minutes));
    //    $response;
    //    #return $response;
    //    return redirect('dashboard');
        Cookie::queue('email',$email,65);
        Cookie::queue('password',$password,65);
        return redirect('dashboard');
       }else{
           return back()->withErrors('Username and Password are incorrect, Please Try again....');
       }

    }
   
    public function wronguser(Request $request){
            return redirect('login')->withErrors('Session Timed Out! Login again');              
        
    }

    public function logout(Request $request){
        $email = "";
        $password = "";
        Cookie::queue('email',$email,65);
        Cookie::queue('password',$password,65);
        return redirect('login');
        
    }
}
