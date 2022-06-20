<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class AdminLoginController extends Controller
{
    public function adminlogin(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessages = [
              'email.required' => 'You Must Enter email address',
              'email.email' => 'Please enter a valid email address',
              'email.max' => 'You are not allowed to enter more than 255 characters',
              'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);

            // dd($data);
            if(Auth::guard('admin')->attempt(['email'=> $data['email'],'password'=>$data['password'], 'status' => 1])){
                return redirect('/admin/dashboard');
            }
            else{
                Session::flash('error_message', 'Invalid Username or Password');
                return redirect()->back();
            }
        }
        if(Auth::guard('admin')->check()){
            return  redirect()->route('adminDashboard');
        } else {
            return view ('admin.auth.login');
        }



    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('success_message', 'Logout Sucessfully');
        return redirect('/admin/login');
    }

}
