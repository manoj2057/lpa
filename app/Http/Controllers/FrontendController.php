<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\About;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Inspiration;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Member;

class FrontendController extends Controller
{
    public function gallery(){
        $galleries=Gallery::latest()->get();
        return view('frontend.gallery',compact('galleries'));
    }
    public function contactUs(){
        return view('frontend.contactUs');
    }
    public function team(){
        return view('frontend.team');
    }
    public function blog(){
        $blogs=Blog::latest()->get();
        return view('frontend.blog',compact('blogs'));
    }
    public function blogDetails($id){
        $comments=Comment::Where('blog_id', '=', $id)->latest()->get();
        $blogs= Blog::findOrFail($id);
        return view('frontend.blog-details',compact('blogs','comments'));
    }
    public function pdfListing(){
        return view('frontend.pdf-listing');
    }
    public function memberListing(){
        return view('frontend.member-listing');
    }
    public function provinceMemberListing(){
        return view('frontend.provinceMember-listing');
    }
    public function memberDetails($id){
        $member= Member::findOrFail($id);
        return view('frontend.member-details',compact('member'));
    }
    public function search(){
        $blogs=Blog::latest()->get();
        return view('frontend.search',compact('blogs'));
    }

    public function aboutPage(){
        return view('frontend.about');
    }
    public function about(){
        $about =About::first();
        return view('admin.about-us',compact('about'));
    }
    public function policies(){
        return view('frontend.policies');
    }
    public function legislation(){
        return view('frontend.legislation');
    }
    public function objective(){
        return view('frontend.objective');
    }
    public function updateAbout(Request $request, $id){
        $validateData=$request->validate([
            'heading'=> 'required',
            'content'=>'required',
        ]);
        $data =$request->all();
        $about= About::findOrFail($id);
        $about->heading = $data['heading'];
        $about->content = $data['content'];
        $about->heading = $data['policies'];
        $about->content = $data['objective'];
        $about->heading = $data['legislation'];
        $about->save();
        Session::flash('success_message', 'AboutUs Has Been Updated Successfully');
        return redirect()->back(); 

    }
    public function inspiration(){
        $inspiration =Inspiration::first();
        return view('admin.inspiration',compact('inspiration'));
    }
    public function updateInspiration(Request $request, $id){
        $validateData=$request->validate([
            'heading'=> 'required',
            'content'=>'required',
        ]);
        $data =$request->all();
        $inspiration= Inspiration::findOrFail($id);
        $inspiration->heading = $data['heading'];
        $inspiration->content = $data['content'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/inspiration/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $inspiration->image = $filename;

            }
        }
           
        $inspiration->save();
        Session::flash('success_message', 'Inspiration Has Been Updated Successfully');
        return redirect()->back(); 

    }
    
    
    
}
