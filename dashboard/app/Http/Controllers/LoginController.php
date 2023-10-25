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

    // public function authentication(Request $request){
    //     if(Auth::attempt($request->only('email','password'))){
    //         return redirect('/analytics');
    //     }else{
    //         return redirect('/');
    //     }
    // }

    
    public function authentication(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            // Cek peran pengguna yang berhasil masuk
            $user = Auth::user();
    
            if ($user->role == 'master') {
                return redirect('/analytics');
            } elseif ($user->role == 'userA') {
                return redirect('/analytics_store_A');
            } elseif ($user->role == 'userB') {
                return redirect('/analytics_store_B');
            }
        }
    
        return redirect('/');
    }

    public function add_user(){
        return view("add_user");
    }

    public function add_user_input(Request $request){
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'role'=> $request->role,
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
