<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\OurTeam;

class OurTeamController extends Controller
{
    public function index(){
        $ourteams=OurTeam::latest()->get();
        return view('admin.ourTeam.index',compact('ourteams'));
    }
    public function addOurTeam(){
        return view('admin.ourTeam.add');
    }
    public function storeOurTeam(Request $request){
        $data =$request->all();
        $validateData=$request->validate([
            'name'=> 'required',
            'position'=>'required',
            'team'=> 'required',

        ]);
        $ourTeam = new OurTeam();
        $ourTeam->name = $data['name'];
        $ourTeam->position = $data['position'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/ourTeam/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $ourTeam->image = $filename;

            }
        }
        
        $ourTeam->team = $data['team'];
        
        $ourTeam->save();
        Session::flash('success_message', 'Team Has Benn Added Successfully');
        return redirect()->back(); 



    }

    public function editOurTeam($id){
        $ourTeam= OurTeam::findOrFail($id);
        return view('admin.OurTeam.edit',compact('ourTeam'));
    }
    public function updateOurTeam(Request $request, $id){
        
        $data =$request->all();
        $ourTeam= OurTeam::findOrFail($id);
        $ourTeam->name = $data['name'];
        $ourTeam->position = $data['position'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/OurTeam/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $ourTeam->image = $filename;

            }
        }
       
        $ourTeam->team = $data['team'];
       
        $ourTeam->save();
        Session::flash('success_message', 'Slider has been updated Successfully');
        return redirect()->back(); 


        }
        
        public function deleteOurTeam(Request $request, $id){
            $ourTeam= OurTeam::findOrFail($id);
            $ourTeam->delete();
            Session::flash('success_message', 'OurTeam Has Been Deleted Successfully');
            return redirect()->back(); 
        }

       
}


