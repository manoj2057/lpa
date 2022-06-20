<?php

namespace App\Http\Controllers;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    public function site(){
        $site =Site::first();
        return view('admin.information',compact('site'));
    }
    public function updateSite(Request $request, $id){
        $validateData=$request->validate([
            'phoneno'=> 'required',
            'email'=>'required',
            'location'=>'required',
            'about_info'=>'required',
        ]);
        $data =$request->all();
        $site= Site::findOrFail($id);
        $site->phoneno = $data['phoneno'];
        $site->email = $data['email'];
        $site->location = $data['location'];
        $site->about_info = $data['about_info'];
        $site->save();
        Session::flash('success_message', 'Information Setting Has Been Updated Successfully');
        return redirect()->back();
    }
    public function siteSeo(){
        $site =Site::first();
        return view('admin.siteSeo',compact('site'));
    }
    public function updateSeo(Request $request, $id){
        
        $data =$request->all();
        $site= Site::find($request->id);
        $site->seo_title = $data['seo_title'];
        $site->seo_subtitle = $data['seo_subtitle'];
        $site->seo_keywords= $data['seo_keywords'];
        $site->seo_description= $data['seo_description'];
        $site->save();
        Session::flash('success_message', 'SEO Setting Has Been Updated Successfully');
        return redirect()->back();
    }
    public function socialmedia(){
        $site =Site::first();
        return view('admin.socialmedia',compact('site'));
    }
    public function updateSocialmedia(Request $request, $id){
        $data =$request->all();
        $site= Site::find($request->id);
        $site->facebook = $data['facebook'];
        $site->twitter = $data['twitter'];
        $site->linkedin= $data['linkedin'];
        $site->youtube= $data['youtube'];
        $site->save();
        Session::flash('success_message', 'Social Media Setting Has Been Updated Successfully');
        return redirect()->back();
    }

}
