<?php

namespace App\Http\Controllers;

use App\Mail\ForgotMail;
use App\Models\Forgot;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function registerpost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'min:6|max:10|required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('auth.login'))->with('success','Account created successfully');
    }
    public function login(){
        return view("auth.login");
    }
    public function loginpost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                auth()->login($user);
                if(auth()->user()->isAdmin()){
                    return redirect(route('admin.dashboard'))->with('success','Admin logged in successfully');
                }
                else{
                    return redirect(route('user.dashboard'))->with('success','User logged in successfully');
                }
            }
            else{
                return redirect()->back()->with('error','Incorrect password');
            }
        }
        else{
            return back()->with('error','Incorrect email');
        }
    }
    public function forgot(){
        return view("auth.forgot");
    }
    public function forgotpost(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $user = User::where('email',$request->email)->first();
        $createdAt = Carbon::now();
        $token = Str::random(50);
        if($user){
           $userId = $user->id;
           $tokenExist = Forgot::where('user_id',$userId)->first();
           if($tokenExist){
            $tokenExist->token = $token;
            $tokenExist->createdAt = $createdAt;
            $tokenExist->save();
           }
           else{
            $new = new Forgot();
            $new->token = $token;
            $new->createdAt = $createdAt;
            $new->user_id = $userId;
            $new->save();
           }
           Mail::to($request->email)->send(new ForgotMail($token));
           return back()->with('success',' Reset link Token sent to email');
        }
        else{
            return back()->with('error','Incorrect email');
        }
    }
    public function reset($token){
        return view("auth.reset",compact('token'));
    }
    public function resetpost(Request $request,$token){
        $request->validate([
            'password'=>'required|min:6|max:10|confirmed'
        ]);
        $tokenExist = Forgot::where('token',$token)->first();
        if($tokenExist){
            $userid = $tokenExist->user_id;
            $user = User::where('id',$userid)->first();
            if(Carbon::now()->subMinutes(5)<$tokenExist->createdAt){
                $user->password = Hash::make($request->password);
                $tokenExist->token = 'null';
                $user->save();
                $tokenExist->save();
                return redirect(route('auth.login'))->with('success','Password updated successfully');
            }
            else{
                return redirect(route('auth.forgot'))->with('error','Token has expired');
            }
        }
        else{
            return redirect(route('auth.forgot'))->with('error','Token has been used');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect(route('auth.login'))->with('success','Logged out successfully');
    }
}
