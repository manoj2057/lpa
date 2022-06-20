<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::latest()->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function addBlog(){
        $admins=Admin::latest()->get();
        return view('admin.blog.add',compact('admins'));
    }
    public function storeBlog(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'image'=>'required',
        ]);
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;

            }
        }
        

        $blog->admin_id = $data['admin_id'];
        
        $blog->save();
        Session::flash('success_message', 'Blog Has Been Added Successfully');
        return redirect()->back(); 



    }

    public function editBlog($id){
        $admins=Admin::latest()->get();
        $blog= Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog','admins'));
    }
    public function updateBlog(Request $request, $id){
        
        $data =$request->all();
        $blog= Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;

            }
        }
       
        $blog->admin_id = $data['admin_id'];
        
        $blog->save();
        Session::flash('success_message', 'Blog has been updated Successfully');
        return redirect()->back(); 


        }
        
        public function deleteBlog(Request $request, $id){
            $blog= Blog::findOrFail($id);
            $blog->delete();
            Session::flash('success_message', 'Blog Has Been Deleted Successfully');
            return redirect()->back(); 
        }
}
