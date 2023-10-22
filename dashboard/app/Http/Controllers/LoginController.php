<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("login");
    }

    public function authentication(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/analytics');
        }else{
            return redirect('/');
        }
    }

    public function add_user(){
        return view("add_user");
    }

    public function add_user_input(Request $request){
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=> Str::random(60),
        ]);

        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
