<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function login(){
        return view("auth.login");
    }
    public function forgot(){
        return view("auth.forgot");
    }
    public function reset(){
        return view("auth.reset");
    }
}
