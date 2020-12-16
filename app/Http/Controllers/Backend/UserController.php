<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){

    	return view('backend.user.login');
	}

   public function loginProcess(Request $request)
    {

        $request->validate([
           'email'=>'required',
           'password'=>'required'
        ]);

        $login_info=$request->except(['_token']);

//        dd(Auth::attempt($login_info));

        if (Auth::attempt($login_info)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        else
        {
            return redirect()->back()->withErrors('Invalid Credentials');
        }
    }

}
