<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }
    public function Dashboard(){
        return view('admin.index');
    }  
    
    public function Login(Request $request){
         $check = $request->all();
         if(Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error','admin login successfully');
         }else{
            return back()->with('error','Invalid Email Or password');
         }
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Logout');
    }
}
