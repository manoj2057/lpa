<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Gallery;
class GalleryController extends Controller

{
    public function index(){
        $galleries=Gallery::latest()->get();
        return view('admin.gallery.index',compact('galleries'));
    }
    public function addGallery(){
        return view('admin.gallery.add');
    }
    public function storeGallery(Request $request){
        $data =$request->all();

        $validateData=$request->validate([
            'image'=>'required',
        ]);
        $gallery = new Gallery();
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/gallery/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $gallery->image = $filename;
             }
        }
        
        
        $gallery->save();
        Session::flash('success_message', 'Gallery Has Benn Added Successfully');
        return redirect()->back(); 



    }

   
        
        public function deleteGallery(Request $request, $id){
            $gallery= Gallery::findOrFail($id);
            $gallery->delete();
            Session::flash('success_message', 'Gallery Has Been Deleted Successfully');
            return redirect()->back(); 
        }

       
}
