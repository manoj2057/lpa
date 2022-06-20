<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\About;

class AboutController extends Controller
{
    public function about(){
        $about =About::first();
        return view('admin.about-us',compact('about'));
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
        $about->policies = $data['policies'];
        $about->objective = $data['objective'];
        $about->legislation = $data['legislation'];
        $about->save();
        Session::flash('success_message', 'AboutUs Has Been Updated Successfully');
        return redirect()->back(); 

    }
}
