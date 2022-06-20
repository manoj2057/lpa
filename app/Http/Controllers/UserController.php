<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(){
        $users=User::latest()->get();
        return view('admin.user',compact('users'));
    }
    public function storeUser(Request $request){
        $data =$request->all();
        $rule=[
            'name'=> 'required|max:50',
            'email'=>'required|email',
            'phoneno'=> 'required|numeric|digits:10',
            'studio_name'=> 'required',
            'address'=> 'required',
            'gdpr_agree'=> 'required',
        ];
        $customMessages= [
            'name.required' => 'Please enter the name',
            'name.max' => 'You are not allowed to enter more than 50 characters',
            'email.required' => 'Please enter email',
            'email.email' => 'please a valid email address',
            'phoneno.required' => 'Please enter phoneno',
            'phoneno.numeric' => 'Please enter numeric value',
            'phoneno.digits' => 'Please enter 10 digits',
            'studio_.required' => 'Please enter studio_name',
            'address.required' => 'Please enter your address',
            'gdpr_agree.required' => 'Please accept terms and conditions',

        ];
        $this->validate($request, $rule, $customMessages);
       
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phoneno = $data['phoneno'];
        $user->studio_name = $data['studio_name'];
        $user->address = $data['address'];
        
        $user->save();
        Session::flash('success_message', 'Form Has Been Added Successfully');
        return redirect()->back(); 



    }

   
        
        public function deleteUser(Request $request, $id){
            $user= User::findOrFail($id);
            $user->delete();
            Session::flash('success_message', 'User Data Has Been Deleted Successfully');
            return redirect()->back(); 
        }
}
