<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Benefit;
class BenefitController extends Controller
{
    public function benefit(){
        $benefit =Benefit::first();
        return view('admin.benefit',compact('benefit'));
    }
    public function updateBenefit(Request $request, $id){
        $validateData=$request->validate([
            'title'=> 'required',
            
        ]);
        $data =$request->all();
        $benefit= Benefit::findOrFail($id);
        $benefit->title = $data['title'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/benefit/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $benefit->image = $filename;
             }
            }
        $benefit->save();
        Session::flash('success_message', 'Benefit Has Been Updated Successfully');
        return redirect()->back(); 

   
}
}
