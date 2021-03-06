<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Auth;


class AdminProfileController extends Controller
{
    //Admin Profile
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile',compact('admin'));

    }
    //Update Profile
    public function updateProfile(Request $request, $id){
        $data =$request->all();
        // dd($data);
        $rule=[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'phone'=> 'required',

        ];
        $customMessages= [
            'name.required' => 'Please enter the name',
            'name.max' => 'You are not allowed to enter more than 255 characters',
            'email.required' => 'Please enter email',
            'email.max' => 'You are not allowed to enter more than 255 characters',
            'email.email' => 'please a valid email address',
            'phone.required' => 'Please enter phone',
        ];
        $this->validate($request, $rule, $customMessages);
        $admin_id=Auth::guard('admin')->user()->id;
        $admin= Admin::findorFail($admin_id);
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/admin/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $admin->image = $filename;

            }
        }
        $admin->save();
        Session::flash('success_message', 'Admin profile has been updated successfully');
        return redirect()->back();

    }

    //Admin Password Update
    public function changePassword(){
        $user =Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.changePassword',compact('user'));
    }

    //Check Current Password
    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if(Hash::check($current_password, $check_password->password)){
            return "true"; die;
        } else {
            return "false"; die;
        }


    }
    //Update Admin Password
    public function updatePassword(Request $request,$id){
        $validateData=$request->validate([
            'current_password'=> 'required|max:255|min:6',
            'password'=>'required|min:6',
            'confirm_password'=>'required_with:password|same:password|min:6',


        ]);
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $current_user_password = $user->password;
        $data = $request->all();
        if(Hash::check($data['current_password'], $current_user_password)){
            $user->password = bcrypt($data['password']);
            $user->save();
            Session::flash('success_message', 'Admin Password Has Been Updated Successfully');
            return redirect()->back();
        } else {
            Session::flash('error_message', 'Your Current Password Does not Match with our database');
            return redirect()->back();
        }

        
    }
}
