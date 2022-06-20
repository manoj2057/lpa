<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Member;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index(){
        $members=Member::latest()->get();
        return view('admin.member.index',compact('members'));
       
    }
    public function addmember(){
        return view('admin.member.add');
    }
    public function storeMember(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'name'=> 'required',
            'image'=>'required',
            'address'=>'required',
            'officename'=> 'required',
            'desc'=>'required',

        ]);
        $member = new Member();
        $member->name = $data['name'];
        $member->member_type = $data['member_type'];

        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/member/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $member->image = $filename;

            }
        }
        $member->address = $data['address'];
        $member->officename = $data['officename'];
        $member->desc = $data['desc'];
        $member->save();
        Session::flash('success_message', 'member Has Been Added Successfully');
        return redirect()->back(); 



    }

   public function editmember($id){
        $member= Member::findOrFail($id);
        return view('admin.member.edit',compact('member'));
    }


public function updatemember(Request $request, $id){
        
        $data =$request->all();
        $member= Member::findOrFail($id);
        $member->name = $data['name'];
        $member->member_type = $data['member_type'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/member/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $member->image = $filename;

            }
        }
        $member->address = $data['address'];
        $member->officename = $data['officename'];
        $member->desc = $data['desc'];
        $member->save();
        Session::flash('success_message', 'Member Has Been update Successfully');
        return redirect()->back(); 


        }
        public function deleteMember(Request $request, $id){
            $member= Member::findOrFail($id);
            $member->delete();
            Session::flash('success_message', 'Member Has Been Deleted Successfully');
            return redirect()->back(); 
        }
}
