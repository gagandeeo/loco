<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fileup;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //login
    function login(){
        return view('components.login');

    }
    //register
    function register(){
        return view('components.register');
    }
    //save user via register
    function save(Request $request){
        //validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5'
        ]);

        //Insert Data
        $save = DB::table('admins')->insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
        if($save){
            return redirect('auth/login')->with('success', 'Registered Succesfully');
        }else{
            return back()->with('fail', 'Something went wrong, try again..');
        }
    }

    //Authenticate user
    function check(Request $request){
        //validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        $user = DB::table('admins')->where('email',$request->email)->first();
        if(!$user){
            return back()->with('fail','You are not a registered user');
        }else{
            if($request->password == $user->password){
                $request->session()->put('LoggedUser', $user->id);
                return redirect('user/dashboard');
            }else{
                return back()->with('fail','Incorrect password');    
            }
        }
    }
 
    //Dashboard
    function dashboard(){
        $posts = Fileup::latest()->get();
        // echo $posts;
        // return view('components.upload-file', compact('posts'));
        // $data = DB::table('admins')->where('id',session('LoggedUser'))->first();
        return view('components.dashboard',compact('posts'));
    }

    //Logout
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('auth/login');
        }
    }

}

// $user = Admin::where('email','=',$request->email)->first();

//Insert data
        // $admin = new Admin;
        // $admin->name = $request->name;
        // $admin->email = $request->email;
        // $admin->password = $request->password;
        // $save = $admin->save();