<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
class SliderController extends Controller

{
    public function index(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function addSlider(){
        return view('admin.slider.add');
    }
    public function storeSlider(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'title'=> 'required',
            'image'=>'required',
            'order'=> 'required',

        ]);
        $slider = new Slider();
        $slider->title = $data['title'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/slider/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $slider->image = $filename;

            }
        }
        
        $slider->order = $data['order'];
        if(empty($data['status'])){
            $slider->status = 0;
        }
        else{
            $slider->status = 1;
        }
        $slider->save();
        Session::flash('success_message', 'Slider Has Benn Added Successfully');
        return redirect()->back(); 



    }

    public function editSlider($id){
        $slider= Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function updateSlider(Request $request, $id){
        
        $data =$request->all();
        $slider= Slider::findOrFail($id);
        $slider->title = $data['title'];
        
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/slider/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $slider->image = $filename;

            }
        }
       
        $slider->order = $data['order'];
        if(empty($data['status'])){
            $slider->status = 0;
        }
        else{
            $slider->status = 1;
        }
        $slider->save();
        Session::flash('success_message', 'Slider has been updated Successfully');
        return redirect()->back(); 


        }
        
        public function deleteSlider(Request $request, $id){
            $slider= Slider::findOrFail($id);
            $slider->delete();
            Session::flash('success_message', 'Slider Has Been Deleted Successfully');
            return redirect()->back(); 
        }

       
}
