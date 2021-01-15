<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
            return redirect()->intended('dashboard');
        }
        else
        {
            return redirect()->back()->withErrors('Invalid Credentials');
        }
    }





// for user table

    public function user(){

        $user= User::all();
        return view('backend.user', compact('user'));
    } 


    //add user

     public function adduser(Request $request){

         //ORM

        User::create([
            'name'=>$request->name,
             'contact'=>$request->contact,
            'email'=>$request->email,
            'user_type'=>$request->user_type,
            'password'=>bcrypt($request->password),
        ]);

       

        return redirect()->back()->with('message','User Added Successfully.');

}

 public function userview()
    {
            
        $users= User::paginate(5);
        return view('Backend.userview', compact('users'));

    }

    //delete user

    public function deleteuser($id)
    {
       $users=User::find($id);

       if(!empty($users))
       {
           $users->delete();
           $message="User Deleted Successfully";
       }else{
           $message="No data found.";
       }
        return redirect()->back()->with('message',$message);
    }

    //user edit

    public function edituser($id){

        $users=User::find($id);
       return view('backend.edituser',compact('users'));


   }

   public function updateuser(Request $request,$id){


    $users=User::find($id);
    $user->update([
        'name'=>$request->input('name'),
        'contact'=>$request->input('contact'),
        'email'=>$request->input('email'),
        'password'=>$request->input('password'),
    ]);

    return redirect()->back()->with('message','Item Types Updated Successfully.');


 }



 public function logout()
 {
    auth()->logout();

    return redirect()->route('login');
 }

}