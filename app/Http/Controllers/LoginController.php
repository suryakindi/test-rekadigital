<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('name', 'password'))){
            return redirect()->intended('/admin');
        }else{
            $request->session()->flash('failed');
            return redirect()->back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
