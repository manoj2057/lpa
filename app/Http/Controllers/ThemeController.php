<?php

namespace App\Http\Controllers;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class ThemeController extends Controller
{
    public function theme(){
        $theme =Theme::first();
        return view('admin.theme',compact('theme'));
    }
    public function updateTheme(Request $request, $id){
        $validateData=$request->validate([
            'website_title'=> 'required',
            'website_subtitle'=>'required',
        ]);
        $data =$request->all();
        $theme= Theme::findOrFail($id);
        $theme->website_title = $data['website_title'];
        $theme->website_title = $data['website_title'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/theme/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->logo = $filename;

            }
        }
            if($request->hasFile('footer_logo')){
                $image_tmp = $request->file('footer_logo');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $random . '.' . $extension;
                    $image_path = 'public/uploads/theme/' . $filename;
                    Image::make($image_tmp)->save($image_path);
                    $theme->footer_logo = $filename;
    
            }
        }

    
            if($request->hasFile('favicon')){
                $image_tmp = $request->file('favicon');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = $random . '.' . $extension;
                    $image_path = 'public/uploads/theme/' . $filename;
                    Image::make($image_tmp)->save($image_path);
                    $theme->favicon = $filename;
    
            }

        }
        $theme->save();
        Session::flash('success_message', 'Theme Setting Has Been Updated Successfully');
        return redirect()->back(); 

        

    }

}
