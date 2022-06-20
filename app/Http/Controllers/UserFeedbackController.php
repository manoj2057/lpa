<?php

namespace App\Http\Controllers;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserFeedbackController extends Controller
{
    public function index(){
        $userfeedbacks=UserFeedback::latest()->get();
        return view('admin.user-feedback',compact('userfeedbacks'));
    }
    public function storeuserFeedback(Request $request){
        $data =$request->all();
        $rule=[
            'name'=> 'required|max:50',
            'email'=>'required|email',
            'phoneno'=> 'required|numeric|digits:10',
            'subject'=> 'required',
            'message'=> 'required',
            
        ];
        $customMessages= [
            'name.required' => 'Please enter the name',
            'name.max' => 'You are not allowed to enter more than 50 characters',
            'email.required' => 'Please enter email',
            'email.email' => 'please a valid email address',
            'phoneno.required' => 'Please enter phoneno',
            'phoneno.numeric' => 'Please enter numeric value',
            'phoneno.digits' => 'Please enter 10 digits',
            'subject.required' => 'Please enter studio_name',
            'message.required' => 'Please enter your address',
           

        ];
        $this->validate($request, $rule, $customMessages);
        
        $userFeedback = new UserFeedback();
        $userFeedback->name = $data['name'];
        $userFeedback->email = $data['email'];
        $userFeedback->phoneno = $data['phoneno'];
        $userFeedback->subject = $data['subject'];
        $userFeedback->message = $data['message'];
        
        $userFeedback->save();
        Session::flash('success_message', 'Form Has Been Added Successfully');
        return redirect()->back(); 



    }

   
        
        public function deleteuserFeedback(Request $request, $id){
            $userFeedback= User::findOrFail($id);
            $userFeedback->delete();
            Session::flash('success_message', 'UserFeedback Data Has Been Deleted Successfully');
            return redirect()->back(); 
        }
}

